@include('frontend.header')



 <!-- resturant list-->

 <div class="container" style="background-color: white;">
    <!--first row of name of restaurant-->
    <div class="row ">

      
        @foreach($searches as $data)
    
       
      <div class=" hotel_pointer col-lg-3 col-md-3">
        <div class="hovereffect ">

          <a href="{{url('index/'.$data->rest_name)}}";><img src="{{asset('images/resturant/'.$data->rest_image)}}" class="img-responsive"></a>
          </div>

         
          <div class="row">
           <span style="padding-left: 100px; font-weight:bold;font-family:serif; ">{{$data->rest_name}}</span>
          </div>
            <div class="row">
           <a href=""> <i class="fa fa-map-marker" style="padding-left: 40px;font-weight:bold;">&nbsp;<span></span> </i>{{$data->rest_address}}</a>
          </div>      
    </div>

    
  @endforeach

 </div>
 
</div>

@include('frontend.footer')