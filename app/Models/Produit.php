<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    protected $fillable = ['nom', 'description', 'prix', 'quantite_stock', 'seuil_alerte'];

    public function lignePaniers()
    {
        return $this->hasMany(LignePanier::class);
    }

    public function ligneCommandeFournisseurs()
    {
        return $this->hasMany(LigneCommandeFournisseur::class);
    }

    public function historiqueMouvements()
    {
        return $this->hasMany(HistoriqueMouvement::class, 'id_produit');
    }
}
