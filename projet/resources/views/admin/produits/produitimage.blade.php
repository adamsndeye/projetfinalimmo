@extends('admin.layouts.layoutadmin')

@section('content')
  
                                
 <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
 
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.addimage')}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                 <label>Produit</label>
                                              <input type="hidden" name="produit_id" value="{{$produit->id}}">
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