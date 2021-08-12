@extends('admin/layout')
@section('page_title','inactivevendor')
@section('container')


<hr>

<div class="row">
    <h3>Welcome to the  inactive vendor list</h3>
</div>

<div class="row">
    <div class="col-md-12">
<!-- <a href="{{url('admin/resturant/add_resturant')}}">
<button class="btn btn-success" ><i class=" fas fa-plus"></i> Add resturant  </button></a> -->
</div>
 </div>  
 <div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>      
 <hr>              
                     <div class="row">

                         <table class="table col-md-12 table-responsive">
                <thead class="thead-dark table-bordered table-hover ">
              <th scope="col">Id</th>
          
              <th scope="col">ven_Name</th>
             
              <th scope="col">email</th>            
              <th scope="col">phone</th>  
               <th scope="col">ven_address</th>          
             <th scope="col">rest_name</th>          
             
              <th scope="col">ven_status</th>

              <th scope="col">role</th>
               <th scope="col">action</th>
               
              </thead>
                      <tbody>
                 <?php 

                  $key = 1;

                  ?>

                 @foreach($data as $datas)
                 
                  <tr style="background-color: red;">
                         <td>{{$key}} </td>
                         <?php $key++ ?> 
                       
                     
                        <td>{{$datas->name}}</td>                   
                       
                        <td>{{$datas->ven_email}}</td>

                        <td>{{$datas->phone}}</td>
                        <td>{{$datas->address}}</td>   
                         <td>{{$datas->resturant_name}}</td>           
              
                       <td>{{$datas->ven_status}}</td>
              
                     <td>{{$datas->role}}</td>
              
  
          
      <td> <a href="{{url('admin/vendor/inactive/edit/'.$datas->id)}}"><button class=" btn-circle btn-success"><i class="far fa-edit"></i> </button>  </a> 

     <a href="{{url('admin/vendor/inactive/delete/'.$datas->id)}}"> <button onclick="return confirm('Are you sure want to delete {{$datas->name}} vendor? ')"  class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i> </button> </td> </a>
      
    </tr>

    @endforeach


    <hr style="border: 2px solid black">
   

   
 
     
  </tbody>
</table>

<div id="message">



 {{$data->links( "pagination::bootstrap-4")}}
</div>


 </div>


@endsection
