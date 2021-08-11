@extends('frontend/vendor/layout')
@section('page_title','editprofile')
@section('container')

<style>
	
.note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
#content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
#control{
    border-radius:1.5rem;
}
#Submit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: orangered;
    color: orangered;
}



</style>


<div class="container register-form">
            <div class="form">
                <div class="note">
                    <p style=" background: black;">You can edit your profile here</p>
                </div>

                <form action="{{route('vendor/edit')}}" method="post">

                	@csrf
                <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
              <div class=" alert-success" id="mydiv">{{session('success')}}</div>

                <div class="form-content" id="content">
                    <div class="row">


                  @error('name')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror


                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" id="control" placeholder="Your Name *" value="{{$name}}"/>
                            </div>


                  @error('number')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror


                            <div class="form-group">
                                <input type="text" name="number" class="form-control" id="control" placeholder="Phone Number *" value="{{$phone}}"/>
                            </div>
                        </div>

                        @error('password')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror


                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="control" placeholder="Your Password *" value=""/>
                            </div>

                            <!--  <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" class="form-control" id="control" placeholder="Your Password *" value=""/>
                            </div> -->

                       <input type="hidden"  name ="email" value="{{$email}}">
                       <input type="hidden" name="id" value="{{$id}}">
                            
                        </div>
                    </div>
                    <button type="submit" class=" btn btn-success btnSubmit" id="submit">Submit <i class="fa fa-paper-plane"></i></button>
                </div>
                </form>
            </div>
        </div>



@endsection