
@include('frontend.header') 

<div class="container-fluid">
	<div class="row">
		<div style="width:1700px;height:400px;border:1px solid; background-color: black;">
			<div class="row"> 
         <img   style="padding-top: 50px; padding-left: 50px;" src="{{asset('images/resturant/'.$result[0]->resturantName->rest_image)}}" width="350" height="200" class="img-responsive" alt="">
       <div class="col-8">
       	<div class="row">
       		<div class="col-12">
       			<h4 style="color: white; padding-left: 50px; padding-top: 60px;">{{$result[0]->resturantName->rest_name}}</h4>
       		</div>
       	</div>
       		<div class="row">
       		<div class="col-12">
       			<h5 style="color: white; padding-left: 30px; padding-top: 5px;"><i class="fa fa-map-marker"></i>{{$result[0]->resturantName->rest_address}}</h5>
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
 		<h5 style="color: white; padding-left: 50px;padding-top: 50px;"> Delivery hour:({{$result[0]->resturantName->rest_otime}} am-{{$result[0]->resturantName->rest_ctime}} pm)</h5>
 	   </div>
          </div>
		</div>
	</div>
</div>
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
      <input type="hidden" name="product_id" value="{{$data->id}}">
      <input type="hidden" name="quantity" value="1">

              <a target="_blank" href="menu_details/{{$data->id}}" class="btn btn-control btn-info" style="float: right; margin-left: 20px;">View Product</a> 

        <button type="button" name="submit" class="btn  btn-success" onclick = "addToCart({{ $data->id}}) " style="float: right;">Add to Bag</button>
         			    		
         	</div>
           </form>


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
 		
     // $.post("http://k_kham.loc/index/addtocart/store",
     $.post("http://127.0.0.1:8000/index/addtocart/store",
 		{
 			product_id:product_id


 		})

		  .done(function( data ) {
		  //alert( "Data Loaded: " + data );
		  alertify.set('notifier','position', 'top-center');
         alertify.success(data);

         
		   
         
});
 		
 	
 	}
 	



 </script>


@include('frontend.footer')