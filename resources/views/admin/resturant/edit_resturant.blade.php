@extends('admin/layout')
@section('page_title','edit_resturant')
@section('container')
<div class="container">
<h3 class="text-center">welcome to the manage resturant</h3>

<a href="{{url('admin/resturant/list_resturant')}}">
<button class="btn btn-success" style=" position: absolute; left: 0;"><i class=" fas fa-arrow-left"></i> Back  </button></a>


		<div class="row">
			<div class="col-12">
				<h4 class="text-center">Add resturant</h4>
				<hr>

			<form action="{{route('admin/resturant/update')}}" method="post"  enctype="multipart/form-data" >

					@csrf


					@error('rest_name')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">resturant Name: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="rest_name"  value="{{$edit_info->rest_name}}" placeholder="Enter Your resturant"  id="resturant" class="form-control form-control-sm" >
						</div>
					</div>


					@error('rest_email')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">email: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="rest_email"value="{{$edit_info->rest_email}}" placeholder="Enter Your resturant"  id="resturant" class="form-control form-control-sm" >
						</div>
					</div>


					@error('rest_phone')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">phone no: </label>
						<div class="col-sm-12 col-md-9">
							<input type="number" name="rest_phone" value="{{$edit_info->rest_phone}}" placeholder="Enter Your resturant"  id="resturant" class="form-control form-control-sm" >
						</div>
					</div>

					@error('rest_address')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Address: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="rest_address" value="{{$edit_info->rest_address}}" placeholder="Enter Your address"  id="rest_address" class="form-control form-control-sm">
						</div>
					</div>
					@error('rest_otime')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Open time </label>
						<div class="col-sm-12 col-md-9">
							<input type="time" name="rest_otime" value="{{$edit_info->rest_otime}}" placeholder="Enter Your rest_otime"  id="rest_otime" class="form-control form-control-sm">
						</div>
					</div>

					@error('rest_ctime')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">close time </label>
						<div class="col-sm-12 col-md-9">
							<input type="time" name="rest_ctime" value="{{$edit_info->rest_ctime}}" placeholder="Enter Your rest_ctime"  id="rest_ctime" class="form-control form-control-sm">
						</div>
					</div>

					@error('rest_image')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
						<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Image: </label>
						<div class="col-sm-12 col-md-9">
							
							<input type="file" name="rest_image" value="{{$edit_info->rest_image}}">

							@if($edit_info->rest_image!=null)
							 <img src="{{asset('images/resturant/'.$edit_info->rest_image)}}" width="50px"; height="50px"; alt="">
							 @endif								
						</div>
					</div>


						@error('rest_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Status: </label>
						<div class="col-sm-12 col-md-9">
							<select name="rest_status"  id="" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							<option value="active" @if($edit_info->rest_status == 'active') selected ='selected'@endif>Active</option>
						<option value="inactive" @if($edit_info->rest_status =='inactive') selected ='selected'@endif>Inactive</option>
								
							</select>
						</div>
					</div>
					
    <hr>

					<div class="form-group row">
						<div class="col-sm-12 offset-md-3 col-md-9">
							
							<button type="reset" class="btn btn-sm btn-danger btn-control-sm  btn-control-md  btn-control-lg"><i class="fas fa-close"></i>
								Reset
							</button>

							<button type="submit" class="btn btn-sm btn-success"> <i class="fas fa-paper-plane"></i>
								Add
							</button>
						</div>
					</div>

				<input type="hidden" name ="id" value="{{$id}}">


				</form>
			</div>
		</div>
	</div>
	

@endsection
