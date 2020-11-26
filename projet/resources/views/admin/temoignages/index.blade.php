@extends('admin.layouts.layoutadmin')

@section('content')

                     

<br>


 <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Témoignages</h3>
                            <p class="text-muted">
                              

         <a href="{{route('admin.temoignages.create')}}" class="btn btn-primary">nouveau</a>
       
                            </p>
                            <input class="form-control" style="width: 300px;" id="myInput" type="text" placeholder="Search..">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Nom</th>
                                            <th class="border-top-0">Profession</th>
                                            <th class="border-top-0">Photo</th>
                                            <th class="border-top-0">Action</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody  id="myTable">
                                        @foreach($temoignages as $temoignage)
                                        <tr>
                                            <td>1</td>
                                            <td>{{$temoignage->nom}}</td>
                                            <td>{{$temoignage->profession}}</td>
                                             <td><img src="{{$temoignage->image }}" class="rounded-circle" height="80px" width="80px";></td>
                                            <td>
                                                <a href="{{ route('admin.temoignages.edit', [$temoignage->id]) }}" class='btn btn-warning btn-xs'><i class="fa fa-edit"></i></a>
                                               <form action="{{ route('admin.temoignages.destroy',$temoignage->id)}}" method="POST" class="d-inline" >
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