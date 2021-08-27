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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function find(SynonymsPoolSearchValidator $request)
    {
        $request->validated();
        $wordService = new WordService;
        return $wordService->searchSynonyms($request->word);
    }
}
