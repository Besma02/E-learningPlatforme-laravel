@extends('layouts.base')
@section('title','Home')

@section('content')

<div class="container">
   
    
    <h1 class="subtitle mt-4">Search Result</h1>
     
        
        <div class="row mt-5">
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
             {{$cours->links()}}
             @forelse ($cours as $cous )
          
             @empty
             <div class="alert alert-danger text-center">
             <p>No such a search</p> 
            </div>
                 
             @endforelse
            
                   
        </div>
      
    
 @endsection
