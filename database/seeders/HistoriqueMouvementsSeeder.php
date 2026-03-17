<?php

namespace Database\Seeders;

use App\Models\Produit;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Database\Seeder;

class HistoriqueMouvementsSeeder extends Seeder
{
    public function run(): void
    {
        $admin    = User::where('nom', 'admin')->first();
        $produits = Produit::all();

        $mouvements = [
            ['produit' => 0, 'type' => 'entree',  'quantite' => 50],
            ['produit' => 1, 'type' => 'entree',  'quantite' => 120],
            ['produit' => 2, 'type' => 'entree',  'quantite' => 20],
            ['produit' => 2, 'type' => 'sortie',  'quantite' => 15],
            ['produit' => 3, 'type' => 'entree',  'quantite' => 80],
            ['produit' => 4, 'type' => 'entree',  'quantite' => 60],
            ['produit' => 0, 'type' => 'sortie',  'quantite' => 5],
        ];

        foreach ($mouvements as $mouvement) {
            $produit = $produits->get($mouvement['produit']);

            if ($produit) {
                Stock::create([
                    'type_mouvement' => $mouvement['type'],
                    'quantite'       => $mouvement['quantite'],
                    'id_produit'     => $produit->id,
                    'id_utilisateur' => $admin->id,
                ]);
            }
        }
    }
}
