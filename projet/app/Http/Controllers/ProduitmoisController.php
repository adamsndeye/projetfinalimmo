<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Produitmois;
use App\Produit;
use Auth;

class ProduitmoisController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $produitmois = Produitmois::orderBy('id','DESC')->paginate(5);
        

        return view('admin.produit-mois.index')
            ->with('produitmois', $produitmois);
    }
    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
         $produits= Produit::get();
        return view('admin.produit-mois.create',compact('produits'));
    }

    public function store(Request $request){


   
    	$id=Auth::user()->id;
        $input = $request->all();
        $produit=$request->affichID;
        dd($produit);
         $input['ajouter_par']=$id;
          $input['produit_id']=$id;
          $photo=$request->file('image');
       
    $produitmois= Produitmois::create($input);
        if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                    $produitmois->fill(['image' => asset($path)])->save();
               }
    
        return redirect()->route('admin.produit-mois.index');
}

 public function edit($id) {
         $produitmois = Produitmois::findOrFail($id); 
        
        return view('admin.produit-mois.edit', compact('produitmois')); 

    }

  public function update($id, Request $request){

         $imageproduit = Produitimage::find($id);
        $id=Auth::user()->id;
      
 		 $imageproduit->ajouter_par = $id;
 		 $imageproduit->produit_id = $request->produit_id;
 		

         $photo=$request->file('image');
        

       $imageproduit->save();
		if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                   $produit->fill(['image' => asset($path)])->save();
               }
       

        return redirect(route('admin.produitmois.index'));
    }

	public function show($id) {
       $produitmois = Produitimage::findOrFail($id); 
        
        return view('admin.produitmois.show', compact('produitmois')); 

    }

    public function destroy($id,Request $request)
    {
    $produitmois = Produitmois::findOrFail($id);
       $produitmois->delete();

        return redirect()->route('admin.produit-mois.index');
    }

}
