


<!-- footer section-->
<hr>

<footer class="bg-white" style="padding: 15px;">
  <div class="container">
  <div class="footer-top">
    <div class="row">
      <div class="col-sm-12 col-md-3 col-xs-12 segment-one">
        <div class="row">
        <h3 class="text text3"style="font-weight:normal;  color:black;">Contact Us</h3>
        </div>
        <div class="row">
        <i class="fa fa-phone text Text3" style="color:black;">&nbsp;&nbsp; +9779848700076</i>
      </div>
        <div class="row">
        <i class="fa fa-envelope text text3" style="font-weight: bold;color:black;">&nbsp;&nbsp;&nbsp;k_kham@gmail.com</i>
        </div>

        <div class="row">
        <i class="fa fa-map-marker text text3" style="color:black;"> &nbsp;&nbsp;&nbsp;Bhansi-2,kanchanpur, Nepal</i>
      </div>
      
    
      </div>
      <div class="col-sm-12 col-md-3  col-xs-12  segment-two">
        <div class="row">
            <div class="col-md-10">
        <h3 class="text text3"style="font-weight:normal;color:black;">Team</h3>
        
      </div>
    </div>
        <div class="row">
            <div class=" col col-md-9">
        <ul>
       <li class="text1"> <a href="#"class="text1" style="color:black;">carrier</a></li>
          <li class="text1"> <a href="#"class="text1" style="color:black;">Partner</a></li>
          <li class="text1"> <a href="#" class="text1"style="color:black;">services</a></li>
          <li class="text1"> <a href="#" class="text1"style="color:black;">events</a></li>
          <li class="text1"> <a href="#" class="text1"style="color:black;">blog</a></li>

        </ul>
      </div>
    </div>
      </div>
      <div class="col-sm-12 col-md-3  col-xs-12  segment-two">
        <div class="row">
            <div class="col-md-10">
        <h3 class="text text3"style="font-weight:normal;color:black;">About us</h3>
      </div>
    </div>
        <div class="row">
            <div class=" col col-md-9">
        <ul>
          <li class="text1"> <a href="{{url('vendor/login')}}" class="text1"style="color:black;"> Login as vendor</a></li>
          <li class="text1"> <a href="#" class="text1"style="color:black;">Avertise</a></li>
          <li class="text1"> <a href="#"class="text1"style="color:black;">Terms of use</a></li>
          <li class="text1"> <a href="#" class="text1"style="color:black;">Privacy policy</a></li>

        </ul>
      </div>
    </div>
      </div>
    

      <div class="col-sm-12 col-md-3 col-xs-12  segment-four">
        <h3 class="text text3"style="font-weight:normal;color:black;">For Newsletter</h3>
        
        <p class="text1" style="color:black;">Sucbribe for recent News and Updates.</p>
  

        <form action="{{route('suscribe.store')}}" method="post" >
          <div class="row">
            <div class=" form  form-row col-md-9">
          <input type="email" name="user_email" size="25" value="{{old('user_email')}}" placeholder="enter your email"  class="form form-control-md form-control-sm">
          @csrf
        </div>
      
            <div class=" form  form-row col-md-3">
        <input  type="submit" class="btn btn-success form form-control-md form-control-sm" name="subcribe" value="susbcribe"/>
        </div>
      </div>
        </form>
      </div>    
   </div>



  </div>  
  <div class="row">
        <h5 class="col-md-1 col-sm-12 text "style="font-weight:normal ;text-align: left;">Connect</h5>
        
        
         <a href="#"><i class="fab fa-facebook"></i></a>&nbsp;&nbsp;
   
        <a href="#"><i class="fab fa-twitter"></i></a>&nbsp;&nbsp;
        
        <a href="#"><i class="fab fa-instagram"></i></a>&nbsp;&nbsp;
     
        <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        </div>
   
  </div>
  <div id ="last"class="container-fluid" style="height:60px">
  <hr style="border-top:2px solid white">
  <div class="row">
  <p  class="offset-md-1 " style="color:black;">&copy;{{ now()->year }} All right reserved.</p>
  <p class="col-md-9"style="color:black; text-align: right;">Developed by K Kham Team</p>
  </div>
  </div>
</footer>

  <script  src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script  src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <script  src="{{asset('frontend/js/behave.js')}}"></script>
 <!--  <script  src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
 -->

  <script  src="{{asset('frontend/js/behave.js')}}"></script>



    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>



</body>
</html>