<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\MatiereController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();
Route::prefix('admin')->middleware(['auth','admin'])->group(function(){


        Route::resource('matieres', MatiereController::class);
        Route::resource('enseignants', EnseignantController::class);
        Route::resource('eleves', EleveController::class);
        Route::resource('classes', ClasseController::class);
        


});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('prof')->middleware(['auth','prof'])->group(function(){

        // Route::get('/testprof',function () { return "hi prof";});
        


});

