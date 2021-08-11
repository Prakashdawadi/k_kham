@extends('admin/layout')
@section('page_title','add_coupon')
@section('coupons_select','active')

@section('container')
<div class="container">
<h3 class="text-center">welcome to the manage coupon</h3>

<a href="{{url('admin/coupon/list_coupon')}}">
<button class="btn btn-success" style=" position: absolute; left: 0;"><i class=" fas fa-arrow-left"></i> Back  </button></a>


		<div class="row">
			<div class="col-12">
				<h4 class="text-center">Add coupons</h4>
				<hr>

			<form action="{{route('admin/coupon/submit')}}" method="post"  enctype="multipart/form-data" >
					@csrf

					@error('coupons_name')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">coupon: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="coupons_name" value="{{$coupons_name}}" placeholder="Enter Your coupons" required id="coupons" class="form-control form-control-sm" >
						</div>
					</div>


					@error('coupons_code')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">coupon code: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="coupons_code" value="{{$coupons_code}}" placeholder="Enter Your code" required id="code" class="form-control form-control-sm">
						</div>
					</div>
					@error('coupons_value')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">coupon value: </label>
						<div class="col-sm-12 col-md-9">
							<input type="number" name="coupons_value" value="{{$coupons_value}}" placeholder="Enter Your  value" required id="value" class="form-control form-control-sm">
						</div>
					</div>
					<!-- <div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Image: </label>
						<div class="col-sm-12 col-md-9">
							<input type="file" name="my_img" >
						</div>
					</div> 
 -->				
<!-- 
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">status: </label>
						<div class="col-sm-12 col-md-9">
							<input type="checkbox" value="np" name="lang[]"> Nepali
							<input type="checkbox" value="en" name="lang[]"> English
							<input type="checkbox" value="hn" name="lang[]"> Hindi
							<input type="checkbox" value="ot" name="lang[]"> Other
						</div>
					</div> -->

					<!-- <div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Gender: </label>
						<div class="col-sm-12 col-md-9">
							<input type="radio" value="male" name="gender"> Male
							<input type="radio" value="female" name="gender"> Female
							<input type="radio" value="other" name="gender"> Other
						</div>
					</div> -->


						@error('coupons_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">coupons_status: </label>
						<div class="col-sm-12 col-md-9">
							<select name="coupons_status" required id="" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							<option value="active" @if($coupons_status == 'active') selected ='selected'@endif>Active</option>
						<option value="inactive" @if($coupons_status =='inactive') selected ='selected'@endif>Inactive</option>
								
							</select>
						</div>
					</div>


					



					   <div class="form-group row">
						<div class="col-sm-12 offset-md-3 col-md-9">
							<!-- <input type="submit" class="btn btn-success">
							<input type="submit" class="btn btn-outline-success">
							
							<input type="submit" class="btn btn-primary">
							<input type="submit" class="btn btn-secondary">
							<input type="submit" class="btn btn-info">
							<input type="submit" class="btn btn-warning">
							<input type="submit" class="btn btn-danger">
							<input type="submit" class="btn btn-default">
							<input type="submit" class="btn btn-dark">
							<input type="submit" class="btn btn-light">
							<input type="submit" class="btn btn-link">
							 -->
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
