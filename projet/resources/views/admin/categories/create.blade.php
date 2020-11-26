@extends('admin.layouts.layoutadmin')

@section('content')

     

   

 <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
 
                                
                                <div class="card" >
                                    <h3 class="card-header">Fiche Categorie</h3>
                                    <div class="card-body">
                                        <form method="post" action="{{route('admin.categories.store')}}" >
                                        	@csrf()
                                            <div class="form-group">
                                                <label>Libelle</label>
                                                <input type="text" name="libelle" class="form-control" id="libelle">
                                            </div>
                                            
                                             <div class="form-group col-sm-12">
                                               <input type="submit" name="submit" class="btn btn-primary" value="valider">
                                                <a  href="{{ route('admin.categories.index') }}" class="btn btn-default">Cancel</a>
                                              </div>

                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                          </div>
                        </div>


  <script src="{{ asset('js/script.js') }}" ></script>



@endsection