<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Produit;
use App\Produitimage;
use App\Categorie;
use App\Produitmois;
use Auth;
use DB;

class ProduitController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $prod=Produit::where('produitmois','=',1)->first();
         $prodvedette=Produit::where('produitvedette','=',1)->first();
        $produits = Produit::orderBy('id','DESC')->get();
        $produitmois=Produitmois::get();
        

        return view('admin.produits.index',compact('produitmois','produits','prod','prodvedette'));
           
    }
    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
        $categories= Categorie::get();
        
        return view('admin.produits.create',compact('categories'));
    }
    public function produitimage($id){
    	$produit = Produit::findOrFail($id); 
    	return view('admin.produits.produitimage',compact('produit'));
    }
     public function produitmois($id){
        $produit = Produit::findOrFail($id); 
        $imageproduits= DB::table('produitimages')->where('produit_id','=',$id)->get();

        return view('admin.produits.produitmois',compact('produit','imageproduits'));
    }

    public function addimage(Request $request){

		$id=Auth::user()->id;
        $input = $request->all();

         $input['ajouter_par']=$id;
         

          $photo=$request->file('image');
       
    $imageproduit= Produitimage::create($input);
        if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                    $imageproduit->fill(['image' => asset($path)])->save();
               }
    
        return redirect()->route('admin.produits.index');

    }

    public function store(Request $request){


   
    	$id=Auth::user()->id;
        $input = $request->all();

         $input['ajouter_par']=$id;
          $photo=$request->file('image');
        $produit = Produit::create($input);
        if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                   $produit->fill(['image' => asset($path)])->save();
               }
    
        return redirect()->route('admin.produits.index');
}
 public function edit($id) {
        $produit = Produit::findOrFail($id); 
        $categories = Categorie::get(); 

        return view('admin.produits.edit', compact('produit', 'categories')); 

    }
  public function update($id, Request $request){

        $produit = Produit::find($id);
        $id=Auth::user()->id;
        $produit->nom = $request->nom;
 		$produit->description = $request->description;
 		$produit->ajouter_par = $id;
 		$produit->categorie_id = $request->categorie_id;
 		$produit->adresse = $request->adresse;
 		$produit->piece= $request->piece;
 		$produit->prix = $request->prix;
 		$produit->superficie = $request->superficie;

         $photo=$request->file('image');
        

        $produit->save();
		if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                   $produit->fill(['image' => asset($path)])->save();
               }
       

        return redirect(route('admin.produits.index'));
             }


     public function updateproduit(Request $request){
        
     $input= $request->all();
     
         $idproduit = $request->affichID;
            dd($idproduit);   
             DB::table('produits')
              ->where('id', $idproduit)
              ->update($input,['produitmois' => 1]);    
         return view('admin.produits.show', compact('produit')); 
        }


	public function show($id) {
        $produit = Produit::findOrFail($id); 
        
$imageproduits= DB::table('produitimages')->where('produit_id','=',$id)->get();


        return view('admin.produits.show', compact('produit','imageproduits')); 

    }
    public function destroy($id,Request $request)
    {
     $produit = Produit::findOrFail($id);
        $produit->delete();

        return redirect()->route('admin.produits.index');
    }

     public function addproduitmois(Request $request){
         $produitid=$request->affichID;
        $produitmois=Produit::find( $produitid);

        $id=Auth::user()->id;
        $produitmois->titreannonce=$request->titre;
         $produitmois->describannonce=$request->description;
         $produitmois->ajouter_par=$id;
         $produitmois->produitmois=1;
         $produitmois->save();
         $photo=$request->file('imageannonce');

        if ($request->file('imageannonce')) {
                   $path = Storage::disk('public')->put('images',$request->file('imageannonce'));
                    $produitmois->fill(['imageannonce' => asset($path)])->save();
               }
       
         

        
        return redirect()->route('admin.produits.index');
}
public function addproduitvedette(Request $request){
         $produitid=$request->affichID;
        $produitvedette=Produit::find( $produitid);

        $id=Auth::user()->id;
        $produitvedette->titreannonce=$request->titreproduitv;
         $produitvedette->describannonce=$request->descriptionproduitv;
         $produitvedette->ajouter_par=$id;
         $produitvedette->produitvedette=1;
         $produitvedette->save();
         $photo=$request->file('imageannonce');

        if ($request->file('imageannonce')) {
                   $path = Storage::disk('public')->put('images',$request->file('imageannonce'));
                    $produitvedette->fill(['imageannonce' => asset($path)])->save();
               }
       
         

        
        return redirect()->route('admin.produits.index');
}



    public function updateproduitmois( Request $request){

        $produit=$request->produitID;
        DB::table('produits')->where('id', '=', $produit)->update(['produitmois' =>0]); 
                     
    
        return redirect()->route('admin.produits.index');

        }
        public function updateproduitvedette( Request $request){

        $produit=$request->ID;
        DB::table('produits')->where('id', '=', $produit)->update(['produitvedette' => 0]); 
                     
    
        return redirect()->route('admin.produits.index');

        }
}
