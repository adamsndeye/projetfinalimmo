@extends('admin.layouts.layoutadmin')

@section('content')
  <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                                
                                <div class="card">
                                    <h3 class="card-header">Fiche Qui sommes nous</h3>
                                    <div class="card-body">
                                        <form method="post" action="{{route('propos.update',$quisommenous)}}" enctype="multipart/form-data">
                                        	@csrf
                                          @method('PATCH')
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="nom" value="{{ old('nom') ?? $quisommenous->nom }}"  class="form-control" id="nom">
                                            </div>
                                             <div class="form-group">
                                                <label>Telephone</label>
                                                <input type="text" name="telephone" value="{{ old('telephone') ?? $quisommenous->telephone }}" class="form-control" id="telephone">
                                            </div>
                                             <div class="form-group">
                                                <label>Adresse</label>
                                                <input type="text" name="adresse" value="{{ old('nom') ?? $quisommenous->adresse }}" class="form-control" id="adresse">
                                            </div>
                                             <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $quisommenous->email}}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" value="{{ old('description') ?? $quisommenous->description }}" class="form-control" id= "description">
                                                  

                                                </textarea>
                                               
                                            </div>
                                             
                                             <div class="form-group">
                                            
                                              <img  src="/../photos/avatar.png "  height="100px" width="100px"  onclick="triggerClick()" id="profilDisplay"  >
                
    											<input type="file"  name="image" id="profilimage"  onchange="displayImage(this)" style="display: none";  >
                                            </div>
                                             <div class="form-group col-sm-12">
                                               <input type="submit" name="submit" class="btn btn-primary" value="valider">
                                                <a  href="{{ route('admin.propos.index') }}" class="btn btn-default">Cancel</a>
                                              </div>

                                        </form>
                                    </div>
                                    
                                </div>
                            </div>

</div>
</div>

 <script src="{{ asset('js/script.js') }}" ></script>


@endsection