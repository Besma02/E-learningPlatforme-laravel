@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="d-flex justify-content-between m-5">
 <h2 >Update Cour</h2>
 <a class="btn btn-sm btn-primary" href="{{route('admin.cours.index')}}" >-->Back</a>
</div>
<form action="{{route('admin.cours.update',$cour->id)}}" method="post" >
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{$cour->id}}">
    <div class="form-group">
    <input type="text" name="Titre" class="form-control" value="{{$cour->Titre}}" placeholder="Titre" >
    @error("Titre")
    <div class="text-danger">
        {{$message}}
    </div>
        
    @enderror
   </div>
   <br>
   <div class="form-group">
    <input type="number" name='Prix' value="{{$cour->Prix}}" class="form-control" placeholder="Prix">
    @error("Prix")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
   </div>
   <br>
   <div class="form-group">
    <select name="category_id" class="form-select"   data-style="btn-black" data-width="100%" data-live-search="true" title="Select Cour Category">
        <option value="default">choisissez une category</option>
        @foreach($categories as $category)
        <option value="{{$category->id}}" {{$cour->category_id== $category->id ?'selected':''}} >{{$category->name}}</option>
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
        <option value="{{$instructeur->id}}" {{$cour->instructeur_id== $instructeur->id ?'selected':''}}>{{$instructeur->name}}</option>
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
    <textarea name="Description"class="form-control">{{$cour->Description}}"</textarea>
    @error("Description")
    <div class="text-danger">
        {{$message}}
    </div>
    @enderror
    <br>
    <button type="submit" class="btn btn-primary ">Update</button>
   </div>
   </div>
   
</form>

@endsection