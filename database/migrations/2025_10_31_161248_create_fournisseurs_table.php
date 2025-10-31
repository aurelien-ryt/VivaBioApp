<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fournisseurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom_fournisseur');
            $table->string('adresse');
            $table->string('contact');
            $table->timestamps(); // facultatif, mais recommandé
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fournisseurs');
    }
};
