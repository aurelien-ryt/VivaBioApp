<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    protected $fillable = ['nom_fournisseur', 'adresse', 'contact'];

    public function commandeFournisseurs()
    {
        return $this->hasMany(CommandeFournisseur::class);
    }
}
