<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partenaire extends Model
{
     protected $fillable = [
        'nom', 'logo','ajouter_par'
    ];
}
