@extends('admin.layouts.layoutadmin')

@section('content')

 

   

    <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                                
                                <div class="card" >
                                    <h3 class="card-header">Fiche Partenaire</h3>
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.partenaires.store')}}" enctype="multipart/form-data" >
                                        	@csrf()
                                            <div class="form-group">
                                                <label>Nom</label>
                                                <input type="text" name="nom" class="form-control" id="nom">
                                            </div>
                                              <div class="form-group">
                                            
                                              <img  src="/../photos/avatar.png "  height="100px" width="100px"  onclick="triggerClick()" id="profilDisplay"  >
                
                          <input type="file"  name="logo" id="profilimage"  onchange="displayImage(this)" style="display: none";  >
                                            </div>
                                            
                                             <div class="form-group col-sm-12">
                                               <input type="submit" name="submit" class="btn btn-primary" value="valider">
                                                <a  href="{{ route('admin.partenaires.index') }}" class="btn btn-default">Cancel</a>
                                              </div>

                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                          </div>


</div>
  <script src="{{ asset('js/script.js') }}" ></script>



@endsection