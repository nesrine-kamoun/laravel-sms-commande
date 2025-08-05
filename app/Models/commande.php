<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    public function commande()
{
    return $this->belongsTo(Commande::class);
}

}
