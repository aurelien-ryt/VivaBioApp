<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoriqueMouvement extends Model
{
    protected $fillable = ['type_mouvement', 'quantite', 'id_produit', 'id_utilisateur'];

    public function produit()
    {
        return $this->belongsTo(Produit::class, 'id_produit');
    }

    public function utilisateur()
    {
        return $this->belongsTo(User::class, 'id_utilisateur');
    }
}
