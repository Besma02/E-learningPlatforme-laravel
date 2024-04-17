@extends('layouts.app')
@section('title','Home')

@section('content')
<div class="container">
    <div class="mt-4">
    @if (session()->has('mssg'))
    <div class="alert alert-success">
        {{session()->get('mssg')}}
    </div>
     
    @endif
        
</div>
<h1>helloooo</h1>
</div>

@endsection