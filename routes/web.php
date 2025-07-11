<?php

use Illuminate\Support\Facades\Route;
use
App\Http\Controllers\CommandeController;
Route::get('/commandes',[CommandeController::class,'index'])->name('commandes.index');
Route::get('/', function () {
    return view('welcome');
});
Route::get('/commande',[commandeController::class,'create']);
Route::post('/commande',[commandeController::class,'store'])->name('commande.store');