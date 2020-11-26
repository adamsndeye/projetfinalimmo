@extends('admin.layouts.layoutadmin')

@section('content')

   
            <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Partenaires</h3>
                            <p class="text-muted">
                              

         <a href="{{route('admin.partenaires.create')}}" class="btn btn-primary">nouveau</a>
       
                            </p>
                            <input class="form-control" style="width: 300px;" id="myInput" type="text" placeholder="Search..">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Logo</th>
                                            <th class="border-top-0">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  id="myTable">
                                        @foreach($partenaires as $partenaire)
                                        <tr>
                                            <td>{{$partenaire->id}}</td>
                                            <td>{{$partenaire->nom}}</td>
                                            <td><img src="{!! $partenaire->logo !!}" class="rounded-circle" height="80px" width="80px";></td>
                                            <td>
                                                <a href="{{ route('admin.partenaires.edit', [$partenaire->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-edit"></i>edit</a>
                                                   <form action="{{ route('admin.partenaires.destroy',$partenaire->id)}}" method="POST" class="d-inline" >
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
         



                                    
                      



@endsection