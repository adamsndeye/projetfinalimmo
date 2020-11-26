

@extends('layouts.layout-public')
@section('content')
<div class="jumbotron jumbotron-fluid">
  <div class="container">
    <h1 class="display-4" style="color: blue;">Gueyerealslate</h1>
    <p class="lead" style="color: white;">Vente et location de luxe</p>
     <a class="btn btn-primary" href="{{route('contacts.create')}}">Contacter nous</a>
       
  </div>
</div>
<br><br>
<div class="container" >
            
<div class="row">
  <div class="col-md-6">
    <img class="card-img-top" src="{{$prod->image}}" style="object-fit: cover;height: 300px;
            width: 100%;">

  </div>
  <div class="col-md-6">
      <div >
                <div class="card-body" >
                    
                    <h4 class="card-title text-muted"><b>{{$prod->nom}}</b></h4>
                    	<h6><b>Prix: {{$prod->prix}}FCFA</b></h6>
                      <h6 class="card-text">{{$prod->description}}</h6>
                   
                      
                       
                          
                        
                        </div>
                     
                     
                </div>
            </div>
  </div>
  <br>
  <div class="row">
  <div class="col-md-6">
    <br>
<div style="margin-left: 150px;">
    <h4 class="card-title text-muted"><b>{{$prod->nom}}</b></h4>
    <H6><b>Prix: {{$prod->prix}}FCFA</b></6>
     <h6 class="card-text">{{$prod->description}}</h6>         
    
</div>
  </div>
  <div class="col-md-6">
      <div >
                <div class="card-body" >
                     <img class="card-img-top" src="{{$prod->image}}" style="object-fit: cover;height: 300px;
            width: 100%;">
                   
                          
                        
                        </div>
                     
                     
                </div>
            </div>
  </div>
</div>

<br>


<br>



<div class="container">
            <div class="row blog">
                <div class="col-md-12">
                    <div id="blogCarousel" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                            <li data-target="#blogCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#blogCarousel" data-slide-to="1"></li>
                        </ol>

                        <!-- Carousel items -->
                        <div class="carousel-inner">

                            <div class="carousel-item active">
                                <div class="row">
                                    @foreach($produitimages as $produitimage)
                                    <div class="col-md-6">
                                        <a href="#">
                                            <img src="{{$produitimage->image}}" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                            <div class="carousel-item">
                                <div class="row">
                                    
                                   @foreach($produitimages as $produitimage)
                                    <div class="col-md-6">
                                        <a href="#">
                                            <img src="{{$produitimage->image}}" alt="Image" style="max-width:100%;">
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                                <!--.row-->
                            </div>
                            <!--.item-->

                        </div>
                        <!--.carousel-inner-->
                    </div>
                    <!--.Carousel-->

                </div>
            </div>
</div>

<script type="text/javascript">
  
  $('#blogCarousel').carousel({
        interval: 5000
    });
</script>

@endsection