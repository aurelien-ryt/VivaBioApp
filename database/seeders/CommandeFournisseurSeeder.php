<?php

namespace Database\Seeders;

use App\Models\CommandeFournisseur;
use App\Models\Fournisseur;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommandeFournisseurSeeder extends Seeder
{
    public function run(): void
    {
        $admin       = User::where('nom', 'admin')->first();
        $fournisseurs = Fournisseur::all();

        foreach ($fournisseurs->take(2) as $fournisseur) {
            CommandeFournisseur::create([
                'fournisseur_id' => $fournisseur->id,
                'utilisateur_id' => $admin->id,
                'status'         => false,
            ]);
        }
    }
}
