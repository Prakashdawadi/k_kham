@include('frontend.header')




<style>
  .padding {
    padding: 10rem !important
}

body {
    background-color: #f8fafe
}

.domain-form .form-group {
    border: 1px solid #9ff0c8;
    padding: 20px
}

.domain-form .form-group input {
    height: 70px !important;
    border: transparent
}

.form-control {
    height: 52px !important;
    background: #fff !important;
    color: #3a4348 !important;
    font-size: 18px;
    border-radius: 0px;
    -webkit-box-shadow: none !important;
    box-shadow: none !important
}

.px-4 {
    padding-left: 1.5rem !important
}

.domain-form .form-group .search-domain {
    background: #22d47b;
    border: 2px solid #22d47b;
    color: #fff;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    -ms-border-radius: 0;
    border-radius: 0
}

.domain-price span {
    color: #3a4348;
    margin: 0 10px
}

.domain-price span small {
    color: #24bdc9
}


</style>

<div class="container-fluid">
<div class="row justify-content-center padding">
    <div class="col-md-8 ftco-animate fadeInUp ftco-animated">
        <form id="form"  class="domain-form">
            <div class="form-group d-md-flex"> <input  type="number" id="index" name="Search" class="form-control px-4" placeholder="Enter your Order Track Number..."> <input type="submit" class="search-domain btn btn-primary px-5" value="Track Order"> </div>
          <!--   <button id="button" type="submit" style="background: green; color: white;"><i class=" btn btn-control-sm fa fa-search">Search</i></button> -->
        </form>
      
    </div>
</div>
<div id="message"></div>

<div id="message1" ></div>


  </div>
  
<!-- end of the  search track bar -->






<script>

   $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
	
$(document).ready(function(){


  $('#form').submit(function(e){
 

     var positive = $('#index').val();
 // alert(positive);

     if(positive < 0|| positive == 0){

      alert('Number cannot be Negtive or zero or empty');

     $('#form')['0'].reset();
     return false;
   }

   
 


    e.preventDefault();

  //alert('hello');

  jQuery.ajax({

     url: "http://k_kham.loc/index/track/search",
    // url: "http://127.0.0.1:8000/index/track/search",
     data:jQuery('#form').serialize(),
     type:'post',
     success:function(result){

      console.log(result); 

      $('#message').css({'color':'red','textAlign':'center','font-weight':'900'});
     $('#message1').css({'color':'green','textAlign':'center','font-weight':'900'});
     

       jQuery('#message').html(result.msg);
       jQuery('#message1').append(result.data).append(result.mg.status);

        // $('#form')[0].reset();
  /*  jQuery('#message1').html(result.mg.status);*/
       //$('#form').reset();
      // alert('hello');

    



     }



  });
  


  });



	


});


</script>




<br><br><br><br><br><br>

@include('frontend.footer')