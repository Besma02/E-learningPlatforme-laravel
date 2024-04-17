@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Update instructeur</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.instructeurs.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.instructeurs.update',$instructeur->id)}}" method="post" >
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$instructeur->id}}">
    <div class="form-group">
    <input type="text" name="name" class="form-control" value={{$instructeur->name}} >
    @error("name")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="text" name='prenom' class="form-control" value={{$instructeur->prenom}}>
    @error("prenom")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection