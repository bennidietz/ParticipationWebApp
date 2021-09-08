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

Route::get('/corrensweek', function() {
    return view('corrensweek');
})->name('corrensweek');

Route::get('/mobility', function() {
    return view('mobility');
})->name('mobility');

Route::get('/mobility/luftverschmutzung', function() {
    return view('mobility/luftverschmutzung');
})->name('mobility.luftverschmutzung');
Route::get('/mobility/sharing', function() {
    return view('mobility/sharing');
})->name('mobility.sharing');
Route::get('/mobility/versiegelung', function() {
    return view('mobility/versiegelung');
})->name('mobility.versiegelung');
Route::get('/mobility/barrierefreiheit', function() {
    return view('mobility/barrierefreiheit');
})->name('mobility.barrierefreiheit');
Route::get('/mobility/sicherheit', function() {
    return view('mobility/sicherheit');
})->name('mobility.sicherheit');
Route::get('/mobility/laermbelaestigung', function() {
    return view('mobility/laermbelaestigung');
})->name('mobility.laermbelaestigung');
Route::get('/mobility/fahrrad', function() {
    return view('mobility/fahrrad');
})->name('mobility.fahrrad');
Route::get('/mobility/abstellanlagen', function() {
    return view('mobility/abstellanlagen');
})->name('mobility.abstellanlagen');
Route::get('/mobility/scienceboulevard', function() {
    return view('mobility/scienceboulevard');
})->name('mobility.scienceboulevard');

Route::get('/upload', function() {
    return view('upload');
})->name('upload');

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
