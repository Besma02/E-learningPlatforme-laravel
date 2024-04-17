@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Update category</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.categories.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.categories.update',$category->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$category->id}}">
    <div class="form-group">
    <input type="text" name="name" class="form-control" value={{$category->name}} >
    @error("name")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="file" name='image' class="form-control-file" value={{$category->image}}>
    @error("image")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

@endsection