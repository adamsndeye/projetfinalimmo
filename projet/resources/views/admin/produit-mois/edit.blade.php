@extends('admin.layouts.layoutadmin')

@section('content')
   <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
 
                                
                                <div class="card" >
                                    <h3 class="card-header"> Produit du mois</h3>
                                    <div class="card-body">
                                        <form method="POST" action="{{route('admin.produit-mois.update',$produitmoi)}}" enctype="multipart/form-data">
                                        	@csrf
                                         @method('PATCH')
                                            <div class="form-group">
                                                <label>Titre</label>
                                                <input type="text" name="titre" value="{{ old('nom') ?? $produitmoi->titre }}" class="form-control" id="nom">
                                            </div>
                                           
                                            
                                             
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea id="description" cols="20" rows="5" type="text" class="form-control @error('description') is-invalid
                                                  @enderror" name="description" value="{{ old('description') ?? $produit->description }}" required autocomplete="description" 
                                                 autofocus>
                                                </textarea>
                                               
                                            </div>
                                             
                                             <div class="form-group">
                                            
                                              <img  src="/../photos/avatar.png "  height="100px" width="100px" value="{{ old('image') ?? $produit->image }}"  onclick="triggerClick()" id="profilDisplay"  >
                
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