<?php

use App\Http\Controllers\Type_OperationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\EntrepotController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MouvementController;
use App\Http\Controllers\OperationController;
use App\Http\Controllers\ProduitController;

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
    return view('dashboard');
});
Route::get('/dashboard', function () {
    return view('dashboard');});

Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');

// Routes pour les categories
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/create', [CategorieController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategorieController::class, 'store'])->name('categories.store');
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorie}/edit', [CategorieController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{categorie}', [CategorieController::class, 'update'])->name('categories.update');
Route::delete('/categories/{categorie}', [CategorieController::class, 'destroy'])->name('categories.destroy');

// Routes pour les fournisseurs
Route::get('/fournisseurs', [FournisseurController::class, 'index'])->name('fournisseurs.index');
Route::get('/fournisseurs/create', [FournisseurController::class, 'create'])->name('fournisseurs.create');
Route::post('/fournisseurs', [FournisseurController::class, 'store'])->name('fournisseurs.store');
Route::get('/fournisseurs/{fournisseur}', [FournisseurController::class, 'show'])->name('fournisseurs.show');
Route::get('/fournisseurs/{fournisseur}/edit', [FournisseurController::class, 'edit'])->name('fournisseurs.edit');
Route::put('/fournisseurs/{fournisseur}', [FournisseurController::class, 'update'])->name('fournisseurs.update');
Route::delete('/fournisseurs/{fournisseur}', [FournisseurController::class, 'destroy'])->name('fournisseurs.destroy');

// Routes pour les produits
Route::get('/produits', [ProduitController::class, 'index'])->name('produits.index');
Route::get('/produits/create', [ProduitController::class, 'create'])->name('produits.create');
Route::post('/produits', [ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{produit}', [ProduitController::class, 'show'])->name('produits.show');
Route::get('/produits/{produit}/edit', [ProduitController::class, 'edit'])->name('produits.edit');
Route::put('/produits/{produit}', [ProduitController::class, 'update'])->name('produits.update');
Route::delete('/produits/{produit}', [ProduitController::class, 'destroy'])->name('produits.destroy');

Route::get('/search-produits-autocomplete', [ProduitController::class, 'searchProduitAutocomplete'])->name('searchProduitAutocomplete');


// Routes pour les mouvements
Route::get('/mouvements', [MouvementController::class, 'index'])->name('mouvements.index');
Route::get('/mouvements/create', [MouvementController::class, 'create'])->name('mouvements.create');
Route::post('/mouvements', [MouvementController::class, 'store'])->name('mouvements.store');
Route::get('/mouvements/{mouvement}', [MouvementController::class, 'show'])->name('mouvements.show');
Route::get('/mouvements/{mouvement}/edit', [MouvementController::class, 'edit'])->name('mouvements.edit');
Route::put('/mouvements/{mouvement}', [MouvementController::class, 'update'])->name('mouvements.update');
Route::delete('/mouvements/{mouvement}', [MouvementController::class, 'destroy'])->name('mouvements.destroy');
Route::get('/search-produits-autocomplete', [MouvementController::class, 'searchproduitAutocomplete'])->name('searchproduitAutocomplete');


// Routes pour les operations
Route::get('/operations', [OperationController::class, 'index'])->name('operations.index');
Route::get('/operations/create', [OperationController::class, 'create'])->name('operations.create');
Route::post('/operations', [OperationController::class, 'store'])->name('operations.store');
Route::get('/operations/{operation}', [OperationController::class, 'show'])->name('operations.show');
Route::get('/operations/{operation}/edit', [OperationController::class, 'edit'])->name('operations.edit');
Route::put('/operations/{operation}', [OperationController::class, 'update'])->name('operations.update');
Route::delete('/operations/{operation}', [OperationController::class, 'destroy'])->name('operations.destroy');

// Routes pour les typeoperations
Route::get('/typeoperations', [Type_OperationController::class, 'index'])->name('typeoperations.index');
Route::get('/typeoperations/create', [Type_OperationController::class, 'create'])->name('typeoperations.create');
Route::post('/typeoperations', [Type_OperationController::class, 'store'])->name('typeoperations.store');
Route::get('/typeoperations/{categorie}', [Type_OperationController::class, 'show'])->name('typeoperations.show');
Route::get('/typeoperations/{categorie}/edit', [Type_OperationController::class, 'edit'])->name('typeoperations.edit');
Route::put('/typeoperations/{categorie}', [Type_OperationController::class, 'update'])->name('typeoperations.update');
Route::delete('/typeoperations/{categorie}', [Type_OperationController::class, 'destroy'])->name('typeoperations.destroy');

// Routes pour les entrepots
Route::get('/entrepots', [EntrepotController::class, 'index'])->name('entrepots.index');
Route::get('/entrepots/create', [EntrepotController::class, 'create'])->name('entrepots.create');
Route::post('/entrepots', [EntrepotController::class, 'store'])->name('entrepots.store');
Route::get('/entrepots/{categorie}', [EntrepotController::class, 'show'])->name('entrepots.show');
Route::get('/entrepots/{categorie}/edit', [EntrepotController::class, 'edit'])->name('entrepots.edit');
Route::put('/entrepots/{categorie}', [EntrepotController::class, 'update'])->name('entrepots.update');
Route::delete('/entrepots/{categorie}', [EntrepotController::class, 'destroy'])->name('entrepots.destroy');

