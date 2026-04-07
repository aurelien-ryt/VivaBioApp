<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('lignes_commande', 'ligne_commandes');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('ligne_commandes', 'lignes_commande');
    }
};
