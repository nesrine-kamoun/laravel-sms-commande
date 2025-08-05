<?php
use App\Http\Controllers\DetailCommandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProductController;

Route::get('/commandes',[CommandeController::class,'index'])->name('commandes.index');
Route::get('/',[CommandeController::class,'index'])->name('commandes.index');

Route::get('/commande',[commandeController::class,'create']);
Route::get('/commande/{id}',[commandeController::class,'detaille']);

Route::post('/commande',[commandeController::class,'store'])->name('commande.store');
Route::get('/commandes/{id}',[CommandeController::class,'show'])->name('commandes.show');
Route::get('/detail_commandes/{id}/editClient', [DetailCommandeController::class, 'editClient'])->name('detail_commandes.editClient');
Route::put('/detail_commandes/{id}/updateClient', [DetailCommandeController::class, 'updateClient'])->name('detail_commandes.updateClient');

Route::delete('/commandes/{id}', [CommandeController::class, 'destroy'])->name('commandes.destroy');
Route::get('/dashboard', function () {
    return view('front.commandes.dashboard');
})->name('dashboard');


Route::get('/produits', function () {
    return view('front.commandes.produits');
})->name('produits');
  

Route::get('/products', [ProductController::class, 'index'])->name('products.index');



Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');

Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');




















