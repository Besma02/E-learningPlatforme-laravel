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
  
 <h2 >student-Cours</h2>
 <div>
 <a class="btn btn-sm btn-info" href="{{route('admin.students.addtCour',$student_id)}}" >Add to cour</a>
 <a class="btn btn-sm btn-primary" href="{{route('admin.students.index')}}" >-->Back</a>
</div>
</div>
<table class="table">
    <thead>
        <tr>
            <td>#</td>
            <td>Name</td>
            <td>status</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach ($cours as $cour)
        <tr>
            <td>{{$cour->id}}</td>
            <td>{{$cour->Titre}}</td>
            <td>{{$cour->pivot->status}}</td>
            <td>
                @if ($cour->pivot->status!=='approve')
                <a class="btn btn-sm btn-info" href="{{route('admin.students.approveCour',[$student_id,$cour->id])}}">Approve</a>
                @endif
                @if ($cour->pivot->status!=='reject')
            <a class="btn btn-sm btn-danger" href="{{route('admin.students.rejectCour',[$student_id,$cour->id])}}">reject</a>
            @endif
        </td>
        </tr>
            
        @endforeach
       
    </tbody>
</table>

@endsection