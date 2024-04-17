@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Update Student</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.students.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.students.update',$student->id)}}" method="post" >
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$student->id}}" >
    <div class="form-group">
    <input type="text" name="name" class="form-control" value={{$student->name}} placeholder="name" >
    @error("name")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="email" name='email' class="form-control" value={{$student->email}} placeholder="email">
    @error("email")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="specialite" name='specialite' class="form-control" value={{$student->specialite}} placeholder="specialite">
    @error("specialite")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection