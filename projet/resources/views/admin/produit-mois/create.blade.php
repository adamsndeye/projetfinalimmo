@extends('admin.layouts.layoutadmin')

@section('content')
  
                                
 <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
 
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.produit-mois.store')}}" enctype="multipart/form-data">
                                        	@csrf
                                          <div class="form-group">
                                                <label>Titre</label>
                                                <input type="text" name="titre" class="form-control" id="titre">
                                            </div>
                                           <div class="form-group">
                                                <label>Description</label>
                                                 <div class="col-md-8">
                                                <textarea name="description"  class="form-control" id= "description">
                                                  

                                                </textarea>
                                            </div>
                                               
                                            </div>
                                            <div class="form-group">

                                                 <label>Produit</label>
                                              <select name="produit_id" class="form-control">
                                                  @foreach($produits as $produit)
                                                  <option value="{{$produit->id}}" >{{$produit->nom}}</option>
                                                  @endforeach
                                                </select>
                                              <div class="form-group">
                                            
                                              <img  src="/../photos/avatar.png "  height="100px" width="100px"  onclick="triggerClick()" id="profilDisplay"  >
                
    											<input type="file"  name="image" id="profilimage"  onchange="displayImage(this)" style="display: none";  >
                                            </div>
                                             <div class="form-group col-sm-12">
                                               <input type="submit" name="submit" class="btn btn-primary" value="valider">
                                                <a  href="{{ route('admin.produit-mois.index') }}" class="btn btn-default">Cancel</a>
                                              </div>

                                        </form>
                                    </div>
                                    
                                </div>
                            </div>

</div>
</div>
 <script src="{{ asset('js/script.js') }}" ></script>


@endsection