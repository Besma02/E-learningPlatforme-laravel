@extends('layouts.base')
@section('title','Home')

@section('content')
<div class="container">
<div class="row mt-5">
          
    <h3 class="subtitle">Our cours</h3>
    @foreach ($cours as $cour)
    <div class="col-md-4">
      <div class="d-flex p-4">
     <h2>{{$cour->Titre}}</h2>
     <button class=" btn  ntn-sm btn-danger m-2"> <strong>{{$cour->Prix}} Dt</strong> </button>
    </div>
   
     <p>{{$cour->Description}}</p> 
     <a  class="btn btn-primary" href="{{route('cour.show',[$cour->category_id,$cour->id])}}">show-more</a>  
    
    </div>
    @endforeach
    </div>
  
     {{$cours->links()}}
</div>

@endsection