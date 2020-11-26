
       <nav class="navbar navbar-light">
        <a class="navbar-brand" href="{{route('welcome')}}">
    <img src="../images/logo.png" width="50" height="50" alt="" loading="lazy">
  </a>
       
<ul class="nav justify-content-end">
 
  <li class="nav-item">
    <a class="nav-link" href="#quisommesnous">Qui sommes nous</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="#produits">Produits</a>
  </li>
   
   <li class="nav-item">
    <a class="nav-link" href="#nosprojets">Nos projets</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="#partenaires">Partenaires</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#temoignages">Témoignages</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" href="#contacts">Contact</a>
  </li>
  <li class="nav-item">
    @if (Route::has('login'))
                
                    @auth
                        <a class="nav-link" href="{{ url('/admin/home') }}">Home</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Login</a>

                       
                    @endauth
                
            @endif
  </li>
</ul>

</nav>

             
