<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'libelle',
        'prix',
        'qnt'
    ];
    public function detailCommandes()
{
    return $this->hasMany(DetailCommande::class, 'product_id');
}



}

