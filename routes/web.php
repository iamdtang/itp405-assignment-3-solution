<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tracks', [TrackController::class, 'index'])->name('track.index');
Route::get('/tracks/new', [TrackController::class, 'create'])->name('track.create');
Route::post('/tracks', [TrackController::class, 'store'])->name('track.store');
