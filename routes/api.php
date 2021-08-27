<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SynonymsPoolController;
use App\Http\Controllers\WordController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'prefix' => 'synonyms'
], function ($router) {
    Route::get('/', [SynonymsPoolController::class, 'find']);
    Route::post('/', [SynonymsPoolController::class, 'save']);
});

Route::group([
    'prefix' => 'words'
], function ($router) {
    Route::get('/', [WordController::class, 'index']);
});