<?php

namespace Database\Seeders;

use App\Models\LignePanier;
use App\Models\Panier;
use App\Models\Produit;
use Illuminate\Database\Seeder;

class LignePanierSeeder extends Seeder
{
    public function run(): void
    {
        $paniers  = Panier::all();
        $produits = Produit::all();

        $lignes = [
            // Panier 1 — zilan
            ['panier' => 0, 'produit' => 0, 'quantite' => 2],
            ['panier' => 0, 'produit' => 2, 'quantite' => 1],

            // Panier 2 — thomas
            ['panier' => 1, 'produit' => 1, 'quantite' => 3],
            ['panier' => 1, 'produit' => 3, 'quantite' => 1],
            ['panier' => 1, 'produit' => 4, 'quantite' => 2],

            // Panier 3 — lea
            ['panier' => 2, 'produit' => 2, 'quantite' => 1],
            ['panier' => 2, 'produit' => 0, 'quantite' => 1],
        ];

        foreach ($lignes as $ligne) {
            $panier  = $paniers->get($ligne['panier']);
            $produit = $produits->get($ligne['produit']);

            if ($panier && $produit) {
                LignePanier::create([
                    'panier_id'    => $panier->id,
                    'produit_id'   => $produit->id,
                    'quantite'     => $ligne['quantite'],
                    'prix_unitaire' => $produit->prix,
                ]);
            }
        }
    }
}
