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
  
 <h2 >Commentaires</h2>
 </div>

        @foreach ($commentaires as $commentaire)
       
            <div class="d-flex justify-content-between">
            <h3>{{$commentaire->auteur}}</h3>
            <p  class='btn btn-sm btn-success'>{{$commentaire->Métier}}</p>
             </div>
              <div class="card light p-3">
                <p>{{$commentaire->Commentaire}}</p>
                </div>            
             <br>
            <a class="btn btn-sm btn-danger" href="{{route('admin.commentaires.destroy',$commentaire->id)}}">Delete</a>
            
            
        @endforeach


@endsection