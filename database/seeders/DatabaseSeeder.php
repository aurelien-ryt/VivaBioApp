<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ProduitSeeder::class,
            FournisseurSeeder::class,
            PanierSeeder::class,
            LignePanierSeeder::class,
            CommandeSeeder::class,
            CommandeFournisseurSeeder::class,
            LigneCommandeFournisseurSeeder::class,
            HistoriqueMouvementsSeeder::class,
        ]);
    }
}
