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
        Schema::create('historique_mouvements', function (Blueprint $table) {
            $table->id();
            $table->string('type_mouvement');
            $table->integer('quantite');
            $table->foreignId('id_produit')->constrained('produits');
            $table->foreignId('id_utilisateur')->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_mouvements');
    }
};
