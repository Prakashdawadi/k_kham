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
							<input type="text" name="menu_name" value="{{old('menu_name')}}" placeholder="Enter Your menu"  id="menu" class="form-control form-control-sm" >
						</div>
					</div>


					@error('menu_price')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">menu price: </label>
						<div class="col-sm-12 col-md-9">
							<input type="number" name="menu_price" value="{{old('menu_price')}}" placeholder="Enter Your price"  id="price" class="form-control form-control-sm">
						</div>
					</div>


					@error('rests_menu')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3"> Fall on which resturant: </label>
						<div class="col-sm-12 col-md-9">
							<select name="rests_id"  id="" class="form-control form-control-sm">
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
							
							<input type="file" name="menu_image" value="{{old('menu_image')}}">
			
						</div>
					</div>



						@error('menu_status')
					 <div class=" alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">menu_status: </label>
						<div class="col-sm-12 col-md-9">
							<select name="menu_status"  id="" class="form-control form-control-sm">
								<option value="" disabled>-- Select Any One --</option>
							<option value="active">Active</option>
						    <option value="inactive">Inactive</option>
								
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
							<textarea style="border:solid 1px black;" name="ingredients" rows="5" cols="50">{{old('ingredients')}}</textarea>


						</div>
					</div>



							@error('direction')
					 <div class="alert-danger" id="mydiv">
					 {{$message}}</div>
					@enderror
					<div class="form-group row">
						<label for="" class="col-sm-12 col-md-3">direction of prepare: </label>
						<div class="col-sm-12 col-md-9">
							<textarea style="border:solid 1px black;" name="direction" rows="5" cols="50">{{old('direction')}}</textarea>
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
