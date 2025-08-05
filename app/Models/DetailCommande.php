<?php

namespace App\Models;

<<<<<<< HEAD
use Illuminate\Database\Eloquent\Factories\HasFactory;
=======
>>>>>>> 77b1b4b58e6b52d6a4f5380e614526d692c4638f
use Illuminate\Database\Eloquent\Model;

class DetailCommande extends Model
{
<<<<<<< HEAD
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



=======
    public function commande()
{
    return $this->belongsTo(Commande::class);
}

}
>>>>>>> 77b1b4b58e6b52d6a4f5380e614526d692c4638f
