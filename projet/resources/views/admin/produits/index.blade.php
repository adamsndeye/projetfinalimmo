@extends('admin.layouts.layoutadmin')

@section('content')

         <script src= 
"https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"
                onload="loaded=true;" > 
    </script>             

<br>
<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Produits</h3>
                            <p class="text-muted">

         <a href="{{route('admin.produits.create')}}" class="btn btn-primary">nouveau</a>
        
          </p>
                              
                              
       <input class="form-control" style="width: 300px;" id="myInput" type="text" placeholder="Search..">
    <br>
    <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Identifiant</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Catégorie</th>
                                            <th class="border-top-0">Image</th>
                                           
                                             
                                              <th class="border-top-0">action</th>

                                            
                                        </tr>
                                    </thead>
                                    <tbody  id="myTable">
                                       @foreach($produits as $produit)
                                        <tr>
                                           
                                            <td>{{$produit->id}}</td>
                                            <td>{{ $produit->nom }}</td>
                                            <td>{{$produit->categorie->libelle}}</td>
                                            <td><img src="{!! $produit->image !!}"  height="60px" width="130px";></td>
                                             <td>
                                               
                                             <a href="{{ route('admin.produits.show', [$produit->id]) }}" data-toggle="tooltip" title="afficher" class='btn btn-warning'><i class="fa fa-eye"></i></a>
                                             
                        <a href="{{ route('admin.produits.edit', [$produit->id]) }}" data-toggle="tooltip" title="modifier" class='btn btn-primary'><i class="fa fa-edit"></i></a>
                        
                          

                        
                   @if($produit->produitmois == 0 &&  $prod != null)
                   <button type="button" data-toggle="tooltip"  data-target="#exampleModal"  class="btn btn-warning Annuler" title="produit du mois" data-toggle="modal"> <i class="fa fa-gift"></i> </button>
                   @endif    

                   @if($produit->produitmois == 0  &&  $prod == null)
                    <button type="button"  class="btn btn-warning affichstaticBackdropID" data-toggle="tooltip" title="produit du mois" data-toggle="modal" data-target="#staticBackdrop" data-idp="{{$produit->id}}" data-produitp="{{$produit->nom}}"><i class="fa fa-gift"></i></button>
                    @endif

                   @if($produit->produitmois == 1 &&  $prod != null)
                   <button type="button"  class="btn btn-danger affichermID"  data-toggle="tooltip" title="annuler"data-toggle="modal" data-target="#example" data-idm="{{$produit->id}}" data-produitm="{{$produit->nom}}"><i class="fa fa-power-off"></i></button> 
                  @endif
                  <!--  produit vedette -->
                   @if($produit->produitvedette == 0 &&  $prodvedette != null)
                   <button type="button" data-toggle="tooltip"  data-target="#example1"  class="btn btn-warning Annulervedette" title="produit vedette" data-toggle="modal" data-idv="{{$produit->id}}" data-produitnomv="{{$produit->nom}}"> <i class="fa fa-star"></i> </button>
                   @endif    

                   @if($produit->produitvedette == 0  &&  $prodvedette == null)
                    <button type="button"  class="btn btn-primary affichmymodalID" data-toggle="tooltip" title="produit vedette" data-toggle="modal" data-target="#myModal" data-idvv="{{$produit->id}}" data-produitvv="{{$produit->nom}}"><i class="fa fa-star"></i></button>
                    @endif

                   @if($produit->produitvedette == 1 &&  $prodvedette != null)
                   <button type="button"  class="btn btn-danger affichervID"  data-toggle="tooltip" title="annuler"data-toggle="modal" data-target="#example1Modal" data-idvvv="{{$produit->id}}" data-produitvvvv="{{$produit->nom}}"><i class="fa fa-power-off"></i></button> 
                  @endif
            <!--  produit vedette -->
                   

                  
                 

                 <form action="{{ route('admin.produits.destroy',$produit->id)}}" method="POST" class="d-inline" >
                   @csrf
                   @method('DELETE')
                    <button type="submit " class="btn btn-danger" data-toggle="tooltip" title="supprimer!"><i class="fa fa-trash"></i> </button>
                   </form>
                   
                                            </td>
                                         
                                           
                                           
                                           
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                      

   

