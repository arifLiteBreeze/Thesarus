<?php
namespace App\Services;

use App\Models\Word;
use App\Models\SynonymsPool;

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
        $wordsAdded = array();
        $synonymsPoolData = $this->createSynonymsPool($request);
        foreach($request->synonyms as $word)
        {
            $wordsAdded[] = Word::create(['word'=>$word, 'synonyms_pools_id'=> $synonymsPoolData->id]);
        }
        return $wordsAdded;
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
        $synonyms = array();
        $synonymsList = Word::where('word', $word)->with('synonyms_pools')->get();
        if($synonymsList->count() == 0)
        {
            $synonyms['relatedWords']= $this->findRelatedWords($word);
        }
        $synonyms['data'] = $synonymsList;
        $synonyms['total'] = $synonymsList->count();
        return (object)$synonyms;
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

    /**
     * Insert data into synonyms_pools table
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param Array
     * 
     * @return object
     */
    public function createSynonymsPool($request)
    {
        $synonymsPoolData = array();
        $synonymsPoolData['synonyms'] = json_encode($request->synonyms);
        $synonymsPoolData['meaning'] = $request->meaning;
        return SynonymsPool::create($synonymsPoolData);
    }
}