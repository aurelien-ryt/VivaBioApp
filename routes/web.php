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

// Catalogue
Route::get('/catalogue', [CatalogueController::class, 'show'])->name('catalogue.show');
Route::get('/catalogue/panier', function () {
    return view('clt.Panier');
})->name('clt.panier');


// Gestionnaire
Route::/*middleware(['auth', 'role:gestionnaire']) TODO : METTRE EN PLACE L'AUTHENTIFCATION AVEC ROLE
    ->*/ get('/gest/dashboard', [Gestion::class, 'vueDashboard'])
    ->name('gestionnaire.dashboard');

Route::/*middleware(['auth', 'role:gestionnaire'])
    ->*/resource('produits', ProduitController::class);