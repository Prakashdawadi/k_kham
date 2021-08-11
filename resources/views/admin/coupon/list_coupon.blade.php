@extends('admin/layout')
@section('page_title','list_coupon')
@section('container')
<div class="container">
<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>
<hr>
<div class="row">
    <h3>Welcome to the  List coupon</h3>
</div>

<div class="row">
    <div class="col-md-12">
<a href="{{url('admin/coupon/add_coupon')}}">
<button class="btn btn-success" ><i class=" fas fa-plus"></i> Add coupon  </button></a>
</div>

 </div>        
 <hr>              
                     <div class="row">
                         <table class="table col-md-12">
                <thead class="thead-dark table-bordered table-hover">
                  <th scope="col">Id</th>
                  <th scope="col">Id</th>
                  <th scope="col">Name</th>
                  <th scope="col">code</th>
                  <th scope="col">value</th>
                  <th scope="col">status</th>
                
                  <th scope="col">Action</th>
               
              </thead>
              <tbody>
   <?php 

    $key = 1;

    ?>

      @foreach( $result as $list)
         
      
     
     <tr>
       <td>{{$key}} </td>
       <?php $key++ ?> 
      <td>{{$list->id}}</td>
      <td>{{$list->coupons_name}}</td>
      <td>{{$list->coupons_code}}</td> 
      <td>{{$list->coupons_value}}</td> 

    
     
      
     @if( $list->coupons_status  == "active" )
    
       <td> <button class="btn btn-success" > {{$list->coupons_status }} </button></a></td>
       @else
         <td> <button class="btn btn-danger" > {{$list->coupons_status }} </button></a></td>
    

       @endif
   
    
       
       <!--  <a href="admin/dashboard"> model <img src="{{asset('images/category/'.$list->cats_image)}}"  width="100px"; height="100px" ; alt="image"> </a> 
        -->
        <!-- <td> 
         <a href="" class="modal">Display image</a>
         </td> -->
        <!--  <td> <a href="admin/dashboard"> <img src="{{asset('images/category/'.$list->cats_image)}}"  width="100px"; height="100px" ; alt="image"> </a> -->
     





      <td> <a href="{{url('admin/coupon/add_coupon/edit/'.$list->id)}}"><button class=" btn-circle btn-success"><i class="far fa-edit"></i> </button>  </a> 

     <a href="{{url('admin/coupon/list_coupon/delete/'.$list->id)}}"> <button class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i> </button> </td> </a>
      
    </tr>
    <hr style="border: 2px solid black">
   

    @endforeach
 
     
  </tbody>
</table>

 </div>
</div>

@endsection
