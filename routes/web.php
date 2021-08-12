<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CouponController ;
use App\Http\Controllers\BannnerController ;
use App\Http\Controllers\ResturantController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FronendController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\GrandTotalController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\SuscribeController;


use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('', function () {
    return view('welcome');

});*/
// For suscribe

Route::resource('suscribe',SuscribeController::class);

Route::get('/',[FronendController::class,'index1']);


// gallery route

Route::get('index/gallery',[BannnerController::class,'gallery']);

// end of gallery route

//search route

Route::get('index/search',[ResturantController::class,'search'])->name('index/search');

// end of search route


// vendor VendorController


Route::get('vendor/updatepassword',[VendorController::class,'updatepassword']);

// vendor login

Route::get('vendor/login',[VendorController::class,'vendor']);
Route::post('vendor/login/signin',[VendorController::class,'vendorlogin'])->name('vendor/signin');

// vendor sign up
Route::get('vendor/signup',[VendorController::class,'vendorsignup']);
Route::post('vendor/signup/submit',[VendorController::class,'vendorsignupsubmit'])->name('vendor/signup');



// vendors middleware

Route::group(['middleware'=>'vendors'],function(){

Route::get('vendor/dashboard',[VendorController::class,'dashboard']);

Route::get('vendor/logout',[VendorController::class,'logout']);

// vendor edit profile


Route::get('vendor/profile/manage',[VendorController::class,'myprofileview']);
Route::post('vendor/profile/manage/submit',[VendorController::class,'editprofilesubmit'])->name('vendor/edit');

  


// end of vendor profile




// vendor menu 
Route::get('vendor/menu/list_menu',[VendorController::class,'list_menu']);
Route::get('vendor/menu/add_menu',[VendorController::class,'add_menu']);
Route::post('vendor/menu/list_menu',[VendorController::class,'submit'])->name('vendor/menu/submit');
Route::get('vendor/menu/list_menu/delete/{id}',[VendorController::class,'delete']);




// end of vendor menu

// vendor order list

Route::get('vendor/order/list_order',[VendorController::class,'list_order']);
Route::get('vendor/orderedit/{id}',[VendorController::class,'order_edit']);
Route::post('vendor/orderedit/submit',[VendorController::class,'ordereditsubmit'])->name('order/edit');


// end of vendor order list




});

// track order
Route::get('index/trackorder',[UserController::class,'track']);

Route::post('index/track/search',[UserController::class,'searchtrack']);



// end of track order


// end vendor route



// add to cart
Route::post('index/addtocart/store',[CartController::class,'menu'])->name('index.cart');




Route::group(['middleware'=>'all_user'],function(){

// user cart list
  Route::get('index/mycart',[CartController::class,'showCart']);
  //Route::get('index/mycart/update',[CartController::class,'updateCart']);

  Route::get('index/cart/update/{id}',[CartController::class,'updateCart']);

   Route::get('index/checkout',[OrderController::class,'orderlist']);

   Route::get('index/myorder/delete/{id}',[CartController::class,'delete']);

   Route::post('index/checkout',[OrderController::class,'submit'])->name('checkout/submit');

   Route::post('index/checkout/confirm',[OrderController::class,'placeorder'])->name('checkout/submit/confirm');

   Route::get('index/checkout/confirm',[OrderController::class,'thankyou']);

   Route::get('index/myorders',[OrderController::class,'myorder']);

   // user edit profile section
  Route::get('index/user/manage',[UserController::class,'usereditview']);

  Route::post('index/user/manage/submit',[UserController::class,'usereditsubmit'])->name('user/edit');

  
// end of the edit profile setion
   



  //Route::get('index/placeorder',[OrderController::class,'placeorder']);

  //Route::get('index/thankyou',[OrderController::class,'thankyou']);

});


// user forget password
Route::get('index/users/forgotpassword',[ForgotPasswordController::class,'forgotpassword']);

Route::post('index/users/forgotpassword',[ForgotPasswordController::class,'verifyemail'])->name('index/user/forget');

Route::get('{token}/reset-password',[ForgotPasswordController::class,'getpassword']);
Route::post('{token}/updatepassword',[ForgotPasswordController::class,'updatepassword'])/*->name('password/update')*/;


// end of forget password

// start of vendor forgot password

Route::get('vendor/forgotpassword',[ForgotPasswordController::class,'vendorforgotpassword']);

Route::post('vendor/forgotpassword',[ForgotPasswordController::class,'verifyvendoremail'])->name('vendor/forget');

Route::get('reset-password/vendor/{token}',[ForgotPasswordController::class,'getvendorpassword']);

Route::post('reset-password/vendor/{token}',[ForgotPasswordController::class,'updatevendorpassword']);



// end of the  vendor forgot password

 Route::get('index/cart/delete',[GrandTotalController::class,'total']);


