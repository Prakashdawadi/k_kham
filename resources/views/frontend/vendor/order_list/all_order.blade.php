@extends('frontend/vendor/layout')
@section('page_title','vendororder')
@section('container')


  
  <h2> order list </h2>
  <hr>


    
      <br><br>


  
    <table id="table" class="table table-bordered table-hover table-responsive">
      <thead  class="offset-col-1 text-center text-white bg-dark">
        <th class="col-1">SN.</th>
         <th class="col-1"> order_id</th>
       
        <th class="col-1">Rest_name</th>
        <th class="col-1">Foodname</th>
        <th class="col-1">quantity</th> 
        <th class="col-1">subtotal</th>          
        <th>total</th>
        <th>name</th>
        <th>address</th>
        <th>payment</th>
        <th>status</th>
        <th>action</th>
      
        </thead>
      <tbody>

        

                    <?php 
                      $i=1;
                       ?> 

                      
          @foreach($result as $order)

          @if($order->status =='cancelled')

                  <tr style="background-color: red" >
                    <td ><?php echo $i; ?>
                    <?php $i++; ?>
                    
                    </td>
                   <td >{{$order->order_id}}  </td>
                  <td >{{$order->rest_name}}  </td>

                  
                  <td >{{$order->order_items}}  </td>
                  <td>  {{$order->quantity}} </td>                          
                   <td>NPR-{{$order->sub_total}}</td>
                    <td>NPR-{{$order->all_total}}</td>
                    <td>{{$order->user_name}}</td>
                    <td>{{$order->user_address}}</td>
                    <td>{{$order->payment_mode}}</td>
                    <td>{{$order->status}}</td>

                    <td> <a href="{{url('vendor/orderedit/'.$order->id)}}" class="btn btn-circle btn-success"><i class="far  fa-edit"></i>  </td> </a></td>

                    
                    
                  </tr>

          @endif
         
                @endforeach



        @foreach($result as $order)

          @if($order->status =='preparing')

                  <tr style="background-color: yellow" >
                    <td ><?php echo $i; ?>
                    <?php $i++; ?>
                    
                    </td>
                   <td >{{$order->order_id}}  </td>
                  <td >{{$order->rest_name}}  </td>

                  
                  <td >{{$order->order_items}}  </td>
                  <td>  {{$order->quantity}} </td>                          
                   <td>NPR-{{$order->sub_total}}</td>
                    <td>NPR-{{$order->all_total}}</td>
                    <td>{{$order->user_name}}</td>
                    <td>{{$order->user_address}}</td>
                    <td>{{$order->payment_mode}}</td>
                    <td>{{$order->status}}</td>

                    <td> <a href="{{url('vendor/orderedit/'.$order->id)}}" class="btn btn-circle btn-success"><i class="far  fa-edit"></i>  </td> </a></td>

                    
                    
                  </tr>

          @endif
         
                @endforeach



                 @foreach($result as $order)

          @if($order->status =='delivered')

                  <tr style="background-color: green" >
                    <td id="green" ><?php echo $i; ?>
                    <?php $i++; ?>
                    
                    </td>
                   <td id="green" >{{$order->order_id}}  </td>
                  <td id="green">{{$order->rest_name}}  </td>

                  
                  <td id="green" >{{$order->order_items}}  </td>
                  <td id="green">  {{$order->quantity}} </td>                          
                   <td id="green">NPR-{{$order->sub_total}}</td>
                    <td id="green">NPR-{{$order->all_total}}</td>
                    <td id="green">{{$order->user_name}}</td>
                    <td id="green">{{$order->user_address}}</td>
                    <td id="green">{{$order->payment_mode}}</td>
                    <td id="green">{{$order->status}}</td>

                    <td> <a href="{{url('vendor/orderedit/'.$order->id)}}" class="btn btn-circle btn-success"><i class="far  fa-edit"></i>  </td> </a></td>

                    
                    
                  </tr>

          @endif
         
                @endforeach


      <style>
        #green{
          color:white;

        }


      </style>




                 @foreach($result as $order)

          @if($order->status == 'Ontheway')

                  <tr style="background-color: blue" >
                    <td ><?php echo $i; ?>
                    <?php $i++; ?>
                    
                    </td>
                   <td   >{{$order->order_id}}  </td>
                  <td >{{$order->rest_name}}  </td>

                  
                  <td >{{$order->order_items}}  </td>
                  <td>  {{$order->quantity}} </td>                          
                   <td>NPR-{{$order->sub_total}}</td>
                    <td>NPR-{{$order->all_total}}</td>
                    <td>{{$order->user_name}}</td>
                    <td>{{$order->user_address}}</td>
                    <td>{{$order->payment_mode}}</td>
                    <td>{{$order->status}}</td>

                    <td> <a href="{{url('vendor/orderedit/'.$order->id)}}" class="btn btn-circle btn-success"><i class="far  fa-edit"></i>  </td> </a></td>

                    
                    
                  </tr>

          @endif
         
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
