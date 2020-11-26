@extends('admin.layouts.layoutadmin')

@section('content')

   
                     

<br>
 <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Qui somme nous</h3>
                            <p class="text-muted">
        <a href="{{route('admin.propos.create')}}" class="btn btn-primary">nouveau</a>
      
                            </p>
    
                                    
       <input class="form-control" style="width: 300px;" id="myInput" type="text" placeholder="Search..">
    <br>
   <div class= "table-responsive">
   <table class="table" >
        <thead>
            <tr>
        <th class="border-top-0">adresse</th>
         <th  class="border-top-0">email</th>
        <th class="border-top-0">description</th>
        <th class="border-top-0">telephone</th>
        <th class="border-top-0">Image</th>
        
        <th class="border-top-0">Action</th>
            </tr>
        </thead>
        <tbody  id="myTable">
      
        
             @foreach($quisommenouss as $quisommenous)
            
            <tr>
                <td>{{$quisommenous->adresse}}</td>
                <td>{{$quisommenous->email}}</td>
            <td>{{$quisommenous->description}}</td>
             <td>{{$quisommenous->telephone}}</td>
            <td><img src="{!! $quisommenous->image !!}" height="40px" width="80px";></td>
                <td>
                   
                    
                        
                     
                        <a href="{{ route('admin.propos.edit', [$quisommenous->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-edit"></i>edit</a>
                         <form action="{{ route('admin.propos.destroy',$quisommenous->id)}}" method="POST" class="d-inline" >
                   @csrf
                   @method('DELETE')
                   
                   <button type="submit " class="btn btn-danger">delete</button>
                   
                   </form>
                       
                       
                        
                       
                       
                    
                    
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