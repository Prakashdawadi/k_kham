
  @include('frontend.header')
      

    <!-- new start -->
<style>
  
  div#img{

    /*background-image: url("http://127.0.0.1:8000/public/login/momo1.jpg");*/
    background-image: url("{{asset('/login/slide6.jpg')}}");
 /*background-color: red;*/
  width: 100%;
  height: 700px;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
  object-fit: cover;
  margin:0,15px;
  border:3px solid black;
  }
</style>
 
 <div id="img">
<div class="container">
<br>
  <div  class="row">
    <div  class="col-md-12 col-sm-12 col-lg-6">
   <!--    <h2 style="text-align: center">"भान्सा घर"</h2> -->
    </div>
    <div id ="effect" class="col-lg-4 col-md-8 col-sm-12">
      <div class="row">
        <h3 class="col-lg-12 col-md-12" style="text-align: center; color:white;">नमस्ते! के खाम</h3>
      </div>
      <div class="row">
        <h4 class="col-lg-12 col-md-12" style="text-align: center;color:white;">Please sign up to get started</h4>
      </div>
     <form action="{{route('index/user/submit')}}" method="post" >                       
                   @csrf

             <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
              <div class=" alert-success" id="mydiv">{{session('success')}}</div>

                  @error('name')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
        <div class="form-group row">
          <label  class="col-md-12" style="font-style:italic; color:white;">FullName:</label>     
        </div>
        <div class="form-group row ">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <input type="text" name="name" value="{{old('name')}}" style="width:350px;" class="form form control"placeholder="Enter your name">
            
          </div>
        </div>
        @error('user_email')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
        <div class="form-group row">
          <label  class="col-md-12" style="font-style:italic; color:white;">Email:</label>      
        </div>
        <div class="form-group row ">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <input type="email" name="user_email" value= "{{old('user_email')}}" style="width:350px;" class="form form control"placeholder="Enter your email">
            
          </div>
        </div>

                @error('user_password')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
              <div class="form-group row">
          <label  class="col-md-12" style="font-style:italic; color:white;">password:</label>     
        </div>
        <div class="form-group row ">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <input type="password" name ="user_password" style="width:350px;" class="form form control"placeholder="Enter your password">
            
          </div>
        </div>

         @error('user_num')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror
        <div class="form-group row">
          <label  class="col-md-12" style="font-style:italic; color:white;;">Phone:</label>     
        </div>
        <div class="form-group row ">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <input type="number" name ="user_num" value="{{old('user_num')}}" style="width:350px;" class="form form control"placeholder="Enter your cell-number">
            
          </div>
        </div>
            
          
          
          
    <!-- 
        <div class="form-group row ">
          <div class="col-md-12 col-sm-12 col-lg-12">
            <input type="checkbox" name=""  class="form form control"placeholder="Enter your cell-number">
            
          
          <label   style="font-style:italic; color:white;">I agree all the Terms and policy.</label>      
        </div>
          </div>   -->


          <div class="form-group row">
            <div class="col-md-12 col-sm-12 col-lg-12">

          <button name="submit" type="submit" class="btn btn-success" style=" padding-left: 80px;">PROCEED <i class="fa fa-arrow-circle-right" style="width:150px; padding-left: 100px; "></i></button>
        </div>
      </div>


          <div class="form-group row">
      <label  class="col-md-12" style=" font-style:italic; color:white;">Already have account?&nbsp;&nbsp;&nbsp;<a href="{{url('index/users/user_login')}}">Click Here</a></label> 
        <div class="col-md-7">
        </div>
      </div>  


      </form>

    </div>
  </div>
    
</div>
</div>
 
@include('frontend.footer')




