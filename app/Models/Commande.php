<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DetailCommande;

class Commande extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_surname',
        'client_email',
        'client_phone',
        'total',
        'subtotal',
    ];

    public function details()
    {
        return $this->hasMany(DetailCommande::class, 'commande_id');
    }
}





                                                                         