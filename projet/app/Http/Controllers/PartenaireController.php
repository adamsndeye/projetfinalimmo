<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;

use Illuminate\Support\Facades\Storage;
use Auth;

class PartenaireController extends Controller
{
   
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $partenaires = Partenaire::orderBy('id','DESC')->paginate(5);

        return view('admin.partenaires.index')
            ->with('partenaires', $partenaires);
    }
    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
       
        
        return view('admin.partenaires.create');
    }

    public function store(Request $request){


   
    	$id=Auth::user()->id;
        $input = $request->all();

         $input['ajouter_par']=$id;
          $photo=$request->file('logo');
        $produit = Partenaire::create($input);
        if ($request->file('logo')) {
                   $path = Storage::disk('public')->put('images',$request->file('logo'));
                   $produit->fill(['logo' => asset($path)])->save();
               }
    
        return redirect()->route('admin.partenaires.index');
}
 public function edit($id) {
        $partenaire = Partenaire::findOrFail($id); 
       

        return view('admin.partenaires.edit', compact('partenaire')); 

    }
  public function update($id, Request $request){

        $partenaire = Partenaire::find($id);
        $id=Auth::user()->id;
        $partenaire->nom = $request->nom;
 		
 		 $partenaire->ajouter_par = $id;
 		
 		

         $photo=$request->file('logo');
        

         $partenaire->save();
		if ($request->file('logo')) {
                   $path = Storage::disk('public')->put('images',$request->file('logo'));
                    $partenaire->fill(['logo' => asset($path)])->save();
               }
       

        return redirect(route('admin.partenaires.index'));
    }

	public function show($id) {
       $partenaire = Partenaire::findOrFail($id); 
        

        return view('admin.partenaires.show', compact('partenaire')); 

    }
    public function destroy($id,Request $request)
    {
     $partenaire = Partenaire::findOrFail($id);
        $partenaire->delete();

        return redirect()->route('admin.partenaires.index');
    }


}
