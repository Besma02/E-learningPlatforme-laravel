@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Add new Instructeur</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.instructeurs.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.instructeurs.store')}}" method="post" >
    @csrf
    <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="name">
    @error("name")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="text" name='prenom' class="form-control" placeholder="prenom">
    @error("prenom")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection