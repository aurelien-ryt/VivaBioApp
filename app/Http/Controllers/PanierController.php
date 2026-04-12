<?php

namespace App\Http\Controllers;

use App\Models\Panier;
use App\Models\LignePanier;
use App\Models\Produit;
use Illuminate\Http\Request;

class PanierController extends Controller
{
    public function index()
    {
        $panier = Panier::where('user_id', auth()->id())->first();
        $lignes = $panier ? $panier->lignePaniers()->with('produit')->get() : [];

        return view('clt.panier', compact('panier', 'lignes'));
    }

    public function store(Request $request)
    {
        // 1. On cherche le panier de l'utilisateur, sinon on le crée
        $panier = Panier::firstOrCreate(['user_id' => auth()->id()]);

        // 2. On récupère le prix du produit depuis la BDD
        $produit = Produit::find($request->produit_id);

        // 3. On crée la ligne dans le panier
        LignePanier::create([
            'panier_id'     => $panier->id,
            'produit_id'    => $request->produit_id,
            'quantite'      => $request->quantite,
            'prix_unitaire' => $produit->prix,
        ]);

        return redirect()->back()->with('success', 'Produit ajouté au panier !');
    }
        public function destroy(LignePanier $ligne)
    {
        $ligne->delete();
        return redirect()->route('panier.index');
    }

    
}