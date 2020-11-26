<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Produitimage;
use App\Categorie;


class DescproduitController extends Controller
{
   


	 public function index($id){

	$prod= Produit::find($id);

	$produitimages = produitimage::where('produit_id',$id)->get();
	
	
		return view('descproduit',compact('prod','produitimages'));
	

  		
    }

   

}
