<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['user_id', 'panier_id', 'date_commande', 'statut', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function panier()
    {
        return $this->belongsTo(Panier::class);
    }
}
