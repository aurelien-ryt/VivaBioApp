<?php

namespace Database\Seeders;

use App\Models\Panier;
use App\Models\User;
use Illuminate\Database\Seeder;

class PanierSeeder extends Seeder
{
    public function run(): void
    {
        $clients = User::where('role', 'client')->get();

        foreach ($clients as $client) {
            Panier::create(['user_id' => $client->id]);
        }
    }
}
