<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Produit;
use App\Categorie;
use Auth;



class CategorieController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

     public function index(Request $request)
    {
        $categories = Categorie::orderBy('id','DESC')->paginate(5);

        return view('admin.categories.index')
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new Categorie.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }
    public function edit($id) {
        $categorie= Categorie::findOrFail($id); 
       

        return view('admin.categories.edit', compact('categorie')); 

    }
     public function update($id, Request $request){

        $categorie=Categorie::find($id);
       
        $categorie->libelle = $request->libelle;

         
        

        $categorie->save();
      
       

        return redirect(route('admin.categories.index'));
    }

    /**
     * Store a newly created Categorie in storage.
     *
     * @param CreateCategorieRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
    	$id= Auth::user()->id;
        $input = $request->all();
        $input['ajouter_par']=$id;

        $categorie = Categorie::create($input);

      

        return redirect(route('admin.categories.index'));
    }
       
    public function destroy($id,Request $request)
    {
     $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->route('admin.categories.index');
    }
}
