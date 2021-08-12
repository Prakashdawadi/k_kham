@extends('admin/layout')
@section('page_title','add_banner')
@section('coupons_select','active')

@section('container')
<div class="container">
<h3 class="text-center">welcome to the Add banner</h3>

<a href="{{url('admin/banner/list_banner')}}">
<button class="btn btn-success" ><i class=" fas fa-plus"></i> List banner  </button></a></a>

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
							<input type="text" name="bans_name" value="{{old('bans_name')}}" placeholder="Enter Your banner name"  id="banners" class="form-control form-control-sm" >
						</div>
					</div>


					@error('banner_link')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">banner link: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="bans_link" value="{{old('bans_link')}}" placeholder="Enter Your link"  id="link" class="form-control form-control-sm">
						</div>
					</div>

					@error('bans_image')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
						<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3"> Banner Image: </label>
						<div class="col-sm-12 col-md-9">
							
							<input type="file" name="bans_image" value="{{old('bans_image')}}">			
							
						</div>
					</div>
				
						@error('bans_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">banner_status: </label>
						<div class="col-sm-12 col-md-9">
							<select name="bans_status"  id="banner" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							<option value="active">Active</option>
						<option value="inactive">Inactive</option>
								
							</select>
						</div>
					</div>
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
				</form>
			</div>
		</div>
	</div>
	

@endsection
