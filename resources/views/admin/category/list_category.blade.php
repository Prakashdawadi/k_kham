@extends('admin/layout')
@section('page_title','list_category')
@section('container')
<div class="container">
<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>
<hr>
<div class="row">
    <h3>Welcome to the  List category</h3>
</div>

<div class="row">
    <div class="col-md-12">
<a href="{{url('admin/category/add_category')}}">
<button class="btn btn-success" ><i class=" fas fa-plus"></i> Add category  </button></a>
</div>

 </div>        
 <hr>              
                     <div class="row">
                         <table class="table col-md-12">
                <thead class="thead-dark table-bordered table-hover">
            <th scope="col">Id</th>
            <th scope="col">Id</th>
            <th scope="col">Catgory</th>
            <th scope="col">slug</th>
            <th scope="col">Status</th>
            <th scope="col">image</th>
            
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
                  <td>{{$list->cats_name}}</td>
                  <td>{{$list->cats_slug}}</td> 

                
                 
                  
                 @if( $list->status  == "active" )
                
                   <td> <button class="btn btn-success" > {{$list->status }} </button></a></td>
                   @else
                     <td> <button class="btn btn-danger" > {{$list->status }} </button></a></td>
                

                   @endif
               
    
       
       <!--  <a href="admin/dashboard"> model <img src="{{asset('images/category/'.$list->cats_image)}}"  width="100px"; height="100px" ; alt="image"> </a> 
        -->
       <!--  <td> 
         <a href="" class="modal">Display image</a>
         </td> -->
           <td><img src="{{asset('images/category/'.$list->cats_image)}}"  width="100px"; height="100px" ; alt="image"> </td>
     





      <td> <a href="{{url('admin/category/add_category/edit/'.$list->id)}}"><button class=" btn-circle btn-success"><i class="far fa-edit"></i> </button>  </a> 

     <a href="{{url('admin/category/list_category/delete/'.$list->id)}}"> <button class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i> </button> </td> </a>
      
    </tr>
    <hr style="border: 2px solid black">
   

    @endforeach
 
     
  </tbody>
</table>

 </div>
</div>

@endsection
