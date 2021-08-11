@extends('frontend/vendor/layout')

@section('page_title','Dashboard')

@section('container')
<h1>welcome to the vendor dashboard</h1>
<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
       <div class=" alert-success" id="mydiv"><p>{{session('success')}}</p></div>
   
   </div>

@endsection
