@extends('layouts.base')
@section('title','Home')

@section('content')

<div class="container">
    <div class="mt-4">
        @if (session()->has('mssg'))
        <div class="alert alert-success">
            {{session()->get('mssg')}}
        </div>
         
        @endif
            
    </div>
    
    
    
        
        <div class="row mt-5">
            
            <h3 class="subtitle ">Our cours</h3>
            
            @foreach ($cours as $cour)
            <div class="col-md-4">
                <br>
              <div class="d-flex p-4">
             <h2>{{$cour->Titre}}</h2>
             <button class=" btn  ntn-sm btn-danger m-2"> <strong>{{$cour->Prix}} Dt</strong> </button>
            </div>
           
             <p>{{$cour->Description}}</p> 
             <a  class="btn btn-primary" href="{{route('cour.show',[$cour->category_id,$cour->id])}}">show-more</a> 
            
            </div>
           
          
             @endforeach
             
             {{$cours->links()}}
            
         
        </div>
    
    
    <hr>
          <h3 class="subtitle mt-4">Count</h3>
          <br><br>
        <div class="row">
           
           
            <div class="col-md-4 text-center">
              <br>
             <span>{{ $coursCount}}</span>
             <h2>cours</h2>
            </div>
            <div class="col-md-4 text-center">
                <span class="">{{$studentsCount}}</span>
                <h2>students</h2>
               </div>
            <div class="col-md-4 text-center">
            <span>{{$instructeurCount}}</span>
            <h2>instructeurs</h2>
            </div>
        </div>
        
    </div>
   
        <br>
        <br>
        <br>
      
       <div class="main">
        <h3 class="subtitle mt-4">Feedback</h3>
        <div class="container">
        <a type="submit" href="{{route('FrontStudent.commentaires.create')}}" class="btn  btn-primary ajout">Add commentaire </a>
        <div class="row mt-5">
           
            @foreach ($commentaires as $commentaire)
            
            <div class="col-md-4  ">
                <div class="card p-3">
              <div class="d-flex ">
            
             <h2 class="m-2">{{$commentaire->auteur}}</h2>
              
             <h5 class="text-success m-3"> <strong>/{{$commentaire->Métier}}</strong></h5>
             <div class="m-3 px-3" >
             <a  href="{{route('FrontStudent.commentaires.destroy',$commentaire->id)}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="red" class="trash" viewBox="0 0 16 16">
                   <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                   <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                 </svg></a>
                </div>  
            </div>
            <p class="p-3">{{$commentaire->Commentaire}}</p>
            
            <a class="btn  btn-sm btn-primary m-3" href="{{route('FrontStudent.commentaires.edit',$commentaire->id)}}">Edit</a>

          </div>
            </div>
             @endforeach
            
        </div>
    </div>
       
        
        
      
    </div>
    
    
@endsection
