
@section('page_title','के खाम')
@include('frontend.header')

<!-- start -->

<style>
  /*@import url('https://fonts.googleapis.com/css?family=Comfortaa');*/

*{
  margin: 0;
  padding: 0;
  outline: none;
  box-sizing: border-box;
  font-family: 'Comfortaa', cursive;
}

#wrapper{
  background: url("{{asset('/images/main1.jpg')}}") no-repeat center;
  background-size: cover;
  width: 100%;
  height: 100vh;
}

.wrapper{
  position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background: rgba(0, 0, 0,0.6);
    max-width: 550px;
    width: 100%;
    padding: 15px;
    display: flex;
    justify-content: space-between;
    border-radius: 5px;
}

.wrapper .input {
    width: 85%;
    padding: 15px 100px;
    border: none;
    border-radius: 5px;
    font-weight: bold;
}

.searchbtn {
    background: #ffec00;
    width: 10%;
    border-radius: 5px;
    position: relative;
    cursor: pointer;
}

.searchbtn .fas{
  position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    font-size: 18px;
}
</style>
 <form  action="{{route('index/search')}}" method="get">
<div class="container-fluid" id="wrapper">
<div class="wrapper">
  
    @csrf
  <input type="text" name="Search" class="input form form-control" size="100" 
  placeholder="enter your favourite resturant name">

  <div class="searchbtn">
    <button type="submit" class="searchbtn btn" >Go</button>
   <!--  <i class="fas fa-search"></i>  --> </div>

</div>
</div>
</form>
    <!-- end -->
    
<!-- br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
 -->

<!-- food items design section-->
<hr  style="border-top: 1px solid white;">
<br>
<h3 style="text-align: center; color: chocolate;">Are you hungry?</h3><br>
<h4 style="text-align: center; ">Grab the food from your favourite restaurant</h4>


  <hr style="border-top:1px solid white">
  <h5 style="margin-left:80px; font-weight:bold;font-family:serif;">Popular Restaurants</h5>
  <hr>
 
 <!-- resturant list-->

 <div class="container" style="background-color: white;">
    <!--first row of name of restaurant-->
    <div class="row ">

      
        @foreach($rest_data as $data)
    
       
      <div class=" hotel_pointer col-lg-3 col-md-3">
        <div class="hovereffect ">
          <form action="{{url('index/'.$data->rest_name)}}" method="post">
            @csrf
            <input type="hidden" name= "rest_name" value="{{$data->rest_name}}">
            <input type="hidden" name="id" value="{{$data->id}}">
            <button type="submit" href="{{url('index/'.$data->rest_name)}}";><img src="{{asset('images/resturant/'.$data->rest_image)}}" class="img-responsive">></button>
            <!-- <a type="submit" href="{{url('index/'.$data->rest_name)}}";><img src="{{asset('images/resturant/'.$data->rest_image)}}" class="img-responsive"></a>
             -->
          </form>

          
          </div>

         
          <div class="row">
           <span style="padding-left: 90px; font-weight:bold;font-family:serif; ">{{$data->rest_name}}</span>
          </div>
            <div class="row">
           <a href=""> <i class="fa fa-map-marker" style="padding-left: 50px;font-weight:bold;">&nbsp;<span></span> </i>{{$data->rest_address}}</a>
          </div>      
    </div>

    
  @endforeach

 </div>
 
</div>
 
 

<!-- process of working of online food delivery -->

<hr  style="border-top: 1px solid white;">

<h3 style="text-align: center; color:darkorange;"> How It works</h3>
<h4  style="text-align: center; color: ;">It's easy</h4>
<hr>
<div class="container">
  <div class="row">
    <div class="col-md-12 col-lg-4">
      <div class="row">
        <h4 style="color: white;background-color:blue; height:30px; width: 30px;border-radius: 60%; padding-right: 10px;padding-left: 7px; position: relative; left:60px;">1.</h4>     
       <i class="fas fa-user"></i>
       </div>
       <div class="row">
      <h5  style="text-align:center;font-weight:bold;text-align:center; margin-left:40px; font-family: ">Signup/login in account</h5>
      </div>
      <div class="row">
        <p style="text-align: center;margin-left:40px">Enter all the correct information</p>
      </div>
      </div>
      <div class=" col-md-12 col-lg-4">
      <div class="row">
        <h4 style="color: white;background-color:blue; height:30px; width: 30px;border-radius: 60%; padding-right: 10px;padding-left: 7px; position: relative; left:80px;">2.</h4>     
       <i class="fas fa-utensils"></i>
      </div>
      <div class="row">
      <h5  style="text-align:center;font-weight:bold; margin-left:40px;">Choose resturant and food</h5>
      </div>
      <div class="row">
        <p style="text-align: center; margin-left:80px;">Browse countless menu</p>
      </div>
      </div>
       <div class=" col-md-12 col-lg-4">
       <div class="row">
        <h4 style="color: white;background-color:blue; height:30px; width: 30px;border-radius: 60%; padding-right: 10px;padding-left: 7px; position: relative; left:90px;">3.</h4>     
       <i class="fas fa-truck"></i>
       </div>
       <div class="row">
      <h5  style="text-align:center;font-weight:bold;margin-left:80px;">Pay and Get food delivered</h5>
      </div>
      <div class="row">
        <p style="text-align: center;margin-left:80px;">Pay cash or online via esewa,Imepay</p>
      </div>
      </div>
      </div>
        </div>
  </div>
 
 
<!-- footer section-->

@include('frontend.footer')