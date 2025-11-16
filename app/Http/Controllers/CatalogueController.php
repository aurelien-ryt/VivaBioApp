<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Produit;



class CatalogueController extends Controller
{
     /**
     * Show the profile for a given user.
     */
    public function show(): View
    {
        $produits = Produit::all();
        
        return view('clt.Catalogue', [
            'produits' => $produits
        ]);
    }
}
