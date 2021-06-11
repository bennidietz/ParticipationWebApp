<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\VoteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/login', [ApiController::class, 'login']);
Route::post('/register', [ApiController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Projects
Route::resource('project', ProjectController::class);

// Polygons
Route::resource('polygon', PolygonController::class);

// Assets
Route::resource('asset', AssetController::class);

// Suggestions
Route::resource('suggestion', SuggestionController::class);

// Comments
Route::resource('comment', CommentController::class);

// Votes
Route::resource('vote', VoteController::class);
