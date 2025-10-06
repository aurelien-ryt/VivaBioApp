<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function index()
    {
        return view('inscription.index');
    }

    public function show($id)
    {
        return "Détails de l'inscription n°$id";
    }
}
