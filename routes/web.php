<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\MatiereController;
use App\Http\Controllers\SeanceController;
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
        

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('admin.home');
        
    });

Route::prefix('prof')->middleware(['auth','prof'])->group(function(){
        
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'profhome'])->name('prof.home');
        Route::get('seances/create/{id}',[SeanceController::class,'absence'])->name('seance.absence');
        Route::post('seances/store_absence',[SeanceController::class,'store_absence'])->name('seance.store_absence');
        Route::get('/mesCLasses', [EnseignantController::class, 'mesclasses'])->name('prof.mesclasses');


});

