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
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string(column: 'nom');
            $table->text(column: 'description');
            $table->decimal(column: 'prix');
            $table->integer(column: 'quantite_stock');
            $table->integer(column: 'seuil_alerte');
            $table->timestamps();});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produits');
    }
};
