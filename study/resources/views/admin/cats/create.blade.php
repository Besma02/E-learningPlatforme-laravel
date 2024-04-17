@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Add new category</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.categories.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.categories.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id">
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
    <input type="file" name='image' class="form-control-file">
    @error("image")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection