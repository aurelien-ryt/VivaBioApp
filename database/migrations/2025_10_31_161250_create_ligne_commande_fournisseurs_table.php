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
        Schema::create('ligne_commande_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->integer('quantité');
            $table->foreignId('commande_fournisseur_id')->constrained();
            $table->foreignId('produit_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ligne_commande_fournisseurs');
    }
};
