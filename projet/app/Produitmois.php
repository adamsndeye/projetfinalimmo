<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produitmois extends Model
{
     protected $fillable = [
      'titre','description','image','ajouter_par','produit_id'
    ];


    public function produit(){

    	return $this->belongsTo('App\Produit');
    }
}
