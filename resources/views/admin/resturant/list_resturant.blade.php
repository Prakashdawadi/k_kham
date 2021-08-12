@extends('admin/layout')
@section('page_title','list_category')
@section('container')

<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>
<hr>

<div class="row">
    <h3>Welcome to the  List resturant</h3>
</div>

<div class="row">
    <div class="col-md-12">
<a href="{{url('admin/resturant/add_resturant')}}">
<button class="btn btn-success" ><i class=" fas fa-plus"></i> Add resturant  </button></a>
</div>
 </div>        
 <hr>              
                     <div class="row">
                         <table class="table col-md-12 table-responsive">
                <thead class="thead-dark table-bordered table-hover ">
              <th scope="col">Id</th>
              <th scope="col">Re_Name</th>
              <th scope="col">address</th>
              <th scope="col">email</th>
              <th scope="col">phone</th>
              <th scope="col">opening time</th>
              <th scope="col">closing Time</th>
              <th scope="col">image</th>
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
                        <td>{{$list->rest_name}}</td>
                        <td>{{$list->rest_address}}</td> 
                        <td>{{$list->rest_email}}</td>
                        <td>{{$list->rest_phone}}</td>
                        <td>{{$list->rest_otime}}</td>

                        <td>{{$list->rest_ctime}}</td>
                         <td><img src="{{asset('images/resturant/'.$list->rest_image)}}"  width="100px"; height="100px" ; alt="image"> </td>
                  
               @if( $list->rest_status  == "active" )
              
                 <td> <button class="btn btn-success" > {{$list->rest_status }} </button></a></td>
                 @else
                   <td> <button class="btn btn-danger" > {{$list->rest_status }} </button></a></td>
              

                 @endif
             
          
      <td> <a href="{{url('admin/resturant/edit_resturant/edit/'.$list->id)}}"><button class=" btn-circle btn-success"><i class="far fa-edit"></i> </button>  </a> 

     <a href="{{url('admin/resturant/list_resturant/delete/'.$list->id)}}"> <button onclick="return confirm('Are you sure want to delete {{$list->rest_name}} resturant? ')" class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i> </button> </td> </a>
      
    </tr>
    <hr style="border: 2px solid black">
   

    @endforeach
 
     
  </tbody>
</table>

<div id="message">



 {{$result->links( "pagination::bootstrap-4")}}
</div>

 </div>


@endsection
