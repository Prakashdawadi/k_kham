@extends('admin/layout')
@section('page_title','add_resturant')
@section('container')
<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>

   <div class="row">
   	<h3>welcome to active edit portion</h3>

   </div>


            <!--  @error('rests_menu')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror -->

					@error('order_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror

					

				<form action="{{route('active/update')}}" method="post">

							@csrf
				
					
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">name: </label>
						<div class="col-sm-12 col-md-9">
	<input type="text" name="name" value="{{$name}}" placeholder="Enter Your name" required id="menu" class="form-control form-control-sm"  >
						</div>
					</div>


					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">email: </label>
						<div class="col-sm-12 col-md-9">
							<input type="email" name="email" value="{{$rest_email}}" placeholder="Enter Your email" required id="price" class="form-control form-control-sm" >
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">phone: </label>
						<div class="col-sm-12 col-md-9">
							<input type="number" name="phone" value="{{$rest_phone}}" placeholder="Enter Your price" required id="price" class="form-control form-control-sm" >
						</div>
					</div>

					<div class="form-group row">

						<label for="" class="col-sm-12 col-md-3">address: </label>
						<div class="col-sm-12 col-md-9">
					<input type="text" name="address" value="{{$rest_address}}" placeholder="Enter Your address" required id="price" class="form-control form-control-sm" >
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">resturant name: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="rest_name" value="{{$rest_name}}" placeholder="Enter Your price" required id="price" class="form-control form-control-sm" >
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">role: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="role" value="{{$role}}" placeholder="Enter Your role" required id="price" class="form-control form-control-sm" >
						</div>
					</div>


						

							<input type="hidden" name="id" value="{{$id}}">

					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">  Status </label>
						<div class="col-sm-12 col-md-9">
							<select name="status" required id="" class="form-control form-control-sm">
							<option value="" disabled>-- Select Any One --</option>
							
								
							<option value="{{$rest_status}}">active</option>
					
						<option value="inactive" >inactive</option>
					
							</select>
						</div>
					</div>


					<button  type="submit" name="submit" style="float: right;" class="btn btn-sm btn-success"> <i class="fas fa-paper-plane"></i>
								submit
							</button>

				


</form>



@endsection