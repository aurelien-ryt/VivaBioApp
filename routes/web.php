<?php

use App\Http\Controllers\CatalogueController;
use App\Http\Controllers\Gestion;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProduitController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentification
Route::get('/login', [UserController::class, 'vueLoginForm'])->name('users.login');
Route::post('/login', [UserController::class, 'login'])->name('users.login.post');

Route::get('/register', [UserController::class, 'vueRegisterForm'])->name('users.register');
Route::post('/register', [UserController::class, 'register'])->name('users.register.post');

Route::post('/logout', [UserController::class, 'logout'])->name('users.logout');

// Catalogue (public)
Route::get('/catalogue', [CatalogueController::class, 'show'])->name('catalogue.show');

// Gestionnaire
Route::middleware(['auth', 'role:gestionnaire'])->group(function () {
    Route::get('/gest/dashboard', [Gestion::class, 'vueDashboard'])->name('gestionnaire.dashboard');
    Route::resource('produits', ProduitController::class);
});

// Client
Route::middleware(['auth'])->group(function () {
    Route::get('/catalogue/panier', function () {
        return view('clt.Panier');
    })->name('clt.panier');
    Route::get('/catalogue/produit/{produit}', [ProduitController::class, 'show'])->name('produit.show');
});
