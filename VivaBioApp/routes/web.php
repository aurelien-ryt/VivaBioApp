<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ConnexionController;

// ------------------- Vues Générales ----------------------
Route::get('/', function () {
    return view('accueil'); // fichier : resources/views/accueil.blade.php
});

// ------------------- Inscription --------------------
Route::get('/Inscription', [InscriptionController::class, 'index'])->name('inscription.index');
Route::get('/Inscription/{id}', [InscriptionController::class, 'show'])->name('inscription.show');

// ------------------- Connexion ----------------------
Route::get('/Connexion', [ConnexionController::class, 'index'])->name('connexion.index');




// ------------------- Clients ----------------------
Route::get('/Clt/{num}/Catalogue', function ($num) {
    return ("vue catalogue de $num");
});

Route::get('/Clt/{num}/Catalogue/Produit/{id}', function ($num, $id) {
    return ("En tant que $num , je consulte le produit $id");
});

Route::get('/Clt/{num}/Produit/{id}/Panier', function ($num, $id) {
    return ("$num Ajoute un produit au panier l'article $id");
});

Route::get('/Clt/{num}/Commande/{id}', function ($num, $id) {
    return ('Consulter ma commande');
});

Route::get('/Clt/{num}/Commande/{id}/AnnulerCommande', function ($num, $id) {
    return ("Je suis $num et j'annule ma commande $id");
});


Route::get('/Clt/{num}/Commande/Payer', function ($num) {
    return ('Payer la commande');
});

// ------------------- Employés polyvalents  ----------------------

Route::get('/EP/{num}/Catalogue', function ($num) {
    return ("vue catalogue de $num");
});

Route::get('/EP/{num}/Catalogue/Produit/{id}', function ($num, $id) {
    return ("En tant que $num , je consulte le produit $id");
});

Route::get('EP/{num}/Stock/FicheProduit/{id}', function ($num, $id) {
    return view('Formulaire qui crée un nouvel article');
});


Route::get('/EP/{num}/Commande', function ($num) {
    return ('Consulter la commande');
});

use App\Http\Controllers\StockController ;
Route::get('EP/{num}/Stock', function ($num) {
    return view("Consulter l'état des stocks emp : $num");
});


Route::get('EP/{num}/Stock', function () {
    return view('Retirer du stock pour une commande');
});




// -------------------Gestionnaire de stocks ---------------------- 

Route::get('/Gest/{num}/Catalogue', function ($num) {
    return ("vue catalogue de $num");
});

Route::get('/Gest/{num}/Catalogue/Produit/{id}', function ($num, $id) {
    return ("En tant que $num , je consulte le produit $id");
});


Route::get('Gest/{num}/Stock', function ($num) {
    return view("Consulter les stocks emp : $num");
});

Route::get('/Gest/{num}/Stock/Produit/{id}', function ($num, $id) {
    return ("En tant que $num , je consulte le produit $id");
});

Route::get('/Gest/{num}/Stock/GererProduits', function ($num, $id) {
    return view(' $num modifie le produit $id'); 
});

Route::get('/Gest/{num}/Stock/Produit/${id}', function ($num, $id) {
    return view('Définir un seuil');
});
