@extends('admin/layout')
@section('page_title','add_category')
@section('container')
<div class="container">
<h3 class="text-center">welcome to the manage Category</h3>

<a href="{{url('admin/category/list_category')}}">
<button class="btn btn-success" style=" position: absolute; left: 0;"><i class=" fas fa-arrow-left"></i> Back  </button></a>


		<div class="row">
			<div class="col-12">
				<h4 class="text-center">Add category</h4>
				<hr>

			<form action="{{route('admin/category/submit')}}" method="post"  enctype="multipart/form-data" >
					@csrf
					@error('cats_name')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Category: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="cats_name" value="{{$cats_name}}" placeholder="Enter Your category" required id="category" class="form-control form-control-sm" >
						</div>
					</div>
					@error('cats_slug')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">slug: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="cats_slug" value="{{$cats_slug}}" placeholder="Enter Your slug" required id="slug" class="form-control form-control-sm">
						</div>
					</div>
					@error('cats_image')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
						<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Image: </label>
						<div class="col-sm-12 col-md-9">
							
							<input type="file" name="cats_image" value="{{$cats_image}}">

							@if($cats_image!=null)
							 <img src="{{asset('images/category/'.$cats_image)}}" width="50px"; height="50px"; alt="">
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



						@error('status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Status: </label>
						<div class="col-sm-12 col-md-9">
							<select name="status" required id="" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							<option value="active" @if($status == 'active') selected ='selected'@endif>Active</option>
						<option value="inactive" @if($status =='inactive') selected ='selected'@endif>Inactive</option>
								
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
