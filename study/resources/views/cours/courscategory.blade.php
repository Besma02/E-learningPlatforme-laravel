@extends('layouts.base')
@section('title','Home')

@section('content')

<div class="container">
    <h1 class="text-center mt-4">Cours-Category:<span class='text-success '>{{$categories->name}}</span></h1>
        <div class="row mt-5">
            @foreach ($cours as $cour)
            <div class="col-md-4">
              <div class="d-flex mt-5">
             <h2><a href="{{route('cour.show',[$cour->category_id,$cour->id])}}">{{$cour->Titre}}</a></h2>
             <button class=" btn  ntn-sm btn-danger m-2"> <strong>{{$cour->Prix}} Dt</strong> </button>
            </div>
            
            <p><strong>Category:</strong>{{$category->name}}</p>
            <p><strong>Instructeur:</strong>{{$instructeur->name}}</p>
            
             <p>{{$cour->Description}}</p>   
           
            </div>
             @endforeach
             {{$cours->render()}}
 
        </div>
        
        
     
    </div>
@endsection
