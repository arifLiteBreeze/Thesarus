<?php

namespace App\Http\Controllers;

use App\Models\synonymsPool;
use App\Models\Word;
use Illuminate\Http\Request;
use App\Http\Requests\SynonymsPoolSearchValidator;
use App\Services\WordService;

class SynonymsPoolController extends Controller
{
    /**
     * Fetch the list of serch words with synonyms
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
}
