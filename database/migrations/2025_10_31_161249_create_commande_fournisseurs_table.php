<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('commande_fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(false);

            // 🔗 Relations
            $table->foreignId('fournisseur_id')
                  ->constrained('fournisseurs')
                  ->cascadeOnDelete();

            $table->foreignId('utilisateur_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('commande_fournisseurs');
    }
};

