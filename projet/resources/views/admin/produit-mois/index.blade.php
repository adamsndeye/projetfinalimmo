@extends('admin.layouts.layoutadmin')

@section('content')

                     

<br>
<div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Produits</h3>
                            <p class="text-muted">
 <a href="{{route('admin.produit-mois.create')}}" class="btn  btn-danger text-white" target="_blank"> Produit du mois</a>
          </p>
                              
                              
       <input class="form-control" style="width: 300px;" id="myInput" type="text" placeholder="Search..">
    <br>
    <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Identifiant</th>
                                            <th class="border-top-0">Titre</th>
                                            <th class="border-top-0">produit</th>
                                            <th class="border-top-0">Image</th>
                                              <th class="border-top-0">action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  id="myTable">
                                       @foreach($produitmois as $produitmoi)
                                        <tr>
                                           
                                            <td>{{$produitmoi->id}}</td>
                                            <td>{{ $produitmoi->titre }}</td>
                                            <td>{{$produitmoi->produit->nom}}</td>
                                            <td><img src="{!! $produitmoi->image !!}"  height="100px" width="130px";></td>
                                            <td>
                                             <a href="{{ route('admin.produit-mois.show', [$produitmoi->id]) }}" class='btn btn-warning'>show</a>
                        <a href="{{ route('admin.produit-mois.edit', [$produitmoi->id]) }}" class='btn btn-warning'>edit</a>
                         <form action="{{ route('admin.produit-mois.destroy',$produitmoi->id)}}" method="POST" class="d-inline" >
                   @csrf
                   @method('DELETE')
                   
                   <button type="submit " class="btn btn-danger">delete</button>
                   
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






<script>
 $(document).on("click", ".afficheID", function () {
   var id = $(this).data('id');

   $("#affichID").val(id);
   
   $('#myAffichModal').modal('show');
</script>


                                    
                      



@endsection