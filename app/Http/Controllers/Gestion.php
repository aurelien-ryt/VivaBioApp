<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use App\Models\Produit;
use App\Models\User;


class Gestion extends Controller
{
    public function vueDashboard() 
    {        
        $produits = Produit::all();
        $users = User::all();

        return view('dashboard' , compact('produits'), compact('users'));


    }
}
