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
  
 <h2 >Categories</h2>
 <a class="btn  btn-primary" href={{route('admin.categories.create')}}>Add new</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Image</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td><img src="{{asset('img/'.$category->image.'')}}" alt="img" style="width:15%;height:15%"></td>
            <td>
            <a class="btn btn-sm btn-info" href="{{route('admin.categories.edit',$category->id)}}">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{route('admin.categories.destroy',$category->id)}}">Delete</a>
            </td>
        </tr>
            
        @endforeach
       
    </tbody>
</table>

@endsection