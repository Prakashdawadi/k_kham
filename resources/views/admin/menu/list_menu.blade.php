@extends('admin/layout')
@section('page_title','list_menu')
@section('container')
<div class="container">
<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>
<hr>
<div class="row">
    <h3>Welcome to the  List menu</h3>
</div>

<div class="row">
    <div class="col-md-12">
<a href="{{url('admin/menu/add_menu')}}">
<button class="btn btn-success" ><i class=" fas fa-plus"></i>List menu  </button></a>
</div>

 </div>        
 <hr>              
                     <div class="row">
                         <table class="table col-md-12">
                <thead class="thead-dark table-bordered table-hover">
                  <th scope="col">Id</th>
                  <th scope="col">Id</th>
                  <th scope="col">Food Name</th>
                  <th scope="col">price</th>
                  <th scope="col">Resturant Id</th>
                  <th scope="col">status</th>
                  <th scope="col">Image</th>
                
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
      <td>{{$list->menu_id}}</td>
      <td>{{$list->menu_name}}</td>
      <td>{{$list->menu_price}}</td> 
      <td>{{$list->rests_id}}</td> 

    
     
      
     @if( $list->menu_status  == "active" )
    
       <td> <button class="btn btn-success" > {{$list->menu_status }} </button></a></td>
       @else
         <td> <button class="btn btn-danger" > {{$list->menu_status }} </button></a></td>
    

       @endif
   
    <td><img src="{{asset('images/menu/'.$list->menu_image)}}"  width="100px"; height="100px" ; alt="image"> </td>
      

      <td> <a href="{{url('admin/menu/add_menu/edit/'.$list->menu_id)}}"><button class=" btn-circle btn-success"><i class="far fa-edit"></i> </button>  </a> 

     <a href="{{url('admin/menu/list_menu/delete/'.$list->menu_id)}}"> <button onclick="return confirm('Are you sure want to delete {{$list->menu_name}} menu? ')" class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i> </button> </td> </a>
      
    </tr>
    <hr style="border: 2px solid black">
   

    @endforeach
 
    
  </tbody>
</table>


<div id="message">



 {{$result->links( "pagination::bootstrap-4")}}
</div>
 </div>
</div>


@endsection

