<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\Temoignage;



class TemoignageController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        
        $temoignages = Temoignage::orderBy('id','DESC')->paginate(5);

        return view('admin.temoignages.index')
            ->with('temoignages', $temoignages);
    }
    /**
     * Show the form for creating a new Produit.
     *
     * @return Response
     */
    public function create()
    {
       
        return view('admin.temoignages.create');
    }

    public function store(Request $request){

    	
        $input = $request->all();

          $photo=$request->file('image');
        $temoignage =Temoignage::create($input);
        
         if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                   $temoignage->fill(['image' => asset($path)])->save();
               }
    
        return redirect()->route('admin.temoignages.index');
}
 public function edit($id) {
        $temoignage = Temoignage::findOrFail($id); 
       

        return view('admin.temoignages.edit', compact('temoignage')); 

    }
  public function update($id, Request $request){

        $temoignage = Temoignage::find($id);
      
        $temoignage->nom = $request->nom;
 		$temoignage->profession = $request->profession;
 	
 		$temoignage->message = $request->message;

         $photo=$request->file('image');
        


        $temoignage->save();
        /**
		if ($request->file('image')) {
                   $path = Storage::disk('public')->put('images',$request->file('image'));
                   $temoignage->fill(['image' => asset($path)])->save();
               }
       **/

        return redirect(route('admin.temoignages.index'));
             }




	
    public function destroy($id,Request $request)
    {
     $temoignage = Temoignage::findOrFail($id);
        $temoignage->delete();

        return redirect()->route('admin.temoignages.index');
    }
}
