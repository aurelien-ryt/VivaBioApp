<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index()
    {
        // Exemple : retourner la vue "users.index"
        return view('users.index');
    }

    public function show($id)
    {
        // Exemple : afficher un utilisateur précis
        return "Utilisateur ID : " . $id;
    }
}
