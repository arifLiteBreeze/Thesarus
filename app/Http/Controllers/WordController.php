<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use App\Services\WordService;

 /**
 * Controller to manage Thesaurus words
 * 
 * @author Arif C A <aca@lbit.in>
 */
class WordController extends Controller
{
    /**
     * Return words with pagnation
     * 
     * @param Void 
     * 
     * @return Object
     */
    public function index(Request $request):object
    {
        $wordService = new WordService;
        return $wordService->getWords($request);
    }
}
