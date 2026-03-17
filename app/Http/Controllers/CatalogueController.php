<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class CatalogueController extends Controller
{
    public function show(Request $request)
    {
        $recherche = $request->input('recherche');

        $produits = Produit::when($recherche, function ($query) use ($recherche) {
            $query->where('nom', 'like', '%' . $recherche . '%')
                  ->orWhere('description', 'like', '%' . $recherche . '%');
        })->get();

        return view('clt.Catalogue', compact('produits', 'recherche'));
    }
}