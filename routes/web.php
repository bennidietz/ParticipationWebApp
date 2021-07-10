<?php

use App\Http\Controllers\AssetController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SuggestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/map', function() {
    return view('map');
})->name('map');

Route::get('/timeline', function() {
    return view('timeline');
})->name('timeline');

Route::get('/projects', function() {
    return view('projects');
})->name('projects');

Route::get('/about', function() {
    return view('about');
})->name('about');

Route::get('/impressum', function() {
    return view('impressum');
})->name('impressum');

Route::get('/privacy', function() {
    return view('privacy');
})->name('privacy');

Route::group(['prefix' => 'dashboard'], function() use ($router) {
    Route::get('', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('projects', ProjectController::class);
    Route::resource('polygons', PolygonController::class);
    Route::resource('assets', AssetController::class);
    Route::resource('suggestions', SuggestionController::class);
    Route::resource('reports', ReportController::class);

    Route::get('users', function () {
        return view('users');
    })->name('users');
});
