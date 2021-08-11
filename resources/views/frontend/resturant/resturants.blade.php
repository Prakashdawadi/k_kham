
@include('frontend.header') 


<div class="container-fluid">
	<div class="row">
		<div style="width:1700px;height:400px;border:1px solid; background-color: black;">

     

			<div class="row">

          <img   style="padding-top: 50px; padding-left: 50px;" src="{{asset('images/resturant/'.$result[0]->rest_cimage)}}" width="350" height="200" class="img-responsive" alt="">
				
        

       <div class="col-8">
       	<div class="row">
       		<div class="col-12">
       			<h4 style="color: white; padding-left: 50px; padding-top: 60px;">{{$result[0]->rest_name}}</h4>
       		</div>
       	</div>

       		<div class="row">
       		<div class="col-12">
       			<h5 style="color: white; padding-left: 30px; padding-top: 5px;"><i class="fa fa-map-marker"></i>{{$result[0]->rest_address}}</h5>
       		</div>
 		
        </div>
    </div>
</div>
    	
			<br>
<div class="row">
				<div class="col-md-4 col-sm-12 col-lg-4">
 		<h5 style="color: white; padding-left: 50px; padding-top: 30px; margin-left: 30px; ">Minimun Order: Rs.500</h5>
 	</div>		
			

			<div class=" col-md-6 col-sm-12 offset-lg-4 col-lg-4">
 		<h5 style="color: white; padding-left: 50px;padding-top: 50px;"> Delivery hour:({{$result[0]->rest_otime}} am-{{$result[0]->rest_ctime}} pm)</h5>

 	   </div>

          </div>




		</div>
	</div>
</div>





			<!-- 
			<div class="col-4">
        <img  style="padding-top: 50px; padding-left: 50px;" src="{{asset('images/resturant/'.$result[0]->rest_cimage)}}" width="300" height="200" class="img-responsive" alt="">

        <div class="col-5">
        	<div class="col-4">
 		<h3 style="color: white; padding-left: 50px;">{{$result[0]->rest_name}}</h3>
        </div>
    </div>


 </div>





 			<div class="row">
				<div class="col-md-4 col-sm-12 col-lg-4">
 		<h3 style="color: white; padding-left: 50px;">{{$result[0]->rest_name}}</h3>
 	</div>		
			

			<div class=" col-md-6 col-sm-12 offset-lg-4 col-lg-4">
 		<h3 style="color: white; padding-left: 50px;">({{$result[0]->rest_otime}} am-{{$result[0]->rest_ctime}} pm)</h3>

 	   </div>

          </div>




 	   </div>

          </div>




			</div>




	</div>


</div> -->
     
<!-- <div class="container-fluid">
<div style="width:1700px;height:350px;border:1px solid #000; background-color: black">
	<div class="col-md-6">
 <img  style="padding-top: 50px;" src="{{asset('images/resturant/'.$result[0]->rest_cimage)}}" width="300" height="200" class="img-responsive" alt="">
 </div>
 <div class="row">
 	<div class="col-md-2 col-sm-2 col-lg-2">
 		<h3 style="color: white; padding-left: 50px;">{{$result[0]->rest_name}}</h3>
 	</div>
 		<div class=" offset-6 col-md-3 col-sm-3 col-lg-2">
 		<h3 style="color: white; padding-left: 50px;">{{$result[0]->rest_otime}}-{{$result[0]->rest_ctime}}</h3>

 	   </div>
 	   

 	
 </div>
 <hr>
 <div class="row">
 	<div class="col-md-4 col-sm-4 col-lg-4">
 		<h4 style="color: white; padding-left: 50px;">Delivered within 30 minutes</h4>
 	</div>
  </div>

</div> -->
<hr>


  <h3 style="text-align: center; color: black;">Choose your favourite Food?</h3><br>
  <div class="row">
  	<div class="offset-col-6 col-6">
  	<h3 style=";"> Our Menus</h3>
    <hr>
  	</div>
  </div>



 <div class="container" style="background-color: white;">
    <!--first row of name of restaurant-->
   

        @foreach($result as $data)
      
         <div class="row ">
         	
  
       
      <div class=" hotel_pointer col-lg-4 col-md-4">
        <div class="hovereffect ">

          <img src="{{asset('images/menu/'.$data->menu_image)}}"  class="img-responsive">

        

    </div>

</div>
<div class="col-sm-6 ">
         		<h3 style="  font-style: italic;padding-top: 50px;">{{$data->menu_name}}</h3>
         	
         			<h5 style=" font-style: italic; padding-left: 5px;">Rs.{{$data->menu_price}}</h5>

                <form  action="{{route('index.cart')}}"  id="cart" method="post">
      @csrf
      <input type="hidden" name="product_id" value="{{$data->menu_id}}">
      <input type="hidden" name="quantity" value="1">

              <a target="_blank" href="menu_details/{{$data->menu_id}}" class="btn btn-control btn-info" style="float: right; margin-left: 20px;">View Product</a> 

        <button type="button" name="submit" class="btn  btn-success" onclick = "addToCart({{ $data->menu_id}}) " style="float: right;">Add to Bag</button>
         			
         		
         	</div>
           </form>
<!-- 
 </div>
 <div class="row">
	<button type="button" class="btn-sm" style="margin-left: 40px; background-color: orangered;" onclick="addToCart({{$data->menu_id}})">Add to bag</button> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<button type="button" class="btn-sm" style="background-color: blue;">View Product</button> -->



	<!-- //action="{{route('index.cart')}}" -->
	<!--  	<form  action="{{route('index.cart')}}"  id="cart" method="post">
	 		@csrf
	 		<input type="hidden" name="product_id" value="{{$data->menu_id}}">
	 		<input type="hidden" name="quantity" value="1">

      <div class="col-2">
	 		
  <button type="button" name="submit" class="btn-success" onclick = "addToCart({{ $data->menu_id}}) "> Add to bag</button> 


	<a href="http://127.0.0.1:8000/index/menu_details/{{$data->menu_id}}" type="button"  class="btn-sm btn-info">View Product</a> 
  </div>
	 	 </form>
	
 -->

</div>

  @endforeach
</div>


  

 </div>
 
</div>

<!-- <script src="{{asset('frontend/js/jquery.min.js')}}"></script> -->

<!-- JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>

 <script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


  
 	function addToCart(product_id,quantity){
 		//alert(product_id,quantity);
 		
      $.post("http://k_kham.loc/index/addtocart/store",
 		{
 			product_id:product_id


 		})

		  .done(function( data ) {
		  //alert( "Data Loaded: " + data );
		  alertify.set('notifier','position', 'top-center');
         alertify.success(data);

         // alertify.success(data.status);

        // $('.fa-shopping-bag').html(data.totalitems);
		   
         
});
 		
 	
 	}
 	



 </script>


@include('frontend.footer')