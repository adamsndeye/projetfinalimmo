<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partenaire;
use App\Apropos;

use Illuminate\Support\Facades\Storage;
use Auth;

class AproposController extends Controller
{




 
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $quisommenouss = Apropos::orderBy('id','DESC')->paginate(5);

        return view('admin.propos.index')
            ->with('quisommenouss', $quisommenouss);
    }
    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
       
        
        return view('admin.propos.create');
    }

    public function store(Request $request){


   
    	$id=Auth::user()->id;
        $input = $request->all();

         $input['ajouter_par']=$id;
          $photo=$request->file('image');
        $quisommenous =Apropos::create($input);
        if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                   $quisommenous->fill(['image' => asset($path)])->save();
               }
    
        return redirect()->route('admin.propos.index');
}
 public function edit($id) {
        $quisommenous = Apropos::findOrFail($id); 
       

        return view('admin.propos.edit', compact('quisommenous')); 

    }
  public function update($id, Request $request){
$quisommenous = Apropos::find($id);
        
        $quisommenous->nom = $request->nom;
 		
         $photo=$request->file('image');
        

         $quisommenous->save();
		if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                    $quisommenous->fill(['image' => asset($path)])->save();
               }
       

        return redirect(route('propos.index'));
    }

	public function show($id) {
       $quisommenous= Apropos::findOrFail($id); 
        

        return view('admin.propos.show', compact('quisommenous')); 

    }
    public function destroy($id,Request $request)
    {
     $quisommenous = Apropos::findOrFail($id);
        $quisommenous->delete();

        return redirect()->route('admin.propos.index');
    }




}
