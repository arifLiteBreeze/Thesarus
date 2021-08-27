<?php
namespace App\Services;

use App\Models\Word;


class WordService
{
    /**
     * Insert data into company
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param Array
     * 
     * @return object
     */
    public function save($request)
    {
        return Word::create($request);
    }

    /**
     * Fetch the list of synonyms of a word
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param String word
     * 
     * @return Array
     */
    public function searchSynonyms($word)
    {
        $synonyms = Word::where('word', $word)->with('synonyms_pools')->get();
        if($synonyms->count() == 0)
        {
            $synonyms['message'] = 'No records found';
            $synonyms['relatedWords']= $this->findRelatedWords($word);
        }
        return $synonyms;
    }

    /**
     * Fetch the list of synonyms of a related word
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param String word
     * 
     * @return Array
     */
    public function findRelatedWords($word)
    {
        return Word::where('word', 'LIKE' ,'%'.$word.'%')->with('synonyms_pools')->get();
    }

    /**
     * Fetch the list of all words
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param Void
     * 
     * @return Array
     */
    public function allWords()
    {
        return Word::select('word')->groupBy('word')->orderBy('word', 'ASC')->paginate(15);
    }
}