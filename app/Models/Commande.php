<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    protected $fillable = ['user_id', 'statut', 'total'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
