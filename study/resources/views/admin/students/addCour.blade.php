@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Add cour</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.students.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.students.storeCour',$student_id)}}" method="post" >
    @csrf
  
    <input type="hidden" name="id" value="{{$student_id}}" >
    
   <div class="form-group">
    <select name="cour_id" class="form-select"   data-style="btn-black" data-width="100%" data-live-search="true" title="Select Cour Category">
        <option value="default">choisissez un cour</option>
        @foreach($cours as $cour)
        <option value="{{$cour->id}}" >{{$cour->Titre}}</option>
        @endforeach
       </select>
    @error("cour_id")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
 
    <button type="submit" class="btn btn-primary">Add</button>
</form>

@endsection