<?php

use App\Http\Controllers\Api\AssetController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\PolygonController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\SuggestionController;
use App\Http\Controllers\Api\VoteController;
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

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('project', ProjectController::class);
Route::resource('polygon', PolygonController::class);
Route::resource('asset', AssetController::class);
Route::get('/suggestion/{suggestion}/comment', [SuggestionController::class, 'getCommentsOfSuggestion']);
Route::resource('suggestion', SuggestionController::class);
Route::get('/comment/{comment}/comment', [CommentController::class, 'getCommentsOfComment']);
Route::resource('comment', CommentController::class);
Route::resource('vote', VoteController::class);
