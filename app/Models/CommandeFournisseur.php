<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommandeFournisseur extends Model
{
    protected $fillable = ['fournisseur_id', 'utilisateur_id', 'status'];

    public function fournisseur()
    {
        return $this->belongsTo(Fournisseur::class);
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'utilisateur_id');
    }

    public function lignes()
    {
        return $this->hasMany(LigneCommandeFournisseur::class, 'commande_fournisseur_id');
    }
}
