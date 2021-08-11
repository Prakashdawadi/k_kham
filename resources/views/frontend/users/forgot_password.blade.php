 
<!-- 
 <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><php></title>

  <link rel="stylesheet" type="text/css" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}">
     <!- Fontfaces CSS-->
    
<!-- 
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/all.min.css')}}">
 
</head>

<body class="bg-gradient-primary " >

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!- Nested Row within Card Body -->
        <!-- <div class="row">
          
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Forget password</h1>
               
              </div>
               <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
                <div class=" alert-success" id="mydiv">{{session('success')}}</div>
              <form action="{{route('index/user/forget')}}" method="post" >                       
                   @csrf -->


                <!-- 
                   @error('email')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

                <div class="form-group">
                  <input type="email" name="user_email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
          
               <button class="btn btn-block btn-primary" type=" submit"> Submit</button>
                <hr>
                
              </form>
              <hr> -->
             <!-- 

              -->

        @include('frontend.header')

<style>
  
  div#img{

    /*background-image: url("http://127.0.0.1:8000/public/login/momo1.jpg");*/
    background-image: url("{{asset('/login/slide3.jpg')}}");
 /*background-color: red;*/
  width: 100%;
  height: 600px;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  object-fit: cover;
  margin:0,15px;
  border:3px solid black;
  }
</style>

               <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
              <div class=" alert-success" id="mydiv">{{session('success')}}</div>

<div id="img">
<div class="container">
<br>
  <div  class="row">
    <div  class="col-md-12 col-sm-12 col-lg-6">
   <!--    <h2 style="text-align: center">"के खाम"</h2> -->
    </div>
    <div id ="effect" class="col-lg-4 col-md-8 col-sm-12">
      <div class="row">
        <h3 class="col-lg-12 col-md-12" style="text-align: center; color:white;">नमस्ते! के खाम</h3>
      </div>
      <div class="row">
        <h4 class="col-lg-12 col-md-12" style="text-align: center;color:white;">Please sign in to continue</h4>
      </div>


       <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
          <div class=" alert-success" id="mydiv">{{session('success')}}</div>
              <form action="{{route('index/user/forget')}}" method="post" >                       
                   @csrf 

        
        
        <div class="form-group row">
          <label  class="col-md-12" style="font-style:italic; color:white;">Email:</label>      
        </div>
        <div class="form-group row ">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <input type="email" name="user_email" style="width:350px;" class="form form control"placeholder="Enter your email">
            
          </div>
        </div>
             
        
          
          <!--   
          <div class="form-group row">
      <label  class="col-md-12" style=" font-style:italic; color:white;">Forget password?&nbsp;&nbsp;&nbsp;<a href="{{url('index/users/forgotpassword')}}">Click Here</a></label> 
        <div class="col-md-7">
        </div>
      </div>   -->

          
    


          <div class="form-group row">
            <div class="col-md-12 col-sm-12 col-lg-12">

          <button name="submit" type="submit" class="btn btn-success" style=" padding-left: 80px;">PROCEED <i class="fa fa-arrow-circle-right" style="width:150px; padding-left: 100px; "></i></button>
        </div>
      </div>
</form>

          <!-- <div class="form-group row">
      <label  class="col-md-12" style=" font-style:italic; color:white;">Havenot sign up yet?&nbsp;&nbsp;&nbsp;<a href="{{url('index/users/user_signup')}}">Click Here</a></label> 
        <div class="col-md-7">
        </div>
      </div>   -->


    

    </div>
  </div>
    
</div>
</div>



        <br><br><br>
 
        @include('frontend.footer')
  




