<?php

namespace Database\Seeders;

use App\Models\Fournisseur;
use Illuminate\Database\Seeder;

class FournisseurSeeder extends Seeder
{
    public function run(): void
    {
        $fournisseurs = [
            [
                'nom_fournisseur' => 'BioNature SARL',
                'adresse'         => '12 rue des Oliviers, 75011 Paris',
                'contact'         => 'contact@bionature.fr',
            ],
            [
                'nom_fournisseur' => 'EcoGreen SAS',
                'adresse'         => '8 avenue des Alpes, 69003 Lyon',
                'contact'         => 'info@ecogreen.fr',
            ],
            [
                'nom_fournisseur' => 'NaturalPro',
                'adresse'         => '3 chemin des Vignes, 33000 Bordeaux',
                'contact'         => 'commandes@naturalpro.fr',
            ],
        ];

        foreach ($fournisseurs as $fournisseur) {
            Fournisseur::create($fournisseur);
        }
    }
}
