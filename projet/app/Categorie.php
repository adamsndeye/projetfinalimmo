<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
     protected $fillable = [
        'libelle', 'ajouter_par'
    ];
    public function produits(){

    	return $this->hasMany('App\Produit');
    }
}
