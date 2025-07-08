<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppController;
use App\Http\Controllers\CandidateController;

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

Route::get('/app', [AppController::class, 'index'])->name('App');
Route::get('/section/dashboard', [AppController::class, 'dashboard']);
Route::get('/section/settings', [AppController::class, 'settings']);
Route::get('/section/candidate', [App\Http\Controllers\AppController::class, 'candidate'])->name('candidates');



//candidate routes
Route::get('/candidates/create', [CandidateController::class, 'create'])->name('candidates.create');
Route::post('/candidates', [CandidateController::class, 'store'])->name('candidates.store');
