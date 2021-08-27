<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SynonymsPoolController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\AuthTokenController;

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

// Rote for the APIs related to synonyms
Route::group([
    'prefix' => 'synonyms'
], function ($router) {
    Route::get('/', [SynonymsPoolController::class, 'find']);
    Route::post('/', [SynonymsPoolController::class, 'store']);
});

// Route for the APIs related to words
Route::group([
    'prefix' => 'words'
], function ($router) {
    Route::get('/', [WordController::class, 'index']);
});

// Route for the APIs related to auth-token
Route::group([
    'prefix' => 'auth-token'
], function ($router) {
    Route::post('/', [AuthTokenController::class, 'store']);
});