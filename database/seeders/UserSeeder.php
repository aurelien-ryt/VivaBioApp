<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'nom'      => 'admin',
                'prenom'   => 'Admin',
                'email'    => 'admin@vivabio.fr',
                'password' => Hash::make('azerty'),
                'role'     => 'gestionnaire',
            ],
            [
                'nom'      => 'aurelien',
                'prenom'   => 'Aurélien',
                'email'    => 'aurelien@vivabio.fr',
                'password' => Hash::make('azerty'),
                'role'     => 'gestionnaire',
            ],
            [
                'nom'      => 'zilan',
                'prenom'   => 'Zilan',
                'email'    => 'zilan@vivabio.fr',
                'password' => Hash::make('azerty'),
                'role'     => 'client',
            ],
            [
                'nom'      => 'thomas',
                'prenom'   => 'Thomas',
                'email'    => 'thomas@vivabio.fr',
                'password' => Hash::make('azerty'),
                'role'     => 'client',
            ],
            [
                'nom'      => 'lea',
                'prenom'   => 'Léa',
                'email'    => 'lea@vivabio.fr',
                'password' => Hash::make('azerty'),
                'role'     => 'client',
            ],
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
