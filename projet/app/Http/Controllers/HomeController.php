<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Temoignage;
use App\Produit;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index( )
    {
         $categori= Categorie::where('libelle','=','construction')->first();

     $projets = Produit::orderBy('id','DESC')->where('categorie_id',$categori->id)->count();
      $categori= Categorie::where('libelle','=','immeuble')->first();

$immeubles= Produit::where('categorie_id','=',$categori->id)->count();

        $notificationscount = auth()->user()->unreadNotifications->count();

        $notifications =auth()->user()->unreadNotifications;

        $produits = Produit::orderBy('id','DESC')->get();
         $temoignages = Temoignage::orderBy('id','DESC')->get();
        $categories = Categorie::orderBy('id','DESC')->get();

        return view('home',compact('categories','temoignages','produits','notifications','notificationscount','immeubles','projets'));

    }


}
