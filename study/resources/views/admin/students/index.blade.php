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
  
 <h2 >students</h2>
 <a class="btn  btn-primary" href={{route('admin.students.create')}}>Add new</a>
</div>
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>Email</td>
            <td>Specialité</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{$student->id}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->email}}</td>
            <td>{{$student->specialite}}</td>
            <td>
            <a class="btn btn-sm btn-info" href="{{route('admin.students.edit',$student->id)}}">Edit</a>
            <a class="btn btn-sm btn-danger" href="{{route('admin.students.destroy',$student->id)}}">Delete</a>
            <a class="btn btn-sm btn-primary" href="{{route('admin.students.showCours',$student->id)}}">ShowCours</a>
        </td>
        </tr>
            
        @endforeach
       
    </tbody>
</table>

@endsection