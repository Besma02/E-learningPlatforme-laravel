@extends('layouts.base')
@section('title','Home')

@section('content')
<div class="container">
<div class="d-flex justify-content-between m-5">
 <h2 >Add Commentaire</h2>
 <a class="back" href="/" >-->Back</a>
</div>
<form action="{{route('FrontStudent.commentaires.store')}}" method="post" >
    @csrf
    <input type="hidden" name="id" >
    <div class="form-group">
    <input type="text" name="auteur" class="form-control" placeholder="auteur" >
    @error("auteur")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>

   <div class="form-group">
    <input type="text" name='Métier' class="form-control" placeholder="Métier">
    @error("Métier")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="number" name="cour_id" class="form-control"  >
    @error("cour_id")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <textarea name="Commentaire" class="form-control" placeholder="Commentaire"></textarea>
    @error("Commentairer")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>

    <button type="submit" class="btn btn-primary">Add commentaire</button>
</form>
</div>

@endsection