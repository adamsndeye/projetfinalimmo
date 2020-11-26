
@extends('admin.layouts.layoutadmin')

@section('content')

       <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Produits</h3> 
                              <p class="text-muted">
                                              <a href="{{route('admin.produitimage',$produit->id)}}" class="btn btn-success">Plus d'image</a> 
                                              <a href="{{route('admin.produits.index')}}" class="btn btn-default">Retour</a> 
                                        </p>

    <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg"> <img src="{!! $produit->image !!}"  width="100%">
                                <div class="overlay-box">
                                    <div class="user-content">
                                        
                                        <h4 class="text-white mt-2">{{$produit->nom}}</h4>
                                        <h5 class="text-white mt-2">{{$produit->prix}} FCFA</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box mt-5 d-md-flex">
                                <div class="col-md-4 col-sm-4 text-center">
                                    <h6>{{$produit->adresse}}</h6>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <h6>{{$produit->piece}} pieces</h6>
                                </div>
                                <div class="col-md-4 col-sm-4 text-center">
                                    <h6>{{$produit->superficie}} m2</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-8 col-xlg-9 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                           @foreach($imageproduits as $imageproduit)
                          <div class="col-md-3">
                           <img src="{!! $imageproduit->image !!}"  style="width:100%;object-fit: cover;height: 120px;" onclick="myFunction(this);">
                        </div>
                        @endforeach
        
                        </div> 
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                 <div class="row">
                    <div class="col-sm-12">
                        <h1>Information supplémentaire du produit </h1>
                        <div class="white-box">
 
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.produit-mois.store')}}" enctype="multipart/form-data">
                                            @csrf
                                          <div class="form-group">
                                                <label>Titre</label>
                                                <input type="text" name="titre" value="{{ old('titre') ?? $produit->titre }}" class="form-control" id="titre">
                                            </div>
                                           <div class="form-group">
                                                <label>Description</label>
                                                 
                                                <input name="description" style="height: 30px;" value="{{ old('description') ?? $produit->description }}" class="form-control" id= "description">
                                                  

                                                
                                          
                                               
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

            </div>









@endsection