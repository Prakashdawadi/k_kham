@include('frontend.header')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
<style>
  
.param {
    margin-bottom: 7px;
    line-height: 1.4;
}
.param-inline dt {
    display: inline-block;
}
.param dt {
    margin: 0;
    margin-right: 7px;
    font-weight: 600;
}
.param-inline dd {
    vertical-align: baseline;
    display: inline-block;
}

.param dd {
    margin: 0;
    vertical-align: baseline;
} 

.shopping-cart-wrap .price {
    color: #007bff;
    font-size: 18px;
    font-weight: bold;
    margin-right: 5px;
    display: block;
}
var {
    font-style: normal;
}

.media img {
    margin-right: 1rem;
}

.quantity-box{

  width:10%;
}


</style>


<div class="container">

<hr>

<div>

</div>  
 <a  href="{{url('/index')}}" class="btn btn-primary btn-sm"> Continuing Shopping</a>

<div class="card">
 
<table class="table table-hover thead-dark table-bordered shopping-cart-wrap">
<thead class="text-muted thead-dark table-bordered table-hover">

  <th scope="col">Menu-List</th>
   <th scope="col">Resturant_name</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">unit Price</th>
   <th scope="col" width="120">Total Price</th>
  <th scope="col" width="200" class="text-right">Action</th>

</thead>
<tbody>
   @foreach($result as $data)

<tr>
  <td>
<figure class="media">
  <div class="img-wrap"></div>
  <figcaption class="media-body">
    <h5 class="title text-truncate">{{$data->food_name}} </h5>

    
    
  </figcaption>
</figure> 
  </td>


   <td>
<figure class="media">
 
  <figcaption class="media-body">
    <h5 class="title text-truncate">{{$data->res_name}} </h5>
   
    
    
  </figcaption>
</figure> 
  </td>
  <td class="quantity-box"> 

    <div class="row">
      <input type="hidden"  class="form form-control" id="rowID{{$data->food_id}}" value="{{$data->id}}"  > 

      <input type="hidden"  class="form form-control-sm" id="productID{{$data->food_id}}" value="{{$data->food_id}}" > 
     
  <input type="number" name="ids" class="form form-control data{{$data->id}} ids"  id="cartUpdates{{$data->food_id}}"   value="{{$data->quantity}}" name="qty" > 
    </div>
  </td>
  <td> 
    <div class="price-wrap"> 
      <var class="price">{{$data->food_price}}</var> 

     
    </div> <!-- price-wrap .// -->
  </td>
   <td > 
    <div class="price-wrap"> 

      <var class="price"></var> 

      <small class="text-muted">
     

   <h4 id="subtotals">
     
   </h4>
        <h3  id="subtotal" class="check">
          

  {{$data->total_price}}
</td>
          
        </h3>
     
      </small> 
    </div> <!-- price-wrap .// -->
  </td>

  <td class="text-right"> 
 <!--  <a title="" href="" class="btn btn-outline-success" data-toggle="tooltip" data-original-title="Save to Wishlist"> <i class="fa fa-heart"></i></a>  -->
  <a href="{{url('index/myorder/delete/'.$data->id)}}" class="btn btn-outline-danger" onclick="return confirm('Are you want remove {{$data->food_name}} from this cart?')"> × Remove</a>
  </td>
</tr>
@endforeach

</div>

</tbody>

</table>


<label for=""><!-- total: --></label>
@foreach($results as $datas)
@endforeach
<div id="grandtotal">

<div class="row">
  <div class="offset-col-4" style="margin-left: 770px;">
 Total: 
Rs.{{$datas->all_total}}  (*Additional Rs.100  delivery charge )
</div>
</div>
  
</div >

<a href="{{url('index/checkout')}}" type="button" class="btn btn-success">checkout</a>
</div> <!-- card.// -->

</div> 

 
</table>

<!--container end.//-->

</div>

<!-- <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

 
$(document).ready(function(){


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


 @foreach($result as $data)
  $("#cartUpdates{{$data->food_id}}").on('change keyup' , function(){

    var qty = $("#cartUpdates{{$data->food_id}}").val();
    var rowid = $("#rowID{{$data->food_id}}").val();

    var prodId = $("#productID{{$data->food_id}}").val();


    //alert('hello1');

 if(qty < 0|| qty == 0){

      alert('Number cannot be Negtive or zero or empty');

     $('.ids')['0'].reset();
     return false;
   }

    //alert(prodId);
    jQuery.ajax({
      datatype:'html',
      url: "http://k_kham.loc/index/cart/update/" + prodId,
      data:'rowid=' + rowid + '&prodId=' + prodId + '&qty=' +qty,
      type:'get',
      success: function(data){
    console.log(data);

      $('#upcarts').html(data);

}
   
    });
    
  });
  @endforeach

});

</script>


