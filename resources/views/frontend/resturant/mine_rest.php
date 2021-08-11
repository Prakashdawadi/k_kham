
@include('frontend.header')
 !-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<div id="formoutput">
  
</div>

  <div class="hotel_cover"> 
    <div class="container">

      <div class="row">    
        <div class="box">
          <img src="{{asset('images/resturant/'.$result[0]->rest_image)}}" class = "img1" alt="">
        </div>
        <div class="col-lg-3 col-md-12 col-sm-12">
          <div class="hotel_cover">
  
  <div id="cover"class="container" style="padding-top: 100px";>
    <div class="row" style="column-gap:3px;">
      <div class="col-lg-6 col-md-12 col-sm-12">
        <div class="box">
        <img src="img/botamomo.png" class=" img-thumbnail" alt="" >
       
  </div>
  <div class="row">
 <h4 style="margin-left:15px;"> Bota Momo</h4>

 </div>

 <div class="row">
 <span  style="margin-right:110px; color: white;"><i class="fa fa-bread-slice" style="color: white;"></i>All types of Momo(9am-9pm)</span>
</div>
<div class="row">
 <span style="margin-right:110px; margin-top: -10px;color: white;"><i class="fa fa-map-marker"style="color: white";></i>Maharjung, Kathmandu</span> 
 </div>
<div class="row">
 <span style="margin-left:15px; margin-top: -10px;color: white;">Delivery within 45 min</span> 
 </div>


</div>

</div>
<label class="col-sm-12 offset-lg-1 col-md-6"style="color: white; ">MINIMUM ORDER (RS 350) </label>
<!-- 
        <div class="col-lg-6 col-md-6 col-sm-12 ">
        <h3 style="padding-left: 20px; color: white;">{{$result[0]->rest_name}}</h3>        
        </div>
    	</div>




    	<div class="row">
        <div class="col-lg-2 col-md-6 col-sm-12 ">
        <h3 style="padding-left: 100px; color: white;">{{$result[0]->rest_address}}</h3>        
        </div>
       </div>
 -->

      </div>


   </div>

</div>
   <hr>
 <div class="row">
  <div class="container">

   
        <!-- describe category -->
        <div class="col-lg-1 col-sm-12 col-md-4">
        
          <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-4">
              menu||
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3 col-sm-12 col-md-4">
            category||
            </div>
          </div>
          
        </div>
           <!-- food section -->
           <?php $countp = 0; ?>
             <div class="col-lg-6 col-sm-12 col-md-4">
        @foreach($result as $data)
          <div class="row">

            <div class="row">
              <div class="col-lg-12 col-sm-12 col-md-12">                 
                <h3>{{$data->menu_name}}</h3>
              </div>

            
                <div class="row">
              
              <div class="col-lg-12 col-sm-12 col-md-12">
                
                <h4>NPR.{{$data->menu_price}}</h4>
              </div>

                 <div class="row">
              
              <div class="col-lg-10 col-sm-12 col-md-12 bag">
                
                description
              </div>


            </div>
          </div>

            
            </div>

            <div class="row">
            <img src="{{asset('images/menu/'.$data->menu_image)}}" height="10px" width="100" class="img-fluid" alt="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
            <div class="row">



              <form action="{{route('index.cart')}}" method="post">
               <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                <input type="hidden" id="product_id" name="product_id" value="{{$data->menu_id}}">
                
               
               
   <button type="button" class="btn btn-success" onclick='addtocart("{{$data->menu_id}}")'> add to bag</button>
       <!-- <button type="submit" class="btn btn-success"> add to bag</button> -->
                </form>



            @endforeach
        </div>
      </div>
    </div>
             
  
 </div>
 


</div>
</div>
</div>


   <link href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
  <!-- Script -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
   
<script>
  $.ajaxSetup({
    data: {
        _token: $('meta[name="csrf-token"]').attr('content')
    }
});


   function addtocart(product_id){


    $.post( "{{route('index.cart')}}",
       {
        product_id:product_id,


         _token: "{{csrf_token()}}"
      })

      .done(function(status){

        alert(status)
       // alert(product_id)

      });
      

 }

</script>

@include('frontend.footer')

