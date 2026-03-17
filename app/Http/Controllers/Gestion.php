<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Produit;

use Illuminate\Http\Request;

class Gestion extends Controller
{
    public function vueDashboard() 
    {        
        $produits = Produit::all();
        return view('dashboard' , compact('produits'));
    }
}
