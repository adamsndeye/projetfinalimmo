<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Categorie;
use App\Partenaire;
use App\Apropos;
use App\Temoignage;
use App\Contact;
use App\Produitmois;

class WelcomeController extends Controller
{
  

public function index(){
	 $produits = Produit::orderBy('id','DESC')->paginate(6);
	  $partenaires = Partenaire::orderBy('id','DESC')->paginate(6);
	 $categori= Categorie::where('libelle','=','construction')->first();

	 $projets = Produit::orderBy('id','DESC')->where('categorie_id',$categori->id)->get();
	 

	 $categories = Categorie::orderBy('id','DESC')->paginate(6);
	 $quisommenous= Apropos::get();

	 $produitmois=Produit::where('produitmois','=',1)->first();
	 
	 $temoignages=Temoignage::get();
return view('welcome',compact('produits','categories','projets','partenaires','quisommenous','produitmois','temoignages'));
}


public function store(Request $request)
{

     $input= $request->all();
   
     $contact=Contact::create($input);

		return view('welcome')->with('message','Votre message a été bien envoyer');

}


public function pageproduitindex(){
$produits = Produit::orderBy('id','DESC')->get();
 $categori= Categorie::where('libelle','=','immeuble')->first();

$immeubles= Produit::where('categorie_id','=',$categori->id)->get();
 $categori= Categorie::where('libelle','=','construction')->first();
 	
 	$produitvedette=Produit::where('produitvedette','=',1)->first();
	 $projets = Produit::orderBy('id','DESC')->where('categorie_id',$categori->id)->get();
	return view('page-produit',compact('produits','immeubles','projets','produitvedette'));
}

}