</div>
</div>
</div>

<!-- Annuler produit du mois -->

<div class="modal fade" id="example" tabindex="-1" aria-labelledby="exampleLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleLabel">Produit du mois</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post" action="{{route('admin.updateproduitmois')}}" enctype="multipart/form-data">
               @csrf

             <div class="form-group">
              <label>Identifiant</label>
              <input type="text" class="form-control"  readonly name="produitID" id="produitID">
            </div>
            <div class="form-group">
              <label>Produit</label>
            <input type="text" class="form-control"  readonly name="produitnomm" id="produitnomm">
            </div>
                                         
           <p class="alert alert-info">Voulez-vous annuler ce produit comme produit du mois ?</p>   
           <div class="modal-footer">
         <input type="submit" name="submit" class="btn btn-primary" value="oui">
        <a  href="{{ route('admin.produits.index') }}" class="btn btn-default">non</a>
      </div>

                                        </form>


      </div>
     
    </div>
  </div>
</div>

<!--FIN  Annuler produit du mois -->

 
    

<!-- Existe deja  produit du mois -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Produit du mois</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
           <p class="alert alert-info">il existe déja un produit du mois! veuillez l'annuler d'abord</p>   


      </div>
     
    </div>
  </div>
</div>

  
 


<!-- FIN Existe deja  produit du mois -->



<!-- Modal -->
<div class="modal fade" id="staticBackdrop" name="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Produit du mois</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
 
                                <div class="card">
                                   
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.addproduitmois')}}" enctype="multipart/form-data">
                                          @csrf

                                           <div class="form-group">
                                            <label>Identifiant</label>
                                          <input type="text" class="form-control"  readonly name="affichID" id="affichID">
                                        </div>
                                        <div class="form-group">
                                            <label>Produit</label>
                                          <input type="text" class="form-control"  readonly name="affichproduit" id="affichproduit">
                                        </div>
                                          <div class="form-group">
                                                <label>Titre</label>
                                                <input type="text" name="titre" class="form-control" id="titre">
                                            </div>
                                           <div class="form-group">
                                                <label>Description</label>
                                                
                                                <textarea name="description"  cols="20" rows="5" class="form-control" id= "description">
                                                  

                                                </textarea>
                                         
                                               
                                            </div>

                                              <div class="form-group">
                                            
                                              <img  src="/../photos/avatar.png "  height="100px" width="100px"  onclick="triggerClick()" id="profilDisplay"  >
                
                          <input type="file"  name="imageannonce" id="profilimage"  onchange="displayImage(this)" style="display: none";  >
                                            </div>
                                            <div class="modal-footer">
         <input type="submit" name="submit" class="btn btn-primary" value="valider">
        <a  href="{{ route('admin.produits.index') }}" class="btn btn-default">Cancel</a>
      </div>

                                        </form>
                                    </div>
                                    
                                </div>
                            </div>

</div>
</div>
 
      </div>
      
    </div>
  </div>
</div>      

<!-- Annuler produit du mois -->

<div class="modal fade" id="example1Modal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example1ModalLabel">Produit vedette</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        <form method="post" action="{{route('admin.updateproduitvedette')}}" enctype="multipart/form-data">
         @csrf

         <div class="form-group">
         <label>Identifiant</label>
        <input type="text" class="form-control"  readonly name="ID" id="ID">
         </div>
         <div class="form-group">
         <label>Produit</label>
        <input type="text" class="form-control"  readonly name="produitnomv" id="produitnomv">
          </div>
                                         
        <p class="alert alert-info">Voulez-vous annuler ce produit vedette ?</p>   
         <div class="modal-footer">
         <input type="submit" name="submit" class="btn btn-primary" value="oui">
        <a  href="{{ route('admin.produits.index') }}" class="btn btn-default">non</a>
      </div>

     </form>



      </div>
     
    </div>
  </div>
