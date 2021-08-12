@extends('admin/layout')
@section('page_title','list_banner')
@section('container')
<div class="container">
<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>
<hr>
<div class="row">
    <h3>Welcome to the  List Banner</h3>
</div>

<div class="row">
    <div class="col-md-12">
<a href="{{url('admin/banner/add_banner')}}">
<button class="btn btn-success" ><i class=" fas fa-plus"></i> add banner </button></a>
</div>

 </div>        
 <hr>              
                     <div class="row">
                         <table class="table col-md-12">
                <thead class="thead-dark table-bordered table-hover">
                  <th scope="col">Id</th>
                  <th scope="col">Id</th>
                  <th scope="col">Banner name</th>
                  <th scope="col">link</th>
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
                <td>{{$list->id}}</td>
                <td>{{$list->bans_name}}</td>
                <td>{{$list->bans_link}}</td> 
               <td><img src="{{asset('images/banner/'.$list->bans_image)}}"  width="100px"; height="100px" ; alt="image"> </td>
    
           @if( $list->bans_status  == "active" )
          
             <td> <button class="btn btn-success" > {{$list->bans_status }} </button></a></td>
             @else
               <td> <button class="btn btn-danger" > {{$list->bans_status }} </button></a></td>
          

             @endif
      

      <td> <a href="{{url('admin/banner/edit_banner/edit/'.$list->id)}}"><button class=" btn-circle btn-success"><i class="far fa-edit"></i> </button>  </a> 

     <a href="{{url('admin/banner/list_banner/delete/'.$list->id)}}"> <button  onclick="return confirm('Are you sure want to delete {{$list->bans_name}} banner? ')" class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i> </button> </td> </a>
      
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
