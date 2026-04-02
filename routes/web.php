<?php

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
Route::get('/catalogue', [ProduitController::class, 'catalogue'])->name('catalogue.show');

// Gestionnaire
Route::middleware(['auth', 'role:gestionnaire'])->group(function () {
    Route::get('/gest/dashboard', [Gestion::class, 'vueDashboard'])->name('gestionnaire.dashboard');

    Route::resource('produits', ProduitController::class);
    Route::resource('users', UserController::class);
    
    //Partie Utilisateur
    Route::get('/gest/user/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::delete('/gest/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::put('/gest/user/{user}', [UserController::class, 'update'])->name('user.update');


});

// Client
Route::middleware(['auth'])->group(function () {
    Route::get('/catalogue/panier', function () {
        return view('clt.Panier');
    })->name('clt.panier');
    Route::get('/catalogue/produit/{produit}', [ProduitController::class, 'show'])->name('produit.show');
});
