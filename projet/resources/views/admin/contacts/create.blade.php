
@extends('layouts.layout-public')
@section('content')

      


<br><br><br>

			
                                
                                <div class="card col-md-5" style="margin: auto;">
                                    <h3 class="card-header">Fiche Contact</h3>
                                    <div class="card-body">
                                        <form method="post" action="{{route('contacts.store')}}" enctype="multipart/form-data">
                                        	@csrf
                                            <div class="form-group">
                                                <label>Nom complet</label>
                                                 <div class="col-md-8">
                                                <input type="text" name="nom" required class="form-control" id="nom">
                                            </div>
                                            </div>
                                             
                                             <div class="form-group">
                                                <label>Telephone</label>
                                                 <div class="col-md-8">
                                                <input type="number" min="0" required name="telephone" class="form-control" id="telephone">
                                            </div>
                                            </div>
                                             <div class="form-group ">
                            <label for="email" >{{ __('E-Mail Address') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                                             
                                            <div class="form-group">
                                                <label>Message</label>
                                                 <div class="col-md-8">
                                                <textarea name="message"  class="form-control" id= "message">
                                                  

                                                </textarea>
                                            </div>
                                               
                                            </div>
                                            
                                             <div class="form-group col-sm-12">
                                               <input type="submit" name="submit" class="btn btn-primary" value="valider">
                                                <a  href="{{ route('welcome') }}" class="btn btn-default">Cancel</a>
                                              </div>

                                        </form>
                                    </div>
                                    
                                </div>
                          









       @endsection