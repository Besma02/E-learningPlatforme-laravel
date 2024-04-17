@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Add new Cour</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.cours.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.cours.store')}}" method="post" >
    @csrf
    <div class="form-group">
    <input type="text" name="Titre" class="form-control" placeholder="Titre" >
    @error("Titre")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="number" name='category_id' class="form-control" placeholder="category_id">
    @error("Prix")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="number" name='Prix' class="form-control" placeholder="Prix">
    @error("Prix")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <select name="category_id" class="form-select"  data-style="btn-black" data-width="100%" data-live-search="true" title="Select Cour Instructeur">
        <option value="default">choisissez une category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}">{{$category->id}}-{{$category->name}}</option>
        @endforeach
       </select>
    @error("category_id")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <select name="instructeur_id" class="form-select"  data-style="btn-black" data-width="100%" data-live-search="true" title="Select Cour Instructeur">
        <option value="default">choisissez votre instructeur</option>
        @foreach($instructeurs as $instructeur)
        <option value="{{$instructeur->id}}">{{$instructeur->id}}-{{$instructeur->name}}</option>
        @endforeach
       </select>
    @error("instructeur_id")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>

   <div class="form-group">
    <textarea name="Description"class="form-control" placeholder="Description"></textarea>
    @error("Description")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <br>
    <button type="submit" class="btn btn-primary ">Add</button>
   </div>
   </div>
   
</form>

@endsection