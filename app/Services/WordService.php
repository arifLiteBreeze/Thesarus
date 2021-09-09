<?php
namespace App\Services;

use App\Models\Word;
use App\Models\SynonymsPool;

/**
 * Service for Thesaurus implementation
 * 
 * @author Arif C A <aca@lbit.in>
 */
class WordService implements Thesaurus
{
    /**
     * Insert data into company
     * 
     * @param Object $request
     * 
     * @return Array
     */
    public function addSynonyms(object $request):array
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
     * @param String word
     * 
     * @return Object
     */
    public function getSynonyms(string $word):object
    {
        $synonyms = array('data'=>array(), 'relatedWords'=>array());
        $synonymsList = Word::where('word', $word)->with('synonyms_pools')->get();
        $synonyms['relatedWords']= $this->findRelatedWords($word);
        foreach($synonymsList as $synonymsSelected)
        {
            $poolResponse = array();
            $poolDetails = json_decode($synonymsSelected->synonyms_pools);
            $poolResponse['id'] = $poolDetails->id;
            $poolResponse['meaning'] = $poolDetails->meaning;
            $poolResponse['synonyms'] = array_diff(json_decode($poolDetails->synonyms)
        , array($word));
            $synonyms['data'][] = $poolResponse;

        }
        $synonyms['total'] = $synonymsList->count();
        return (object)$synonyms;
    }

    /**
     * Fetch the list of synonyms of a related word
     * 
     * @param String word
     * 
     * @return Array
     */
    public function findRelatedWords($word)
    {
        return Word::where('word','!=',$word)->where('word', 'LIKE' ,'%'.$word.'%')->get();
    }

    /**
     * Fetch the list of all words
     * 
     * @param Object $object
     * 
     * @return Object
     */
    public function getWords(object $request):object
    {
        $wordList = Word::select('word')->where(function($query) use ($request)
        {
            if ($request->word) {
                $query->where('word','LIKE' ,'%'.$request->word.'%');
            }
        })->groupBy('word')->orderBy('word', 'ASC')->paginate(15);
        $wordList->appends(['word' => $request->word]);
        return $wordList;
    }

    /**
     * Insert data into synonyms_pools table
     * 
     * @param Object $request
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