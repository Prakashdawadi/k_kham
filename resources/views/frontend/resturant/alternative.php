<div class="container">

   	<div class="row">
   			<!-- describe category -->
   			<div class="col-lg-2 col-sm-12 col-md-4">
   			
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
             <div class="col-lg-5 col-sm-12 col-md-4">
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

   						<form action="{{route('addmenu')}}" method="post" class="yes" >
   							<input type="hidden"  name="_token"  id="token" value="{{ csrf_token() }}" />
   							<input type="hidden" id= "product_id" name="product_id" value="{{$data->menu_id}}">
   							<input type="hidden" id= "product_name" name="product_name" value="{{$data->menu_name}}">
   							<input type="hidden" id = "product_price" name="product_price" value="{{$data->menu_price}}"> 							
   							<input type="hidden"  id="rest_name" name="rest_name" value="{{$data->rest_name}}">
   							<input type="hidden"  id= "rests_id" name="rests_id"   value="{{$data->rests_id}}">
   							<input type="number"  id= "quantity" name="quantity" >

   							   <button class="btn btn-success btn-submit"  id = "action" type="submit" name="submit">add to bag</button> 

   						</form>
   					
             
   					</div>

   				</div>
   				<hr>
   				  @endforeach
   			  </div>
   			
		
  <div class="col-lg-5 col-sm-12 col-md-4">
			@include('frontend.bag.bag_list')

    </div>
	  					
   			  	
   		
      </div>
     </div>		
		 
</div>
   	
</div>

   </div>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
   <script type="text/javascript">

   	$(document).ready(function(){



   	$('.yes').on('submit',function(e){

   		e.preventDefault();

     // alert('iam here');
      var form_data = $(this).serialize();

       $.ajax({
        url : "{{route('addmenu')}}",
        method: "POST",
        data :form_data,
        datatype : "json",

     
      success:function(response){


            if(response.success){
                  alert(response.message)//Message come from controller
                      }else{
                     alert("Error")
                  }
          },
              error:function(error){
              console.log(error);
           }

       });  				

 	});

   	});
   	

   </script>
 -->