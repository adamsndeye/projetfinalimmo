@extends('layouts.layout-public')
@section('content')

 <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" style="color: blue;">Gueyerealslate</h1>
    <p class="lead" style="color: white;">Vente et location de luxe</p>
    <button type="button"  class=" btn btn-primary"  data-toggle="modal" data-target="#exampleModal" >Contacter nous</button> 
     

       
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
</div>



<div class="row sec1">
      <div class="col-3">
        <p  class=" eclipse rounded-circle offset-4 ">
          <i class="fa fa-home rounded-circle icone "></i>
        </p>
        <h5 class="titre2" style="text-align: center;">Maison</h5>
        <p class="texte2">Lorem ipsum, dolor sit amet consectetur.</p>
      </div>
      <div class="col-3">
        <p  class=" eclipse rounded-circle offset-4">
          <i class="fa fa-building rounded-circle icone "></i>
        </p>
        <h5 class="titre2 " style="text-align: center;">Immeubles</h5>
        <p class="texte2">Lorem ipsum, dolor sit amet consectetur.</p>
      </div>
      <div class="col-3">
        <p  class=" eclipse rounded-circle offset-4">
          <i class="fa fa-chart-bar rounded-circle icone "></i>
        </p>
        <h5 class="titre2" style="text-align: center;">Analytic</h5>
        <p class="texte2">Lorem ipsum, dolor sit amet consectetur.</p>
      </div>
      <div class="col-3">
        <p  class=" eclipse rounded-circle offset-4">
          <i class="fa fa-truck rounded-circle icone"></i>
        </p>
        <h5 class="titre2" style="text-align: center;">Transport</h5>
        <p class="texte2">Lorem ipsum, dolor sit amet consectetur.</p>
      </div>
    </div>


 <div class="container" style="background-color: #f2f2f2;height: 400px;" id="nosprojets">
     <div class="header" id="myHeader">
  <h1>NOS PROJETS</h1>
 
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
<br><br>

<div class="container">
  
<div class="row">
  
  <div class="col-md-4" style="margin-left: 300px; ">
    
  <H6 id="rcorners5" style="text-align: center;padding-top: 40px;font-size: 40px;"><b>25</b></H6>
  <H6 id="rcorners7" style=""></H6>
  <H6 style="font-size: 30px;">Année d'expérience</H6>
                         
  </div>
  <div class="col-md-4">
    
    <H6 id="rcorners6" style="text-align: center;padding-top: 39px;font-size: 40px;"><b>48</b></H6>
    <H6 id="rcorners7" style=""></H6>
     <H6 style="font-size: 30px;"> Immeubles construits</H6>
  </div>

</div>
</div>
           
<br><br><br>
<div class="container" style="background-color: #f2f2f2;height: 300px;" id="quisommesnous">
      @foreach($quisommenous as $quisommenou)
  <div class="row ">
        <div class="col-sm"> </div>
        
        <div class="col-md-5 text-center flex-column">
            
            <img src="{{ $quisommenou->image}}" style="object-fit: cover;height: 280px;
            width: 100%;">
            
           
            </div>
       
       
        <div class="col-md-6">
            <div >
                <div class="card-body" >
                    
                    <h4 class="card-title text-muted">QUI SOMMES NOUS</h4>
                    <H6 class="card-text">{{$quisommenou->description}}</H6>
                     <a class="btn btn-primary" href="{{route('contacts.create')}}">Contacter nous</a>
                </div>
            </div>
        </div>

     </div>
      @endforeach
     </div>
<br><br><br><br>

<div class="main" id="produits">

<div class="header" id="myHeader">
  <h1>NOS PRODUITS</h1>
<div id="myBtnContainer">
  <button class="btn btn-primary btn active" onclick="filterSelection('all')"> Show all</button>
   @foreach($categories as $categorie)
<button class="btn btn-primary btn" onclick="filterSelection('{{$categorie->libelle}}')"> {{$categorie->libelle}}</button>
  @endforeach
</div>

<!-- Portfolio Gallery Grid -->


