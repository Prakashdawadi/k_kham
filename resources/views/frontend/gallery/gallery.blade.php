@include('frontend.header')

<!--    
<div  class="container-fluid">  
<div class="row">

    <div class="col-10">
  <form  action="{{route('index/search')}}" method="get">
      <input type="text" name="Search" class=" form-control" placeholder="enter your favourite resturant">

    </div>

    <div class="col-2">
     <button type="submit" style="background: green; color: white;"><i class=" btn btn-control-sm fa fa-search">Search</i></button>
    </div>
    
  </form>
  
</div>
</div> -->

<!-- search start -->


<!-- Another variation with a button -->
  
<!--   <style>
    

    .main {
    width: 50%;
    margin: 50px auto;
}

/* Bootstrap 4 text input with search icon */

.has-search .form-control {
    padding-left: 2.375rem;
}

.has-search .form-control-feedback {
    position: absolute;
    z-index: 2;
    display: block;
    width: 2.375rem;
    height: 2.375rem;
    line-height: 2.375rem;
    text-align: center;
    pointer-events: none;
    color: #aaa;
}
  </style>
 -->

<div class="container">
 <form  action="{{route('index/search')}}" method="get">
  @csrf
  <div class="input-group">
    
    <input type="text" name="Search" class="form-control"  placeholder="Find the Favourite resturant">
    <div class="input-group-append">
      <button class="btn btn-secondary"  style="padding-top: 0px;" type="submit">
        <i class="fa fa-search"></i>
      </button>

    </div>
     </form>
  </div>
</div>



<!-- end  of search-->
       <hr>
<!-- srart -->

<style>
	

	#mygallery {
  padding: 30px 0;
  position: relative;
  background-color: lightblue;
}

.gallery {
  width: 600px;
  margin: auto;
  border-radius: 3px;
  overflow: hidden;
  //position: relative;
}
.img-c {
  width: 200px;
  height: 200px;
  float: left;
  position: relative;
  overflow: hidden;
}

.img-w {
  position: absolute;
  width: 100%;
  height: 100%;
  background-size: cover;
  background-position: center;
  cursor: pointer;
  transition: transform ease-in-out 300ms;
}

.img-w img {
  display: none;
}

.img-c {
    transition: width ease 400ms, height ease 350ms, left cubic-bezier(0.4, 0, 0.2, 1) 420ms, top cubic-bezier(0.4, 0, 0.2, 1) 420ms;
}

.img-c:hover .img-w {
  transform: scale(1.08);
  transition: transform cubic-bezier(0.4, 0, 0.2, 1) 450ms;
}

.img-c.active {
  width: 100% !important;
  height: 100% !important;
  position: absolute;
  z-index: 2;
  //transform: translateX(-50%);
}

.img-c.postactive {
  position: absolute;
  z-index: 2;
  pointer-events: none;
}

.img-c.active.positioned {
  left: 0 !important;
  top: 0 !important;
  transition-delay: 50ms;
}
</style>

<div class="container" id="mygallery">

<div class="gallery">
	
@foreach($photo as $photos)	
  <div class="img-w">

  	
    <img src="{{asset('images/banner/'.$photos->bans_image)}}" alt="" /></div>
@endforeach
   
     

</div>

</div>
 
<script>
	
	$(function() {
  $(".img-w").each(function() {
    $(this).wrap("<div class='img-c'></div>")
    let imgSrc = $(this).find("img").attr("src");
     $(this).css('background-image', 'url(' + imgSrc + ')');
  })
            
  
  $(".img-c").click(function() {
    let w = $(this).outerWidth()
    let h = $(this).outerHeight()
    let x = $(this).offset().left
    let y = $(this).offset().top
    
    
    $(".active").not($(this)).remove()
    let copy = $(this).clone();
    copy.insertAfter($(this)).height(h).width(w).delay(500).addClass("active")
    $(".active").css('top', y - 8);
    $(".active").css('left', x - 8);
    
      setTimeout(function() {
    copy.addClass("positioned")
  }, 0)
    
  }) 
  
  

  
})

$(document).on("click", ".img-c.active", function() {
  let copy = $(this)
  copy.removeClass("positioned active").addClass("postactive")
  setTimeout(function() {
    copy.remove();
  }, 500)
})
</script>

<!-- end of gallery --> 



@include('frontend.footer')