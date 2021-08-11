<?php 

use App\Http\Controllers\CartController;
$total = CartController::itemsInCart();


 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>@yield('page_title')</title>

<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/bootstrap/css/bootstrap.css')}}">
    
  
  <link  href="{{asset('frontend/css/style.css')}}" rel="stylesheet" media="all">

  <link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/all.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/fontawesome.min.css')}}">

    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">



     <!-- Fontfaces CSS-->
  
<!-- jQuery (Bootstrap's JavaScript plugins) -->


 <link href="{{asset('rest/css/animate.css')}}" rel="stylesheet" type="text/css" media="all">
<!-- Custom Theme files -->
<link href="{{asset('rest/css/style.css')}}" rel="stylesheet" type="text/css" media="all" >
<!-- Custom Theme files -->


    <script type='text/javascript' src="{{asset('rest/js/move-top.js')}}"></script>
    <script type='text/javascript' src="{{asset('rest/js/easing.js')}}"></script>

  <script src="{{asset('rest/js/jquery.min.js')}}"></script>
   <!--  <script type="text/javascript">
      jQuery(document).ready(function($) {
        $(".scroll").click(function(event){   
          event.preventDefault();
          $('html,body').animate({scrollTop:$(this.hash).offset().top},900);
        });
      });
    </script> -->
<!---- start-smoth-scrolling---->
<!--animated-css-->

<!-- <script src="{{asset('rest/js/wow.min.js')}}"></script>
<script>
 new WOW().init();
</script>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>     -->

</head>
       
<body style="background-color: lavender;">

      
 
  
	<nav class="navbar navbar-expand-md bg-white navbar-black sticky-top">
  <!-- Brand -->
  <a class="navbar-brand" href="{{url('index')}}">&nbsp;&nbsp;&nbsp;&nbsp;
  	<img src="{{asset('/images/logo.png')}}" class="rounded-circle" height="60" width="100" alt="logo">
  &nbsp;&nbsp;&nbsp;</a>

     <a  href="{{url('index')}}"><h3 class="text2">के खाम</h3> </a>
 



  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
    <a class="nav-link  " style="color:black" href="{{url('index')}}">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="#" style="color:black">Services</a>
      </li>
      
     
      <li class="nav-item">
        <a class="nav-link" href="{{url('index/trackorder')}}" style="color:black">Track order</a>
      </li>

      @if($total==0)
      <li class="nav-item">
        <a class="nav-link" href="{{url('index/mycart')}}" style="color:black"> <i style="padding-bottom: 10px; color:green;" class=" fa fa-shopping-bag"></i><p style="color:red"></p> </a>
      </li>
      @else

       <li class="nav-item">
        <a class="nav-link" href="{{url('index/mycart')}}"> <i style="padding-bottom: 10px; color:green;" class=" fa fa-shopping-bag" ></i>({{$total}}) </a>
      </li>

      @endif

      <li class="nav-item">
        <a class="nav-link" href="{{url('index/gallery')}}" style="color:black">Gallery</a>
      </li>
     
      
  @if(Session::has('USER_LOGIN'))
    <li class="nav-item">
        <a class="nav-link" href="{{url('index/myorders')}}" style="color:black"> My orders</a>
      </li>




<div class="btn-group">
  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    {{session('name')}}
  </button>
  <div class="dropdown-menu dropdown-menu-right">
 
    <li><a type="button" href="{{url('index/myorders')}}" >my Orders</a></li>
   <li><a href="{{url('index/user/manage')}}">My account</a></li>
   <li><a href="{{url('user/logout')}}"> Logout</a></li>

  </div>
</div>
 

      @else
       
      <li class="nav-item">
        <a class="nav-link" href="{{url('index/users/user_login')}}"style="color:black">Login</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="{{url('index/users/user_signup')}}"style="color:black">Sign up</a>
      </li>
      
     @endif

      </li>
      
    </ul>
    
  </div>

</nav>
<hr>
          @error('user_email')
           <p class=" alert-danger">
           {{$message}}</p>
          @enderror
          @if(session('success'))
           <div class=" alert-success" >{{session('success')}}</div>
          @endif