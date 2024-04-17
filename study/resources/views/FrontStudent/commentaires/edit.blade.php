@extends('layouts.base')
@section('title','Home')

@section('content')
<div class="container">
<div class="d-flex justify-content-between m-5">
 <h2 >Update commentaire</h2>
 <a class="back" href="/" >-->Back</a>
</div>
<form action="{{route('FrontStudent.commentaires.update',$commentaire->id)}}" method="post" >
    @csrf
   @method('PUT')
    <input type="hidden" name="id" value="{{$commentaire->id}}" >
    <div class="form-group">
    <input type="text" name="auteur" class="form-control" value="{{$commentaire->auteur}}" >
    @error("auteur")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>

   <div class="form-group">
    <input type="text" name='Métier' class="form-control" value="{{$commentaire->Métier}}">
    @error("Métier")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="number" name="cour_id" class="form-control" value="{{$commentaire->Métier}}"  >
    @error("cour_id")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <textarea name="Commentaire" class="form-control">value="{{$commentaire->Commentaire}}"</textarea>
    @error("Commentairer")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>

    <button type="submit" class="btn btn-primary">Update commentaire</button>
</form>
</div>
@endsection