<div class="row">
   
     @foreach($produits as $produit)
                    <div class="col-lg-4 col-xlg-3 col-md-12 column {{$produit->categorie->libelle}} ">
                        <div class="white-box">
                            <div class="user-bg">
                                     <a href="{{route('descproduit',$produit->id)}}">
                             <img width="100%" alt="user" src="{!! $produit->image !!}">
                         </a>
                                <div class="overlay-box">
                                    <div class="user-content">
                                        <div class="col-md-6 col-sm-6 text-center">
                                            <h6>{{$produit->nom}}</h6>
                                        </div>
                                       
                                        
                                    </div>
                                </div>

                            </div>
                            
                        </div>
                    </div>
                    @endforeach

</div>

<a style="margin-left: 500px; text-decoration: none;"  href="{{route('page-produit')}}">Voir Plus...</a>
</div>
{{$produits->links()}}
</div>


<br><br><br><br><br>
@if($produitmois != null)
  <div class="container" id="produitdumois">
        <div class="header" id="myHeader">
  <h1>PRODUIT DU MOIS</h1>
 
</div>   
    
<div class="row">
  <div class="col-md-6">
    <img class="card-img-top" src="{{$produitmois->imageannonce}}" style="object-fit: cover;height: 380px;
            width: 100%;">

  </div>
  <div class="col-md-6">
      <div >
                <div class="card-body" >
                    <h4 class="card-title text-muted"><b>{{$produitmois->titreannonce}}</b></h4>
                    <h4 class="card-title text-muted"><b>{{$produitmois->nom}}</b></h4>

                      <H5 class="card-text">{{$produitmois->describannonce}}<H5>
                   
                      
                        <h6 id="rcorners2" style="padding-top: 45px;">{{$produitmois->piece}}pieces</h6>
                         <h6 id="rcorners3" style="padding-top: 45px;">{{$produitmois->superficie}} m2</h6>
                          <h6 id="rcorners4" style="padding-top: 45px;">{{$produitmois->prix}}FCFA</h6>
                        
                        </div>
                     
                     <a class="btn btn-primary" href="{{route('descproduit',$produitmois->id)}}">Voir plus...</a>
                </div>
            </div>
  </div>

</div>
@else

@endif

<br><br>
<div class="container" id="partenaires">
<div class="header" id="myHeader">
  <h1>Nos Partenaires</h1>
</div>

  
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators mb-0 pb-0">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner no-padding my-5">
    <div class="carousel-item active">
      
      @foreach($partenaires as $partenaire)
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top rounded-bottom" src="{{$partenaire->logo}}">
          
        </a>
        <p>
          {{$partenaire->nom}}
        </p>
      </div>
      @endforeach
    </div>
    <div class="carousel-item">
      
         @foreach($partenaires as $partenaire)
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top" src="{{$partenaire->logo}}">
          
        </a>
        <p>{{$partenaire->nom}}</p>

      </div>
       @endforeach
    </div>
  
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
     <span class="carousel-control-prev-icon sp"></span>
                </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon sp"></span>
                </a>
</div>
</div>

<br><br>
<div class="container" id="temoignages">
<div class="header" id="myHeader">
  <h1>Témoignages </h1>

</div>

  
  <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators mb-0 pb-0">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>

  <!-- The slideshow -->
  <div class="carousel-inner no-padding my-5">
    <div class="carousel-item active">
      
      @foreach($temoignages as $temoignage)
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top rounded-bottom" src="{{$temoignage->image}}">
          
        </a>
        <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">{{$temoignage->nom}}</span>
            <span class="float-right text-uppercase">{{$temoignage->profession}}</span>
          </div>
        <p>
          {{$temoignage->message}}
        </p>
      </div>
      @endforeach
    </div>
    <div class="carousel-item">
      
        @foreach($temoignages as $temoignage)
      <div class="col-xs-4 col-sm-4 col-md-4">
        <a href="#" onclick=abc(this) class="slider_info">
          <img class="img-fluid card-img-top rounded-bottom" src="{{$temoignage->image}}">
          
        </a>
        <div class="card-img-overlay t_img">
            <span class="float-left text-uppercase">{{$temoignage->nom}}</span>
            <span class="float-right text-uppercase">{{$temoignage->profession}}</span>
          </div>
        <p>
          {{$temoignage->message}}
        </p>
      </div>
      @endforeach
    </div>
  
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
     <span class="carousel-control-prev-icon sp"></span>
                </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
                    <span class="carousel-control-next-icon sp"></span>
                </a>
</div>
</div>




<script>
filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("column");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function(){
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>

@endsection