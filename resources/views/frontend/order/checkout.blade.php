
<?php 

use App\Http\Controllers\CartController;
$total = CartController::itemsInCart();


 ?>
@include('frontend.header')



  <!--Main layout-->

  
  <div class=" alert-danger" id="mydiv">{{session('error')}}</div>
 <!--  <div class=" alert-success" id="mydiv">{{session('success')}}</div> -->
  
    <div class="container wow fadeIn">

      <!-- Heading -->
      <h2 class="my-5 h2 text-center">Checkout form</h2>

      <!--Grid row-->
      <div class="row">

        <!--Grid column-->
        <div class="col-md-8 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->

           
           <!--  <form class="card-body"> -->


              <form action="{{route('checkout/submit')}}" method="post"class="card-body" >

                @csrf

              <div class="md-form mb-5">


         @foreach($results as $result)

                @error('name')
                 <div class=" alert-danger" id="mydiv">
                 {{$message}}</div>
                @enderror


                  <label for="name" class="">Name:</label>
                <input type="text" name="name" id="name" class="form-control" value="{{$result->name}}">
              
              </div>


          @error('email')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror


              <!--email-->
              <div class="md-form mb-5">

                 <label for="email" class="">Email: </label>
                <input type="email" name="email" id="email" class="form-control" value=" {{$result->email}}">
               
              </div>

              @error('phone')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

               <div class="md-form mb-5">

                 <label for="email" class="">Phone: </label>
                <input type="text" name="phone" id="phone" class="form-control" value=" {{$result->phone}}">
               
              </div>         

              @endforeach

              <!--address-->

              @error('address')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror



              <div class="md-form mb-5">
                 <label for="address" class=""> Please Provide Current Address:</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="enter your current address">
               
              </div>

               <!--instruct-->

                @error('instruct')
           <div class=" alert-danger" id="mydiv">
           {{$message}}</div>
          @enderror

              <div class="md-form mb-5">
                 <label for="instruct" class="">Any Instruction to Order:</label>
                <input type="text" name="instruct" id="instruct" class="form-control" placeholder="you may give any instruction">
               
              </div>
                <div class="md-form mb-5">
                 <label for="instruct" class="">Payment Method:</label>
                
               
              </div>


              <div class="d-block my-3">
                <div class="custom-control custom-radio">
                  <input id="credit" name="pay" value="cash on delivery" id="cash" type="radio" class="custom-control-input" checked required>
                  <label class="custom-control-label" for="credit">Cash on delivery</label>
                </div>
               <!--  <div class="custom-control custom-radio">
                  <input id="debit" name="pay" value="esewa" type="radio" id = "esewa" class="custom-control-input" required>
                  <label class="custom-control-label" for="debit">esewa</label>
                </div>
                <div class="custom-control custom-radio">
                  <input id="paypal" name="pay" value="fonepay" type="radio" id="fonepay" class="custom-control-input" required>
                  <label class="custom-control-label" for="paypal">fonepay</label>
                </div> -->
              </div>
              
              <hr class="mb-4">
              <button class="btn btn-primary btn-lg btn-block"   id="submit" type="submit">Continue to checkout</button>
      </form>

         <!--    </form> -->

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-4  mb-4">

          <!-- Heading -->
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted"><strong>My Cart</strong></span>
            <span class="badge badge-secondary badge-pill">{{$total}}</span>
          </h4>

          <!-- Cart -->

       
          <ul class="list-group mb-3 z-depth-1">

             @foreach($cart as $product)
            <li class="list-group-item d-flex justify-content-between lh-condensed">
              <div>
                <h6 class="my-0">{{$product->food_name}}</h6>
                <small class="text-muted">Brief description</small>
              </div>
              <span class="text-muted">{{$product->quantity}}</span>
              <span class="text-muted">NPR.{{$product -> total_price}}</span>
            </li>
            @endforeach


            @foreach($grandtotal as $alltotal)
            <li class="list-group-item d-flex justify-content-between">
              <span>Total NPR</span>
              <strong>{{$alltotal->all_total}}</strong>
            </li>

            @endforeach
          </ul>
          <!-- Cart -->

         
          <!-- Promo code -->

        </div>
        <!--Grid column-->

      </div>
      <!--Grid row-->

    </div>
 











 
 


  @include('frontend.footer')