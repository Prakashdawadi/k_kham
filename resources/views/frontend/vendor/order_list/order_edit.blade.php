@extends('frontend/vendor/layout')
@section('page_title','list_coupon')
@section('container')


<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>


            <!--  @error('rests_menu')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror -->

					@error('order_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror

					

						@foreach($rest as $data)

					
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">order_items: </label>
						<div class="col-sm-12 col-md-9">
<input type="text" name="menu_name" value="{{json_encode($data->order_items,TRUE)}}" placeholder="Enter Your menu" required id="menu" class="form-control form-control-sm" readonly="" >
						</div>
					</div>


					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">quantity: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="menu_price" value="{{$data->quantity}}" placeholder="Enter Your price" required id="price" class="form-control form-control-sm" readonly="">
						</div>
					</div>

					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">total charge: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="menu_price" value=" NPR.{{$data->all_total}}" placeholder="Enter Your price" required id="price" class="form-control form-control-sm" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">username: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="menu_price" value=" {{$data->user_name}}" placeholder="Enter Your price" required id="price" class="form-control form-control-sm" readonly="">
						</div>
					</div>
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">user address: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="menu_price" value=" {{$data->user_address}}" placeholder="Enter Your price" required id="price" class="form-control form-control-sm" readonly="">
						</div>
					</div>
						<form action="{{route('order/edit')}}" method="post">

							@csrf

							<input type="hidden" name="orderid" value="{{$data->id}}">

					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3"> order Status </label>
						<div class="col-sm-12 col-md-9">
							<select name="order_status" required id="" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							
								
							<option value="{{$data->status}}">{{$data->status}}</option>
					
						<option value="ontheway" >On the way</option>
						<option value ="delivered">Delivered</option>
						<option value ="cancelled">cancelled</option>
							</select>
						</div>
					</div>


					<button  type="submit" name="submit" style="float: right;" class="btn btn-sm btn-success"> <i class="fas fa-paper-plane"></i>
								Add
							</button>

					@endforeach


</form>

@endsection