@extends('admin.layouts.layoutadmin')

@section('content')

       <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Categories</h3>
                            <p class="text-muted">
                              

         <a href="{{route('admin.categories.create')}}" class="btn btn-primary">nouveau</a>
       
                            </p>
                            <input class="form-control" style="width: 300px;" id="myInput" type="text" placeholder="Search..">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">Identifiant</th>
                                            <th class="border-top-0">libelle</th>
                                              <th class="border-top-0">action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  id="myTable">
                                        @foreach($categories as $categorie)
                                        <tr>
                                           
                                            <td>{{$categorie->id}}</td>
                                            <td>{{$categorie->libelle}}</td>
                                            <td>
                                                <a href="{{ route('admin.categories.edit', [$categorie->id]) }}" class='btn btn-warning btn-xs'><i class="glyphicon glyphicon-edit"></i>edit</a>
                                          <form action="{{ route('admin.categories.destroy',$categorie->id)}}" method="POST" class="d-inline" >
                                         @csrf
                                   @method('DELETE')
                   
                                               <button type="submit " class="btn btn-danger  btn-xs">delete</button>
                   
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


                                    
                     



                                    
                      



@endsection