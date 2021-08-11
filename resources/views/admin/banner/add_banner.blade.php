@extends('admin/layout')
@section('page_title','add_coupon')
@section('coupons_select','active')

@section('container')
<div class="container">
<h3 class="text-center">welcome to the Add banner</h3>

<a href="{{url('admin/banner/list_banner')}}">
<button class="btn btn-success" style=" position: absolute; left: 0;"><i class=" fas fa-arrow-left"></i> Back  </button></a>


		<div class="row">
			<div class="col-12">
				<h4 class="text-center">Add banner</h4>
				<hr>

			<form action="{{route('admin/banner/submit')}}" method="post"  enctype="multipart/form-data" >
					@csrf

					@error('bans_name')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Banner_name: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="bans_name" value="{{$bans_name}}" placeholder="Enter Your banner name" required id="banners" class="form-control form-control-sm" >
						</div>
					</div>


					@error('banner_link')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">banner link: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="bans_link" value="{{$bans_link}}" placeholder="Enter Your link"  id="link" class="form-control form-control-sm">
						</div>
					</div>

					@error('bans_image')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
						<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3"> Banner Image: </label>
						<div class="col-sm-12 col-md-9">
							
							<input type="file" name="bans_image" value="{{$bans_image}}">

							@if($bans_image!=null)
							 <img src="{{asset('images/banner/'.$bans_image)}}" width="50px"; height="50px"; alt="">
							 @endif

						
							
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


						@error('bans_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">banner_status: </label>
						<div class="col-sm-12 col-md-9">
							<select name="bans_status" required id="banner" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							<option value="active" @if($bans_status == 'active') selected ='selected'@endif>Active</option>
						<option value="inactive" @if($bans_status =='inactive') selected ='selected'@endif>Inactive</option>
								
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
