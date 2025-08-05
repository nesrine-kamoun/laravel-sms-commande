<?php

use App\Http\Controllers\DetailCommandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProductController;

// Page d'accueil redirige vers liste des commandes
Route::get('/', [CommandeController::class, 'index'])->name('commandes.index');

// Commandes routes
Route::get('/commandes', [CommandeController::class, 'index'])->name('commandes.index');
Route::get('/commande', [CommandeController::class, 'create'])->name('commande.create');
Route::post('/commande', [CommandeController::class, 'store'])->name('commande.store');
Route::get('/commande/{id}', [CommandeController::class, 'detaille'])->name('commande.detaille');
Route::get('/commandes/{id}', [CommandeController::class, 'show'])->name('commandes.show');
Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('commandes.destroy');

// Detail commandes routes
Route::get('/detail_commandes/{id}/editClient', [DetailCommandeController::class, 'editClient'])->name('detail_commandes.editClient');
Route::put('/detail_commandes/{id}/updateClient', [DetailCommandeController::class, 'updateClient'])->name('detail_commandes.updateClient');

// Dashboard route
Route::get('/dashboard', function () {
    return view('front.commandes.dashboard');
})->name('dashboard');

// Produits routes
Route::get('/produits', function () {
    return view('front.commandes.produits');
})->name('produits');

// Products routes (CRUD)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

