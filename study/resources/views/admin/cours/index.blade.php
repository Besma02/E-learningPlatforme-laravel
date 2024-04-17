
@extends('layouts.app')
@section('title','Home')

@section('content')
<div>
    @if (session()->has('mssg'))
    <div class="alert alert-success">
        {{session()->get('mssg')}}
    </div>
     
    @endif
        
</div>
<div class="d-flex justify-content-between m-5">
  
 <h2 >Cours</h2>
 <a class="btn  btn-primary" href={{route('admin.cours.create')}}>Add new</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Title</td>
            <td>Prix</td>
           
            <td>Description</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($cours as $cour)
        <tr>
            <td>{{$cour->id}}</td>
            <td>{{$cour->Titre}}</td>
            <td>dt {{$cour->Prix}}</td>
           
            <td><p style="width:300px">{{ Str::substr($cour->Description,0,50)}}...</p></td>
            <td>
            <a class="btn btn-sm btn-info" href="{{route('admin.cours.edit',$cour->id)}}">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{route('admin.cours.destroy',$cour->id)}}">Delete</a>
            </td>
        </tr>
            
        @endforeach
       
    </tbody>
</table>

@endsection