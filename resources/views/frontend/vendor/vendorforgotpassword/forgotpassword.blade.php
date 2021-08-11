 
 <!-- <!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><php></title>

  <link rel="stylesheet" type="text/css" href="{{asset('frontend/bootstrap/css/bootstrap.min.css')}}"> -->
     <!--  Fontfaces CSS -->
    
 <!-- 
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/fontawesome/css/all.min.css')}}">
 
</head>

<body class="bg-gradient-primary " >

  <div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!- Nested Row within Card Body 
         <div class="row">
          
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Forget password of vendor</h1>
               
              </div>
               <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
                <div class=" alert-success" id="mydiv">{{session('success')}}</div>
              <form action="{{route('vendor/forget')}}" method="post" >                       
                   @csrf 


            
                   @error('email')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

                <div class="form-group">
                  <input type="email" name="ven_email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>
          
               <button class="btn btn-block btn-primary" type=" submit"> Submit</button>
                <hr>
                
              </form>
              <hr>  -->
           
 

<!--  <!DOCTYPE html>
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
   <!--      <div class="row"> -->
<!--           
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Vendor Login!</h1>
               
              </div>
               <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
                <div class=" alert-danger" id="mydiv">{{session('success')}}</div>
              <form action="{{route('vendor/signin')}}" method="post" >                       
                   @csrf -->

<!-- 
                
                   @error('email')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-user" id="exampleInputEmail" placeholder="Email Address">
                </div>

                

                @error('password')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
                <div class="form-group row">
                 
            <input type="password"  name ="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">              
                  
                </div>


               <button class="btn btn-block btn-primary" type=" submit"> LOGIN</button>

                <a href="{{url('vendor/signup')}}">Signup</a><br>
                <a href="{{url('vendor/forgotpassword')}}">Forgot password</a>
                
                <hr>
                
              </form>
              <hr>
             
              
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>  -->

<style>
    
/*body{
    background-color: #dee9ff;

  background-color: red;
}
*/
.registration-form{
  padding: 50px 0;

  background-image: url("{{asset('/login/slide3.jpg')}}");
 background-color: red;
  width: 100%;
  height: 800px;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  object-fit: cover;
  margin:0,15px;
  border:3px solid black;
  }




  


.registration-form form{
    background-color: #fff;
    max-width: 600px;
    margin: auto;
    padding: 50px 70px;
    border-top-left-radius: 30px;
    border-top-right-radius: 30px;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .form-icon{
  text-align: center;
    background-color: #5891ff;
    border-radius: 50%;
    font-size: 40px;
    color: white;
    width: 100px;
    height: 100px;
    margin: auto;
    margin-bottom: 50px;
    line-height: 100px;
}

.registration-form .item{
  border-radius: 20px;
    margin-bottom: 25px;
    padding: 10px 20px;
}

.registration-form .create-account{
    border-radius: 30px;
    padding: 10px 20px;
    font-size: 18px;
    font-weight: bold;
    background-color: #5791ff;
    border: none;
    color: white;
    margin-top: 20px;
}

.registration-form .social-media{
    max-width: 600px;
    background-color: #fff;
    margin: auto;
    padding: 35px 0;
    text-align: center;
    border-bottom-left-radius: 30px;
    border-bottom-right-radius: 30px;
    color: #9fadca;
    border-top: 1px solid #dee9ff;
    box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
}

.registration-form .social-icons{
    margin-top: 30px;
    margin-bottom: 16px;
}

.registration-form .social-icons a{
    font-size: 23px;
    margin: 0 3px;
    color: #5691ff;
    border: 1px solid;
    border-radius: 50%;
    width: 45px;
    display: inline-block;
    height: 45px;
    text-align: center;
    background-color: #fff;
    line-height: 45px;
}

.registration-form .social-icons a:hover{
    text-decoration: none;
    opacity: 0.6;
}

@media (max-width: 576px) {
    .registration-form form{
        padding: 50px 20px;
    }

    .registration-form .form-icon{
        width: 70px;
        height: 70px;
        font-size: 30px;
        line-height: 70px;
    }


 

  </style>


@include('frontend.header')
   
   
        

    <div class="registration-form">
       <form action="{{route('vendor/forget')}}" method="post" >                       
                   @csrf 




                   <div class="row">
                      <div style="text-align: center" class=" alert-danger" id="mydiv">{{session('error')}}</div>
                      <div style="text-align: center" class=" alert-success" id="mydiv">{{session('success')}}</div>
                   </div>
           <div class="row">
           <h4 style="text-align:center;">Forgot Password!!</h4> 

          </div>
              <hr>
        


                   @error('email')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
            <div class="form-group">
                <input type="email" name="ven_email" class="form-control item" id="username" placeholder="please provide valid email Address">
            </div>





          
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Reset password</button>
            </div>
        </form>
       

        <div class="social-media">
         
       <!--    <h6 style="color: #5791ff; "> <a href="{{url('vendor/forgotpassword')}}">Forgot password?</a></h6>  <br>
 -->
       

          <a href="{{url('vendor/login')}}">login in </a>
           
            
      
    </div>
    </div>

  

 
@include('frontend.footer')


             