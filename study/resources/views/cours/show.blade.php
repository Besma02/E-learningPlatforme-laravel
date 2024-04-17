@extends('layouts.base')
@section('title','Home')

@section('content')

<div class="container">
    <h1 class="subtitle mt-4">Cour-Details</h1>
        <div class="row">
            <div class="col-md-8">
                <p><img src="{{asset('img/'.$category->image.'')}}" alt="img" style="width:50%;height:50%"></p>
                <h2>{{$cour->Titre}}</h2>
                <p>{{$cour->Description}}</p>
            </div>
            <div class="col-md-4">
                <h6>Prix:{{$cour->Prix}}</h6>
                <h6>Nbr Leçons:{{$cour->Nombre_de_lecons}}</h6>
                <h6>Category:{{$category->name}}</h6>
                <h6>Instructeur:{{$instructeur->name}}</h6>

           
            <div class="my-5">
                <form action="{{route('message.enroll')}}" method="post">
                    @csrf
                    <input type="hidden" name="cour_id" value="{{$cour->id}}">
                   
                    <div class="form-group mb-3">
                    
                    <input class="form-control" type="text" name="name" placeholder="entrer ton nom">
                    @error('name')
                    <div class="text-red">{{$message}}</div>
                     @enderror
                    </div>
                    <div class="form-group mb-3">
                   
                    <input  class="form-control" type="email" name="email" placeholder="entrer ton email">
                    @error('email')
                    <div class="text-red">{{$message}}</div>
                     @enderror
                   </div>
                    <div class="form-group mb-3">
                   
                    <input class="form-control" type="text" name="specialite" placeholder="entrer ta specialite">
                    @error('specialite')
                    <div class="text-red">{{$message}}</div>
                     @enderror
                    </div>
                    <div>
                        <input class="btn btn-primary mt-3"type="submit" name="submit" value="s'inscrire">
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    </div>
@endsection
