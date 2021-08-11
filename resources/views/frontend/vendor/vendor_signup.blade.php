
 
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
         <form action="{{route('vendor/signup')}}" method="post" >                       
                   @csrf

                   <div class="row">
                      <div style="text-align: center" class=" alert-danger" id="mydiv">{{session('error')}}</div>
                      <div style="text-align: center" class=" alert-danger" id="mydiv">{{session('success')}}</div>
                   </div>

          <div class="row">
           <h4 style="text-align: center;">create account!!</h4> 
           <hr>
          </div>
        <!--  <h4 style="text-align:center; padding-bottom: 5px;">Welcome to के खाम Vendor</h4>  -->
         <br>


                   @error('name')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

            <div class="form-group">
                <input type="text" class="form-control item" name="name" value="{{old('name')}}" id="username" placeholder="enter your name">
            </div>


                   @error('email')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
           
            <div class="form-group">
                <input type="email" class="form-control item"  name="email" value="{{old('email')}}" id="email" placeholder="enter your email">
            </div>



                   @error('password')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
             <div class="form-group">
                <input type="password" name ="password"   class="form-control item" id="password" placeholder="enter your password">
            </div>

              @error('num')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
            <div class="form-group">
                <input type="number" name ="num" value="{{old('num')}}" class="form-control item" id="phone-number" placeholder=" enter your Phone Number">
            </div>

               @error('rest_name')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

            <div class="form-group">
                <input type="text"  name ="rest_name" value="{{old('rest_name')}}" class="form-control item"  placeholder="enter your resturant name">
            </div>

              
               @error('address')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

            <div class="form-group">
                <input type="text"  name ="address" class="form-control item"  placeholder="enter your address">
            </div>
           
            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Create Account</button>
            </div>
        </form>
        <div class="social-media">

          <a href="{{url('vendor/login')}}">login</a>
          
            
      
    </div>
    </div>
   
   

 
@include('frontend.footer')






