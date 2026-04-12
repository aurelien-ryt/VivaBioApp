<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\LigneCommande; 

class CommandeController extends Controller
{
    public function index()
    {
        //
    }

    public function getCommandes()
    {
        $user_id = Auth::user()->id;
        $commandes_client = Commande::where('user_id', $user_id)->get();

        return view('commandes.resume', compact('commandes_client'));
    }

    public function store(Request $request)
    {
        $user_id = Auth::id();
        $panier = Panier::where('user_id', $user_id)->first();

        if (!$panier || $panier->lignePaniers()->count() === 0) {
            return redirect()->route('panier.index')->with('error', 'Votre panier est vide.');
        }

        $lignes = $panier->lignePaniers()->get();
        $total = $lignes->sum(fn($ligne) => $ligne->prix_unitaire * $ligne->quantite);

        $commande = Commande::create([
            'user_id'       => $user_id,
            'panier_id'     => $panier->id,
            'date_commande' => now()->toDateString(),
            'statut'        => 'en_attente',
            'total'         => $total,
        ]);

         foreach ($lignes as $ligne) {                                                                                                                               
      LigneCommande::create([                                                                                                                                 
          'commande_id'   => $commande->id,                                                                                                                   
          'produit_id'    => $ligne->produit_id,
          'quantite'      => $ligne->quantite,                                                                                                                
          'prix_unitaire' => $ligne->prix_unitaire,
      ]);                                                                                                                                                     
  } 
        $panier->lignePaniers()->delete();

        return redirect()->route('commande.show')->with('success', 'Commande passée avec succès !');
    }

    public function show(Commande $commande)
    {
        if ($commande->user_id !== auth()->id()) {
            return redirect()->route('commande.show')->with('error', 'Accès refusé.');
        }

        $lignes = $commande->ligneCommandes()->with('produit')->get();

        return view('commandes.detail', compact('commande', 'lignes'));
    }

    public function edit(Commande $commande)
    {
        //
    }

    public function update(Request $request, Commande $commande)
    {
        //
    }

    public function annuler(Commande $commande)
    {
        // BRIQUE 1 : Vérifier que la commande appartient au client connecté
        // Si user_id de la commande ≠ id du client connecté → on refuse
        if ($commande->user_id !== auth()->id()) {
            return redirect()->route('commande.show')->with('error', 'Vous ne pouvez pas annuler cette commande.');
        }

        // BRIQUE 2 : Vérifier que la commande est bien en attente
        // On ne peut pas annuler une commande déjà terminée ou déjà annulée
        if ($commande->statut !== 'en_attente') {
            return redirect()->route('commande.show')->with('error', 'Cette commande ne peut plus être annulée.');
        }

        // BRIQUE 3 : Modifier le statut
        $commande->statut = 'annulée';

        // BRIQUE 4 : Sauvegarder en BDD (sans save() rien ne s'enregistre)
        $commande->save();

        // BRIQUE 5 : Rediriger avec un message de confirmation
        return redirect()->route('commande.show')->with('success', 'Commande annulée avec succès.');
    }

    public function destroy(Commande $commande)
    {
        //
    }
}