</div>

<!--FIN  Annuler produit du mois -->

<!-- Ajout produit vedette -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">  Produit vedette</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
         <form method="post" action="{{route('admin.addproduitvedette')}}" enctype="multipart/form-data">
                                          @csrf

                                           <div class="form-group">
                                            <label>Identifiant</label>
                                          <input type="text" class="form-control"  readonly name="affichIDmodal" id="affichIDmodal">
                                        </div>
                                        <div class="form-group">
                                            <label>Produit</label>
                                          <input type="text" class="form-control"  readonly name="affichproduitmodal" id="affichproduitmodal">
                                        </div>
                                          <div class="form-group">
                                                <label>Titre</label>
                                                <input type="text" name="titreproduitv" class="form-control" id="titreproduitv">
                                            </div>
                                           <div class="form-group">
                                                <label>Description</label>
                                                
                                                <textarea name="descriptionproduitv"  cols="20" rows="5" class="form-control" id= "descriptionproduitv">
                                                  

                                                </textarea>
                                         
                                               
                                            </div>

                                              <div class="form-group">
                                            
                                              <img  src="/../photos/avatar.png "  height="100px" width="100px"  onclick="triggerClick()" id="profilDisplay"  >
                
                          <input type="file"  name="imageannonce" id="profilimage"  onchange="displayImage(this)" style="display: none";  >
                                            </div>
                                            <div class="modal-footer">
         <input type="submit" name="submit" class="btn btn-primary" value="valider">
        <a  href="{{ route('admin.produits.index') }}" class="btn btn-default">Cancel</a>
      </div>

                                        </form>

        </div>
        
       
        
      </div>
    </div>
  </div>
 <!--FIN  Ajout produit vedette -->
<!-- Existe deja  produit du mois -->
<div class="modal fade" id="example1" tabindex="-1" aria-labelledby="example1Label" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="example1Label">Produit vedette</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
        
           <p class="alert alert-info">il existe déja un produit vedette! veuillez l'annuler d'abord</p>   


      </div>
     
    </div>
  </div>
</div>

  
 


<!-- FIN Existe deja  produit du mois -->
<script src="{{ asset('js/script.js') }}" ></script>










   <script type="text/javascript">

  $(document).on("click", ".affichstaticBackdropID", function () {
   var idp = $(this).data('idp');
   var produitp = $(this).data('produitp');
   $("#affichID").val(idp);
   $("#affichproduit").val(produitp);
   $('#staticBackdrop').modal('show');



 });
                                 
                      
</script>
 
<script type="text/javascript">

  $(document).on("click", ".affichermID", function () {
   var idm = $(this).data('idm');
   var produitm = $(this).data('produitm');
   $("#produitID").val(idm);
   $("#produitnomm").val(produitm);
   $('#example').modal('show');



 });
                                 
                      
</script>
<script type="text/javascript">

  $(document).on("click", ".Annuler", function () {
   var id = $(this).data('idm');
   var produit = $(this).data('produitm');
   $("#IDp").val(id);
   $("#produitnomp").val(produit);
   $('#exampleModal').modal('show');



 });
                                 
                      
</script>
<script type="text/javascript">

  $(document).on("click", ".Annulervedette", function () {
  
   $('#example1').modal('show');



 });
                                 
                      
</script>

 <script type="text/javascript">

  $(document).on("click", ".affichmymodalID", function () {
   var idvv = $(this).data('idvv');
   var produitvv = $(this).data('produitvv');
   $("#affichIDmodal").val(idvv);
   $("#affichproduitmodal").val(produitvv);
   $('#myModal').modal('show');



 });
                                 
                      
</script>
<script type="text/javascript">

  $(document).on("click", ".affichervID", function () {
   var idvvv = $(this).data('idvvv');
   var produitvvv = $(this).data('produitvvvv');
  $("#ID").val(idvvv);
   $("#produitnomv").val(produitvvv);
   $('#example1Modal').modal('show');



 });
                                 
                      
</script>

@endsection