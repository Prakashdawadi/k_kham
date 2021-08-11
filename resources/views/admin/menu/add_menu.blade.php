@extends('admin/layout')
@section('page_title','add_menu')
@section('coupons_select','active')

@section('container')
<div class="container">
<h3 class="text-center">welcome to the Add menu</h3>

<a href="{{url('admin/menu/list_menu')}}">
<button class="btn btn-success" style=" position: absolute; left: 0;"><i class=" fas fa-arrow-left"></i> Back  </button></a>


		<div class="row">
			<div class="col-12">
				<h4 class="text-center">Add menu</h4>
				<hr>

			<form action="{{route('admin/menu/submit')}}" method="post" enctype="multipart/form-data">
					@csrf

					@error('menu_name')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">menu name: </label>
						<div class="col-sm-12 col-md-9">
							<input type="text" name="menu_name" value="{{$menu_name}}" placeholder="Enter Your menu" required id="menu" class="form-control form-control-sm" >
						</div>
					</div>


					@error('menu_price')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">menu price: </label>
						<div class="col-sm-12 col-md-9">
							<input type="number" name="menu_price" value="{{$menu_price}}" placeholder="Enter Your price" required id="price" class="form-control form-control-sm">
						</div>
					</div>


					@error('rests_menu')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3"> Fall on which resturant: </label>
						<div class="col-sm-12 col-md-9">
							<select name="rests_id" required id="" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
								@foreach($rest as $cat)
								
							<option value="{{$cat->id}}">{{$cat->rest_name}}</option>
						@endforeach
							</select>
						</div>
					</div>


					@error('menu_image')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
						<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">Image: </label>
						<div class="col-sm-12 col-md-9">
							
							<input type="file" name="menu_image" value="{{$menu_image}}">

							@if($menu_image!=null)
							 <img src="{{asset('images/menu/'.$menu_image)}}" width="50px"; height="50px"; alt="">
							 @endif

						
							
						</div>
					</div>
					
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


						@error('menu_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">menu_status: </label>
						<div class="col-sm-12 col-md-9">
							<select name="menu_status" required id="" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							<option value="active" @if($menu_status == 'active') selected ='selected'@endif>Active</option>
						<option value="inactive" @if($menu_status =='inactive') selected ='selected'@endif>Inactive</option>
								
							</select>




						</div>





					</div>




							@error('ingredients')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">ingredients: </label>
						<div class="col-sm-12 col-md-9">
							<textarea style="border:solid 1px black;" name="ingredients" rows="5" cols="50"><?php  echo $ingredients; ?></textarea>


						</div>
					</div>



							@error('direction')
					 <div class="alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">direction of prepare: </label>
						<div class="col-sm-12 col-md-9">
							<textarea style="border:solid 1px black;" name="direction" rows="5" cols="50"><?php  echo $direction; ?></textarea>
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

				<input type="hidden" name ="id" value="{{$menu_id}}">


				</form>
			</div>
		</div>
	</div>
	

@endsection
