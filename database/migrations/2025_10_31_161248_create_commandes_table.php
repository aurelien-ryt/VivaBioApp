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
        Schema::create('commandes', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->string('statut')->default('en_attente');
            $table->decimal('total', 10, 2)->default(0);
            $table->timestamps();
=======
           $table->id();
            $table->date('date_commande');
            $table->string('statut');
            $table->foreignId('id_utilisateur')->constrained('users');
            $table->foreignId('id_panier')->constrained('paniers');
>>>>>>> 51e79976 (Adding some features)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
