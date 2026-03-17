<?php

namespace Database\Seeders;

use App\Models\CommandeFournisseur;
use App\Models\LigneCommandeFournisseur;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class LigneCommandeFournisseurSeeder extends Seeder
{
    public function run(): void
    {
        $commandes = CommandeFournisseur::all();
        $produits  = Produit::all();

        $lignes = [
            // Commande fournisseur 1
            ['commande' => 0, 'produit' => 0, 'quantite' => 50],
            ['commande' => 0, 'produit' => 2, 'quantite' => 30],

            // Commande fournisseur 2
            ['commande' => 1, 'produit' => 1, 'quantite' => 100],
            ['commande' => 1, 'produit' => 3, 'quantite' => 40],
            ['commande' => 1, 'produit' => 4, 'quantite' => 60],
        ];

        foreach ($lignes as $ligne) {
            $commande = $commandes->get($ligne['commande']);
            $produit  = $produits->get($ligne['produit']);

            if ($commande && $produit) {
                LigneCommandeFournisseur::create([
                    'commande_fournisseur_id' => $commande->id,
                    'produit_id'              => $produit->id,
                    'quantite'                => $ligne['quantite'],
                ]);
            }
        }
    }
}
