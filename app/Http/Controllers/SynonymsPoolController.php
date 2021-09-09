<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SynonymsPoolSearchValidator;
use App\Http\Requests\SynonymsPoolAddValidator;
use App\Services\WordService;

/**
 * Controller to manage Synonyms polls
 * 
 * @author Arif C A <aca@lbit.in>
 * 
 */
class SynonymsPoolController extends Controller
{
    /**
     * Fetch the list of search words with synonyms
     * 
     * @param Request 
     * 
     * @return Object
     */
    public function find(SynonymsPoolSearchValidator $request):object
    {
        $request->validated();
        $wordService = new WordService;
        return $wordService->getSynonyms($request->word);
    }

    /**
     * Create words and SynonymsPool
     * 
     * @param Request 
     * 
     * @return Arrsy
     */
    public function store(SynonymsPoolAddValidator $request):array
    {
        $wordService = new WordService;
        return $wordService->addSynonyms($request);
    }
}
