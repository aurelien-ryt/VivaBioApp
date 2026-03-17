<?php

namespace Database\Seeders;

use App\Models\Commande;
use App\Models\Panier;
use App\Models\User;
use Illuminate\Database\Seeder;

class CommandeSeeder extends Seeder
{
    public function run(): void
    {
        $clients = User::where('role', 'client')->get();
        $paniers = Panier::all();

        $statuts = ['en_attente', 'validee', 'livree'];

        foreach ($clients as $index => $client) {
            $panier = $paniers->get($index);

            if (!$panier) {
                continue;
            }

            Commande::create([
                'user_id'       => $client->id,
                'panier_id'     => $panier->id,
                'date_commande' => now()->subDays(rand(1, 30)),
                'statut'        => $statuts[$index % count($statuts)],
                'total'         => rand(20, 150) + 0.90,
            ]);
        }
    }
}
