<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
     protected $fillable = [
        'nom', 'description', 'image','ajouter_par','categorie_id','adresse','prix','superficie','piece','titre','description','imageannonce'
    ];
    
   
    
    public function categorie(){

    	return $this->belongsTo('App\Categorie');
    }
     public function produitmois(){

    	return $this->belongsTo('App\Produitmois');
    }
}
