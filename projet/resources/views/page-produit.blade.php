@extends('layouts.layout-public')
@section('content')



<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" >
    <div class="carousel-item active" style="height: 500px;">
      <img src="../images/accueil.jpg" class="d-block w-100" height="100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h1>First slide label</h1>
        <p><h3>Nulla vitae elit libero, a pharetra augue mollis interdum.</h3></p>
        <p><button type="button"  class=" btn btn-primary"  data-toggle="modal" data-target="#exampleModal" >Contacter nous</button> </p>
      </div>
    </div>
    @foreach($produits as $produit)
    <div class="carousel-item"  style="height: 500px;">
      <img src="{!! $produit->image !!}" class="d-block w-100" height="200" alt="...">
      <div class="carousel-caption d-none d-md-block" >
        <h1 >{{$produit->nom}}</h1>
        <p><h3>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</h3></p>
        <p><a class="btn btn-primary" href="{{route('contacts.create')}}">Contacter nous</a></p>
      </div>
    </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Veuillez remplir ces informations</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="{{route('contacts.store')}}" enctype="multipart/form-data">
                                          @csrf

                                           <div class="form-group">
                                            <label>Nom complet</label>
                                          <input type="text" name="nom" required class="form-control" id="nom">
                                        </div>
                                        <div class="form-group">
                                            <label>Téléphone</label>
                                        <input type="number" min="0" required name="telephone" class="form-control" id="telephone">
                                        </div>
                                        <div class="form-group">
                                             <label>Email</label>
                                         <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                                <div class="form-group">
                                     <label>Méssage</label>
                                     <textarea name="message"  class="form-control" id= "message">
                                                  

                                     </textarea>
                                </div>         
                                              
                                            <div class="modal-footer">
         <input type="submit" name="submit" class="btn btn-primary" value="valider">
        <a  href="{{ route('welcome') }}" class="btn btn-default">annuler</a>
      </div>

                                        </form>
      </div>
      
    </div>
  </div>
</div>
    <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <div class="row" style="margin-left: 320px;margin-top: -80px;">
                    <!-- Column -->
                   
                    <div class="col-lg-9 col-xlg-9 col-md-12" >
                        <div class="card" style="background-color: #f2f2f2;height: 150px;" >
                            <div class="card-body">
                                <div class="row">

                           <div class="col-md-6">
                           	<H5>Location et vente</H5>
                           	<H5>Un immeuble est, dans son sens courant, un bâtiment de plusieurs</H5>
                           </div>
                           
                          <div class="col-md-3">
                           <img src="../images/accueil.jpg"  style="width:100%;object-fit: cover;height: 100px;" onclick="myFunction(this);">
                        </div>
                         <div class="col-md-3">
                           <img src="../images/accueil.jpg"  style="width:100%;object-fit: cover;height: 100px;" onclick="myFunction(this);">
                        </div>
</div> 
                            </div>
                        </div>
                    </div>
                   
                </div>
               
            </div>




<br><br>
<div class="container" >
     <div class="header" id="myHeader">
  <h1>NOS SOMPTUEUSES IMMEUBLES</h1>
 
</div>
<div class="row">
   
     @foreach($immeubles as $immeuble)
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg">
                                     <a href="{{route('descproduit',$immeuble->id)}}">
                             <img width="100%" alt="user" src="{!! $immeuble->image !!}">
                         </a>
                                <div class="overlay-box">
                                    <div class="user-content">
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach

</div>
</div>
<br><br><br>



<div class="container"  >
     
@if($produitvedette != null)
  <div class="container" id="produitdumois">
        <div class="header" id="myHeader">
  <h1>PRODUIT VEDETTE </h1>
 
</div>   
    
<div class="row">
  <div class="col-md-6">
    <img class="card-img-top" src="{{$produitvedette->imageannonce}}" style="object-fit: cover;height: 380px;
            width: 100%;">

  </div>
  <div class="col-md-6">
      <div >
                <div class="card-body" >
                    <h4 class="card-title text-muted"><b>{{$produitvedette->titreannonce}}</b></h4>
                    <h4 class="card-title text-muted"><b>{{$produitvedette->nom}}</b></h4>

                      <H5 class="card-text">{{$produitvedette->describannonce}}<H5>
                   
                      
                        <h6 id="rcorners2" style="padding-top: 45px;">{{$$produitvedette->piece}}pieces</h6>
                         <h6 id="rcorners3" style="padding-top: 45px;">{{$produitvedette->superficie}} m2</h6>
                          <h6 id="rcorners4" style="padding-top: 45px;">{{$produitvedette->prix}}FCFA</h6>
                        
                        </div>
                     
                     <a class="btn btn-primary" href="{{route('descproduit',$$produitvedette->id)}}">Info...</a>
                </div>
            </div>
  </div>

</div>
@else

@endif
     </div>
     <br><br><br>
 

<div class="container" style="background-color: #f2f2f2;height: 400px;">
     <div class="header" id="myHeader">
  <h1>NOS CONSTRUCTIONS</h1>
 
</div>
<div class="row">
   
     @foreach($projets as $projet)
                    <div class="col-lg-4 col-xlg-3 col-md-12">
                        <div class="white-box">
                            <div class="user-bg">
                                     <a href="{{route('descproduit',$projet->id)}}">
                             <img width="100%" alt="user" src="{!! $projet->image !!}">
                         </a>
                                <div class="overlay-box">
                                    <div class="user-content">
                                       
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    @endforeach

</div>
</div>



































@endsection