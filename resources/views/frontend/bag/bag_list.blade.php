<div id="upcarts">
@include('frontend.header')

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

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

@foreach($results as $datas) 
@endforeach
 @if($datas->all_total !== 0)
<a href="{{url('/index')}}" class="btn btn-primary btn-sm"> Continuing Shopping</a>

<div class="card">

<table class="table table-hover thead-dark table-bordered shopping-cart-wrap table-responsive">
<thead class="text-muted thead-dark table-bordered table-hover">
    <div class=" alert-success" id="mydiv1">{{session('message')}}</div>
   
  <th scope="col">Menu-List</th>
   <th scope="col">Resturant_name</th>
  <th scope="col" width="120">Quantity</th>
  <th scope="col" width="120">unit Price</th>
   <th scope="col" width="120">Total Price</th>
  <th scope="col" width="200" class="text-right">Action</th>

</thead>

<tbody>
@endif

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
      <var class="price">Rs.{{$data->food_price}}</var> 
   
    </div> <!-- price-wrap .// -->
  </td>

    <div class="price-wrap"> 
      <var class="price"></var> 

      <small class="text-muted">
     
        <h3  id="subtotal" class="check">
          
<td >
  Rs.{{$data->total_price}}
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

@if($datas->all_total !== 0)

<label for=""></label>

<div id="grandtotal">

<div class="row">
  <div class="offset-col-4" style="margin-left: 770px;">
 Total: 
Rs.{{$datas->all_total}}  (*Additional Rs.100  delivery charge )
</div>
</div>

</div>

<a href="{{url('index/checkout')}}" type="button" class="btn btn-success">checkout</a>
@else
<h3 class="text-center">Empty Bag<br>  please choose your favourite food</h3>
@endif 


</div> <!-- card.// -->

</div> 

 
</table>


</div>


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

    if(qty < 0|| qty == 0){

      alert('Number cannot be Negtive or zero or empty');

     $('.ids')['0'].reset();
     return false;
   }

    //alert(prodId);
    jQuery.ajax({
      datatype:'html',
      //url: "http://k_kham.loc/index/cart/update/" + prodId,
      url: "http://127.0.0.1:8000/index/cart/update/" + prodId,
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

<br><br><br><br>
<br>
<br>

@include('frontend.footer')
