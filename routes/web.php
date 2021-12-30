<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;

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

Route::get('/', [ProjectController::class, 'index'])->name('project.index');


Route::prefix('project')->name('project.')->group(function (){
    Route::get('create', [ProjectController::class, 'create'])->name('create');
    Route::get('view/{id}', [ProjectController::class, 'view'])->name('view/');
    Route::get('edit/{id}', [ProjectController::class, 'edit'])->name('edit/');

    Route::post('store', [ProjectController::class, 'store'])->name('store');
    Route::post('update{id}', [ProjectController::class, 'update'])->name('update');
    Route::get('destroy{id}', [ProjectController::class, 'destroy'])->name('destroy');
});

Route::prefix('client')->name('client.')->group(function (){
    Route::get('', [ClientController::class, 'index'])->name('index');
    Route::get('create', [ClientController::class, 'create'])->name('create');
    Route::get('view/{id}', [ClientController::class, 'view'])->name('view/');
    Route::get('edit/{id}', [ClientController::class, 'edit'])->name('edit/');

    Route::post('store', [ClientController::class, 'store'])->name('store');
    Route::post('update{id}', [ClientController::class, 'update'])->name('update');
    Route::get('destroy{id}', [ClientController::class, 'destroy'])->name('destroy');
});
