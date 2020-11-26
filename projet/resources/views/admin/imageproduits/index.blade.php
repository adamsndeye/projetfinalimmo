@extends('layouts.app')

@section('content')

       @include('layouts.menu')
                     

<br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <div class="container-fluid">
  <div class="row justify-content-right" style="margin-left: 400px;margin-top: -500px;" >
        <div class="col-md-9">

  
        <h3  >Image Produit
         <a href="{{route('imageproduits.create')}}" class="btn btn-primary">nouveau</a>
        </h3>
        
                                    
       <input class="form-control" style="width: 300px;" id="myInput" type="text" placeholder="Search..">
    <br>
   <div class="table table-responsive">
   <table class="table" >
        <thead>
            <tr>
        <th  scope="col">Nom</th>
       
        <th scope="col">image</th>
        
        <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody  id="myTable">
      
        
             @foreach($imageproduits as $imageproduit)

            
            <tr>
                <td>{{$imageproduit->produit->nom}}</td>
              
                   <td><img src="{!! $imageproduit->image !!}" height="80px" width="80px";></td>
                           
           
                <td>
                   
                    <div >
                     
                        
                     
                        <a href="{{ route('imageproduits.edit', [$imageproduit->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-edit"></i>edit</a>
                         <form action="{{ route('imageproduits.destroy',$imageproduit->id)}}" method="POST" class="d-inline" >
                   @csrf
                   @method('DELETE')
                   
                   <button type="submit " class="btn btn-danger">delete</button>
                   
                   </form>
                       
                       
                        
                       
                       
                    </div>
                    
                </td>
              </tr>
            
       @endforeach
        <div class="row">
          
           <div class="col-12 text-center">
             
             
           </div>

        </div>
        </tbody>
      </table>
      </div>
   

</div>
</div>
</div>




<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>


                                    
                      



@endsection