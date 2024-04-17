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
  
 <h2 >Instructeurs</h2>
 <a class="btn  btn-primary" href={{route('admin.instructeurs.create')}}>Add new</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Prenom</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($instructeurs as $instructeur)
        <tr>
            <td>{{$instructeur->id}}</td>
            <td>{{$instructeur->name}}</td>
            <td>{{$instructeur->prenom}}</td>
            <td>
            <a class="btn btn-sm btn-info" href="{{route('admin.instructeurs.edit',$instructeur->id)}}">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{route('admin.instructeurs.destroy',$instructeur->id)}}">Delete</a>
            </td>
        </tr>
            
        @endforeach
       
    </tbody>
</table>

@endsection