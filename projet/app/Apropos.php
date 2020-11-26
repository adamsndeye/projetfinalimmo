<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apropos extends Model
{
    protected $fillable = [
        'nom', 'description','adresse','telephone','email','image'
    ];
    
}
