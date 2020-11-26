
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/plugins/images/favicon.png')}}">
    <!-- Custom CSS -->
    <link href="{{ asset('assets/plugins/bower_components/chartist/dist/chartist.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css')}}">
    <!-- Custom CSS -->
   
        <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        
    </head>
    <body>

 @include('layouts.navbar')  

 <div class="container-fluid">
 @yield('content')
 </div>























 <div class="container-fluid fomu" id="contacts">
    <div class="row" >
    <div class="col-sm-6" >
    </div>
    </div>
<div class="row" style="float: : right;" >
    
    <div class="col-sm-5" >
        <div class="header" id="myHeader">
    <h1>NOUS CONTACTER </h1>
    </div>
  <form method="post" action="{{route('contacts.store')}}">
   @csrf
        <label for="nom">Nom complet</label>
     
     
      <input type="text" name="nom" required class="form-control" id="nom">
     
    
        <label for="lname">Telephone</label>
      
      <input type="number" min="0" required name="telephone" class="form-control" id="piece">
      
    
        <label for="email" >{{ __('E-Mail Address') }}</label>

                           
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                          
      
       <label>Message</label>
           
         <textarea name="message"  class="form-control" id= "message">
                                                  

        </textarea>
      <br>
      <input type="submit" value="envoyer">
    
  </form>
  </div>
  </div>
</div>


<br><br>
<div class="footer"  style="background-color: #f2f2f2;height: 60px; width: 100%;text-align: center;" >
  <h5 ><b>Gueyereal Estate tout droit reservé 2020</b></h5>

</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>



 
 </body>
</html>