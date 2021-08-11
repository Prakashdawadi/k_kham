@include('frontend.header')

<style>
    input {
  border-top-style: hidden;
  border-right-style: hidden;
  border-left-style: hidden;
   border-bottom-style: hidden;
 /* border-bottom-style: groove;*/
  background-color: #eee;

}

.no-outline:focus {
  outline: none;
   text-align: center;
}
</style>

<h3 style="text-align: center;">Review or place your order</h3>
<hr>

<div class="container">
<table cellspacing="0" class="shopping-cart">
  <thead>
    <tr class="headings">
      <th class="product">Item</th>
      <th class="price">Price</th>
      <th class="quantity">Quantity</th>
      <th class="price">Total</th>
    </tr>
  </thead>
  <tbody>
   
   @foreach($cart as $items)
      <tr>
        <td class="product">
        	 {{$items->food_name}}
        </td>
        <td class="price">
        	 {{$items->food_price}}
        </td>
        <td class="quantity">
        	  {{$items->quantity}}
        </td>
        <td class="price">
        	Rs. {{$items->total_price}}
        </td>
      </tr>

      @endforeach
     
   @foreach($grandtotal as $mytotal)
    <tr class="totals">
      <td>&nbsp;</td>
      <td class="quantity-span" colspan="2">Subtotal(with delivery Rs.100)</td>
      <td class="price">Rs.{{$mytotal->all_total}}</td>
    </tr> 

       @endforeach
      
        <tr class="totals">
          <td>&nbsp;</td>
          <td class="quantity-span" colspan="2"></td>
          <td class="price"></td>
        </tr>
     
      <tr class="totals">
        <td>&nbsp;</td>
        <td class="quantity-span" colspan="2">Vat</td>
        <td class="price">0</td>
      </tr> 
   
    @foreach($grandtotal as $mytotal)
    <tr class="totals">
      <td>&nbsp;</td>
      <td class="quantity-span" colspan="2">Total</td>
      <td class="price">Rs.{{$mytotal->all_total}}</td>
    </tr> 

    @endforeach
  </tbody>



</table>
<hr>

<h2>Delivery Address</h2>
<hr>
<p style="text-align: center;">

	<form action="{{route('checkout/submit/confirm')}}" method="post">
		@csrf

			<div class=" form-group row">
			
				<div class="col-md-1">Name:</div>
				<div  class="col-md-7">				
				<input type="text" class="no-outline" name="name"  
				
				 placeholder="Please enter your name" class="form-control form-control" value="{{$userdatas['name']}}"  readonly="">
			</div>
		</div>

</p>


<div class=" form-group row">
      
        <div class="col-md-1">Email:</div>
        <div  class="col-md-7">       
        <input type="text" class="no-outline" name="email"  
        
         placeholder="Please enter youremail" class="form-control form-control" value="{{$userdatas['email']}}" size="50"  readonly="">
      </div>
    </div>

 
			<div class=" form-group row">
			
				<div class="col-md-1">Address:</div>
				<div  class="col-md-7">				
					<input type="text" class="no-outline" name="address" placeholder="Please enter your name" class="form-control form-control" value="{{$userdatas['address']}}" size="70" readonly="" >
			     </div>
			
			
		</div>

			<div class=" form-group row">
			
				<div class="col-md-1">Phone:</div>
				<div  class="col-md-7">				
					<input type="text" class="no-outline" style="text-align: center; text-decoration: black;" name="phone" placeholder="Please enter your name" class="form-control form-control" value="{{$userdatas['phone']}}" readonly="" >
			     </div>
			
			
		</div>
			
			<div class=" form-group row">
			
				<div class="col-md-1">Payment Mode:</div>
				<div  class="col-md-7">				
					<input type="text" class="no-outline" style="text-align: center; text-decoration: black;" name="pay" placeholder="Please enter your name" class="form-control form-control" value="{{$userdatas['pay']}}" readonly="" >
			     </div>
			
			
		</div>



 

  <hr>


  <div class="row">
     <div class="col-6">
  	
  	<a href="{{url('index/checkout')}}" class="btn btn-secondary"><i class="fa fa-arrow-circle-left"></i>Back</a >
     </div>

    <div class="col-6">

  		<button class="btn btn-success" type="submit" style="float:right;">Place order<i class="fa fa-arrow-circle-right"></i></button>
</div>
  </div>
  </form>





</div>


<style>

#checkoutsteps {list-style: none; margin: 0; padding: 0;}
#checkoutsteps li {font-size: small; display: inline; color: #aaa; padding: 0 10px; border-right: 1px solid #999;}
#checkoutsteps li.currentstep {color: #000;}
#checkoutsteps li.last {border-right: none;}
.shopping-cart {width: 100%; border-top: 1px solid #C3C3C3; border-right: 1px solid #C3C3C3; clear: both;}
.shopping-cart th {background: #F0F0F0;}
.shopping-cart th, .shopping-cart td {border-bottom: 1px solid #C3C3C3; border-left: 1px solid #C3C3C3; padding: 3px;}
.shopping-cart .link {font-size: 90%; white-space: nowrap;}
.shopping-cart .product {width: 55%}
.shopping-cart .price {width: 5%;}
.shopping-cart .quantity {width: 15%;}
.shopping-cart .quantity input {width: 30px;}
.shopping-cart .price {width: 20%;}
.shopping-cart .product-img {border: 1px solid #ccc; background-color: #e9e9e9; padding: 3px; width: 80px; height: 80px; float: left;}
.shopping-cart .product-img img {max-width:80px;max-height:80px;width:auto;height:auto;}
.shopping-cart .product-name {margin-left: 100px;}
.shopping-cart tr.totals {font-weight: bold;}
.shopping-cart tr.totals a {font-weight: normal;}
.shopping-cart .quantity-span {text-align: right;}

</style>

@include('frontend.footer')