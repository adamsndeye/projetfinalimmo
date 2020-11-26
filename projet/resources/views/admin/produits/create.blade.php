@extends('admin.layouts.layoutadmin')

@section('content')
   
  
                            
 <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
 
                                
                                <div class="card" >
                                    <h3 class="card-header">Fiche Produit</h3>
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.produits.store')}}" enctype="multipart/form-data">
                                        	@csrf()
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="nom" class="form-control" id="nom">
                                            </div>
                                             <div class="form-group">
                                                <label>Prix</label>
                                                <input type="text" name="prix" class="form-control" id="prix">
                                            </div>
                                             <div class="form-group">
                                                <label>Adresse</label>
                                                <input type="text" name="adresse" class="form-control" id="adresse">
                                            </div>
                                             <div class="form-group">
                                                <label>Nombre de piece</label>
                                                <input type="number" min="0" name="piece" class="form-control" id="piece">
                                            </div>
                                             <div class="form-group">
                                                <label>Superficie m2</label>
                                                <input type="number" min="0" name="superficie" class="form-control" id="superficie">
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description"  class="form-control" id= "description">
                                                  

                                                </textarea>
                                               
                                            </div>
                                             <div class="form-group">
                                                 <label>Categorie</label>
                                                <select name="categorie_id" class="form-control">
                                                	@foreach($categories as $categorie)
                                                	<option value="{{$categorie->id}}" >{{$categorie->libelle}}</option>
                                                  @endforeach
                                                </select>
                                            </div>
                                             <div class="form-group">
                                            
                                              <img  src="/../photos/avatar.png "  height="100px" width="100px"  onclick="triggerClick()" id="profilDisplay"  >
                
    											<input type="file"  name="image" id="profilimage"  onchange="displayImage(this)" style="display: none";  >
                                            </div>
                                             <div class="form-group col-sm-12">
                                               <input type="submit" name="submit" class="btn btn-primary" value="valider">
                                                <a  href="{{ route('admin.produits.index') }}" class="btn btn-default">Cancel</a>
                                              </div>

                                        </form>
                                    </div>
                                    
                                </div>
                            </div>

</div>
</div>
 <script src="{{ asset('js/script.js') }}" ></script>


@endsection