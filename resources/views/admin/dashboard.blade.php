
@extends('admin/layout')
@section('page_title','Dashboard')


<h1>welcome to the dashboard</h1>
<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
   
   </div>
   @section('container')

@endsection
