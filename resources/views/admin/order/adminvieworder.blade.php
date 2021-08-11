@extends('admin/layout')
@section('page_title','order_list')
@section('container')


  
  <h2> order list </h2>
  <hr>

<!-- <style type="text/css">
#table {
  overflow: hidden;
  position: absolute;

  top: 0;
  bottom: 0;
  left: 0;
  right: 20;
  height: 100%;
  width: 500%;
}



</style>
 -->
    
    
      <br><br>


  
    <table id="table" class="table table-bordered table-hover table-responsive">
      <thead  class="offset-col-1 text-center text-white bg-dark">
        <th class="col-1">SN.</th>
        <th class="col-1">order_id</th>
        <th class="col-1">Rest_name</th>
        <th class="col-1">Foodname</th>
        <th class="col-1">quantity</th> 
        <th class="col-1">subtotal</th>          
        <th>total</th>
        <th>name</th>
        <th>address</th>
         <th>cell number</th>
        <th>payment</th>
        <th>status</th>
        <th>action</th>
      
        </thead>
      <tbody>

        

                    <?php 
                      $i=1;
                       ?> 

                      
          @foreach($result as $order)

                  <tr>
                    <td ><?php echo $i; ?>
                    <?php $i++; ?>
                    
                    </td>
                  <td >{{$order->order_id}}  </td>
                  <td >{{$order->rest_name}}  </td>

                  
                  <td >{{$order->order_items}}  </td>
                  <td>  {{$order->quantity}} </td>                          
                   <td>NPR{{$order->sub_total}}</td>
                    <td>NPR{{$order->all_total}}</td>
                    <td>{{$order->user_name}}</td>
                    <td>{{$order->user_address}}</td>
                     <td>{{$order->phone}}</td>
                    <td>{{$order->payment_mode}}</td>
                    <td>{{$order->status}}</td>

                    <td> <a href="{{url('vendor/orderedit/'.$order->id)}}" class="btn btn-circle btn-success"><i class="far  fa-edit"></i>  </td> </a></td>

                    
                    
                  </tr>

         
                @endforeach
                  

                        
      </tbody>
      
    </table>
  <!-- </div> -->


<div id="message">



 {{$result->links( "pagination::bootstrap-4")}}
</div>




<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>





@endsection
