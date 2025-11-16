<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ProduitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('produits')->insert([
            'nom' => "Sérum anti-taches",
            'description' => "Un sérum anti-taches pour les taches de la peau",
            'prix' => 10,
            'quantite_stock' => 100,
            'seuil_alerte' => 10,
        ]);
    }
}
