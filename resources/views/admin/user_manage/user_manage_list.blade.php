@extends('admin/layout')
@section('page_title','user_manage')
@section('container')

<div class="row">
     <div class=" alert-danger" id="mydiv"><p>{{session('error')}}</p></div>
     <div class=" alert-success" id="mydiv1">{{session('success')}}</div>
   </div>
<hr>

<div class="row">
    <h3>Welcome to the  user management</h3>
</div>

<div class="row">
    <div class="col-md-12">

</a>
</div>
 </div>        
 <hr>              
                     <div class="row">
                         <table class="table col-md-12 table-responsive">
                <thead class="thead-dark table-bordered table-hover ">
              <th scope="col">Id</th>
          
              <th scope="col">user_Name</th>
             
              <th scope="col">email</th>            
              <th scope="col">phone</th>  
                  
                
             
              <th scope="col">ven_status</th>

              <th scope="col">role</th>
               <th scope="col">action</th>
               
              </thead>
                      <tbody>
                 <?php 

                  $key = 1;

                  ?>

                 @foreach($data as $datas)
                  
                  @if( $datas -> status == "active")

                  <tr style="background-color: green;">
                         <td style="color:maroon;">{{$key}} </td>
                         <?php $key++ ?> 
                       
                     
                        <td style="color:maroon;">{{$datas->name}}</td>                   
                       
                        <td style="color:maroon;">{{$datas->email}}</td>

                        <td style="color:maroon;">{{$datas->phone}}</td>
                         
                                
              
                       <td style="color:maroon;">{{$datas->status}}</td>
              
                     <td style="color:maroon;">{{$datas->role}}</td>
              @else

              <tr style="background-color: red;">
                         <td style="color:maroon;">{{$key}} </td>
                         <?php $key++ ?> 
                       
                     
                        <td style="color:maroon;">{{$datas->name}}</td>                   
                       
                        <td style="color:maroon;">{{$datas->email}}</td>

                        <td style="color:maroon;">{{$datas->phone}}</td>
                         
                                
              
                       <td style="color:maroon;">{{$datas->status}}</td>
              
                     <td style="color:maroon;">{{$datas->role}}</td>


              @endif

      
      <td> <a href="{{url('admin/user/active/edit/'.$datas->id)}}"><button class=" btn-circle btn-success"><i class="far fa-edit"></i> </button>  </a> 

     <a href="{{url('admin/user/delete/'.$datas->id)}}"> <button  onclick="return confirm('Are you sure want to delete {{$datas->name}} user? ')"  class="btn btn-circle btn-danger"><i class="far fa-trash-alt"></i> </button> </td> </a>
      
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
