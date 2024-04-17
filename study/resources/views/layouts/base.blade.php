<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  </head>
<body>
  
<nav class="navbar navbar-expand-lg bg-body-tertiary">

  <div class="container">
    <a class="navbar-brand" href="/">E-learning</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/cours">Cours</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/dashboard">Dashboard</a>
        </li>
       
{{--       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="{{route('index')}}" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cours
          </a>
          <ul class="dropdown-menu">
          
           
          
            <li><a class="dropdown-item" href="{{route('coursCat',$cour->category_id)}}">Cours By Category</a></li> 
             <li><a class="dropdown-item" href="{{route('cour.show',[$cour->category_id,$cour->id])}}">Cour Details</a></li>  
        
          </ul>
        </li> --}}
             
      </ul>
   
     
      
        <form class="d-flex form-inline m-2 my-lg-0" method="get" action="/search">
          @csrf
          <input class="form-control m-2" name="search" type="search" placeholder="Search" aria-label="Search" value="{{request()->query('search')}}">
          <button class="btn btn-sm btn-outline-success m-2 " type="submit">Search</button>
        </form>
      
    </div>
   
  </div>
 
</nav>
<div class="bg " >
  <h1 class="title">The best E-learning Study</h1> 
  <h2 class="subtitle2">for your success!</h2>      
</div>
<br>
<br>
   
    @yield('content')
    <footer>
      <p>copyright@2024,Elearning-platforme</p>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>