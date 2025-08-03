<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
    use HasFactory;

    protected $fillable = [
        'commande_id',
        'libelle_article',
        'qnt',
        'prix_article',
    ];

    public function commande()
    {
        return $this->belongsTo(Commande::class, 'commande_id');
    }
}



