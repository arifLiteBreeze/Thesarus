<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SynonymsPoolSearchValidator;
use App\Http\Requests\SynonymsPoolAddValidator;
use App\Services\WordService;

class SynonymsPoolController extends Controller
{
    /**
     * Fetch the list of search words with synonyms
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param Request 
     * 
     * @return Object
     */
    public function find(SynonymsPoolSearchValidator $request)
    {
        $request->validated();
        $wordService = new WordService;
        return $wordService->searchSynonyms($request->word);
    }

    /**
     * Create words and SynonymsPool
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param Request 
     * 
     * @return Object
     */
    public function store(SynonymsPoolAddValidator $request)
    {
        $request->validated();
        $wordService = new WordService;
        return $wordService->save($request);
    }
}
