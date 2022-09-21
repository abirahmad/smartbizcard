<!--  Navbar Starts -->
    
<nav class="navbar navbar-expand-lg navbar-light navbar__bg nav__pd">
    <div class="sitelogo__container">
      <a href="{{url('/')}}"><img src="{{asset('public/backend/dist/img/website-logo.png')}}" alt="Smart card" class="site__logo__main"></a>
    </div>
  
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="nav-link nav-link__home" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
     </li>

     <li class="nav-item">
     <a class="nav-link" href="{{url('/')}}#compaitable">Features</a>
     </li>

     <li class="nav-item">
     <a class="nav-link" href="{{url('/')}}#plans__and__pricing">Pricing</a>
     </li>

     <li class="nav-item">
     <a class="nav-link nav-link__last" href="{{url('/')}}#for__sales__manager">For Sales Managers</a>
     </li>

     <li class="nav-item get__card">
     <a href="{{route('register')}}" class=" tDemo-btn ">Get your Card NOW !</a>
     </li>
     <li class="nav-item get__card">
  
       <a href="{{route('login')}}" class="popup-with-zoom-anim log__in">Log in</a>
  
     </li>
   
</ul>
</div>
</nav>
   {{-- Nav bar Ends --}}