Route::get('index/users/user_login',[UserController::class,'user_login']);
Route::post('index/users/user_login',[UserController::class,'userlogin'])->name('index/user/signin');


Route::get('index/users/user_signup',[UserController::class,'user_signup']);
Route::post('index/users/user_signup',[UserController::class,'usersignup'])->name('index/user/submit');
Route::GET('updatepassword',[UserController::class,'updatepassword']);


// front end controller

Route::get('index',[FronendController::class,'index1']);


//Route::get('index/{cats}',[FronendController::class,'resturant_list']);

Route::get('index/{rest}',[FronendController::class,'eachresturant']);




//Route::group(['middleware'=>'customer_user'],function(){
Route::get('user/logout',[UserController::class,'userlogout']);


//});



// admin login authentication


Route::get('admin',[AdminController::class,'admin']);
Route::post('admin/dashboard',[AdminController::class,'adminlogin'])->name('admin/login');





Route::group(['middleware'=>'admin'],function(){
//Route::group(['middleware'=>['admin']],function(){

  // admin all total  of data in number 

Route::get('admin/dashboard/view',[AdminController::class,'dashboardview']);




	// admin route
Route::get('admin/dashboard',[AdminController::class,'dashboard']);
Route::get('admin/logout',[AdminController::class,'adminlogout']);

Route::get('admin/updatepassword',[UserController::class,'updatepassword']);




// Banner route
Route::get('admin/banner/list_banner',[BannnerController::class,'list_banner']);
Route::get('admin/banner/add_banner',[BannnerController::class,'add_banner']);
Route::post('admin/banner/list_banner',[BannnerController::class,'submit'])->name('admin/banner/submit');
Route::get('admin/banner/list_banner/delete/{id}',[BannnerController::class,'delete']);
Route::get('admin/banner/edit_banner/edit/{id}',[BannnerController::class,'edit_banner']);
Route::post('admin/banner/update_banner',[BannnerController::class,'update'])->name('admin/banner/update');


// resturant route

Route::get('admin/resturant/list_resturant',[ResturantController::class,'list_resturant']);
Route::get('admin/resturant/add_resturant',[ResturantController::class,'add_resturant']);
Route::get('admin/resturant/edit_resturant/edit/{id}',[ResturantController::class,'edit_resturant']);
Route::post('admin/resturant/list_resturant',[ResturantController::class,'submit'])->name('admin/resturant/submit');
Route::post('admin/resturant/edit_resturant',[ResturantController::class,'update'])->name('admin/resturant/update');



Route::get('admin/resturant/list_resturant/delete/{id}',[ResturantController::class,'delete']);
Route::get('admin/resturant/add_resturant/edit/{id}',[ResturantController::class,'add_resturant']);

// food menu route


Route::get('admin/menu/list_menu',[MenuController::class,'list_menu']);
Route::get('admin/menu/add_menu',[MenuController::class,'add_menu']);
Route::post('admin/menu/list_menu',[MenuController::class,'submit'])->name('admin/menu/submit');
Route::get('admin/menu/list_menu/delete/{id}',[MenuController::class,'delete']);
Route::get('admin/menu/edit_menu/edit/{id}',[MenuController::class,'edit_menu']);
Route::post('admin/menu/edit_menu/update',[MenuController::class,'update'])->name('admin/menu/update');



//admin order view

Route::get('admin/order/list_order',[AdminController::class,'adminvieworder']);

// admin manges vendor section route
Route::get('admin/vendor/inactive',[AdminController::class,'inactivevendor']);

// inactive vendor delete and edit by admin

Route::get('admin/vendor/inactive/edit/{id}',[AdminController::class,'editinactivevendor']);

Route::post('admin/vendor/inactive/update',[AdminController::class,'inactivendorupdate'])->name('inactive/update');

Route::get('admin/vendor/inactive/delete/{id}',[AdminController::class,'deleteinactivevendor']);

// active vendor edit and updated, delete by admin

Route::get('admin/vendor/active',[AdminController::class,'activevendor']);

Route::get('admin/vendor/active/edit/{id}',[AdminController::class,'editactivevendor']);

Route::post('admin/vendor/active/update',[AdminController::class,'activendorupdate'])->name('active/update');

Route::get('admin/vendor/active/delete/{id}',[AdminController::class,'deleteactivevendor']);

// admin manages user section

Route::get('admin/user/list',[AdminController::class,'adminuserlist']);

Route::get('admin/user/active/edit/{id}',[AdminController::class,'edituserbyadmin']);
Route::post('admin/user/update',[AdminController::class,'adminupdateuser'])->name('user/update');

Route::get('admin/user/delete/{id}',[AdminController::class,'deleteuserbyadmin']);



});

Route::get('index/menu_details/{menu_id}',[MenuController::class,'viewproduct']);



//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
