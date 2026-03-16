<?php

namespace Database\Seeders;

use App\Models\Produit;
use Illuminate\Database\Seeder;

class ProduitSeeder extends Seeder
{
    public function run(): void
    {
        $produits = [
            [
                'nom' => 'Huile d\'Argan Bio',
                'description' => 'Huile pure pressée à froid, idéale pour la peau et les cheveux',
                'prix' => 24.90,
                'quantite_stock' => 50,
                'seuil_alerte' => 10,
            ],
            [
                'nom' => 'Savon au Lait de Chèvre',
                'description' => 'Savon naturel artisanal, doux pour les peaux sensibles',
                'prix' => 8.50,
                'quantite_stock' => 120,
                'seuil_alerte' => 20,
            ],
            [
                'nom' => 'Crème Hydratante Aloe Vera',
                'description' => 'Soin visage hydratant à base d\'aloe vera bio',
                'prix' => 18.00,
                'quantite_stock' => 5,
                'seuil_alerte' => 15,
            ],
        ];

        foreach ($produits as $produit) {
            Produit::create($produit);
        }
    }
}
