<?php 

use App\Http\Controllers\CartController;
$total = CartController::itemsInCart();

use App\Http\Controllers\AdminController;

// admin list
$totalusers = AdminController::usercount();
$totalresturants = AdminController::resturantcount();
$totalinactiveresturants = AdminController::inactiveresturantcount();
$totalactiveresturants = AdminController::activeresturantcount();

// vendor list
$all_vendor = AdminController::vendor();

$active_vendor = AdminController::active_vendor();

$inactive_vendor = AdminController::inactive_vendor();


$requested_vendor = AdminController::requested_vendor();

// menulist

$all_menu = AdminController::all_menu();

$active_menu = AdminController::active_menu();

$inactive_menu = AdminController::inactive_menu();

$all_order = AdminController::all_order();



 ?>


@extends('admin/layout')
@section('page_title','dashboard')
@section('coupons_select','active')

@section('container')

<style>
	
#umang{

	text-align:center;

	color:orangered;
	font-style: italic;


}



</style>

<div class="container-fluid">


<h5 id="umang" style="" >Total number of users are:{{$totalusers}}</h5>
<hr><br>

<h5 id="umang">Total number of resturants are:{{$totalresturants}}</h5>
<h5 id="umang">Total number of inactive resturants are:{{$totalinactiveresturants}}</h5>
<h5 id="umang">Total number of active resturants are:{{$totalactiveresturants}}</h5>
<hr><br>

<h5 id="umang">Total number of allVendors are:{{$all_vendor}}</h5>

<h5 id="umang">Total number of active Vendors are:{{$active_vendor}}</h5>

<h5 id="umang">Total number of Inactive Vendors are:{{$inactive_vendor}}</h5>

<h5  id="umang">Total number of requested Vendors are:{{$requested_vendor}}</h5>
<hr><br>

<h5 id="umang">Total number of all menu are:{{$all_menu}}</h5>	

<h5 id="umang">Total number of active menu are:{{$active_menu}}</h5>	

<h5 id="umang">Total number of inactive menu are:{{$inactive_menu}}</h5>	
<hr><br>

<h5 id="umang">Total number of allorder:{{$all_order}}</h5>	

</div>

@endsection