<?php

namespace App\Models;
            
use Illuminate\Database\Eloquent\Model;

class LigneCommandeFournisseur extends Model
{
    public $timestamps = false;

    protected $fillable = ['commande_fournisseur_id', 'produit_id', 'quantite'];

    public function commandeFournisseur()
    {
        return $this->belongsTo(CommandeFournisseur::class, 'commande_fournisseur_id');
    }

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
}
