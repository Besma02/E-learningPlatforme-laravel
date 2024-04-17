@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Add new Students</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.students.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.students.store')}}" method="post" >
    @csrf
    <div class="form-group">
    <input type="text" name="name" class="form-control" placeholder="name" >
    @error("name")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="email" name='email' class="form-control" placeholder="email">
    @error("email")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="specialite" name='specialite' class="form-control" placeholder="specialite">
    @error("specialite")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection