<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Vendor||@yield('page_title')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
     <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all"> 

    <!-- Vendor CSS-->
    <link href="{{asset('admin_assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    
    
    <link href="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body  class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="">
                                <i class="fas fa-home"></i>Dashboard</a>
                            
                        </li>


                        
                        <li class="has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-image" ></i>order</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li >
                                    <a href="{{url('vendor/order/list_order')}}">list_order</a>
                                </li>
                               <!--  <li >
                                    <a href="{{url('vendor/order/edit')}}">edit Order</a>
                                </li> -->

                                   
                            </ul>
                        </li>
                        


                       <!--   <li class="has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-bars" ></i> Food menu</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li >
                                    <a href="{{url('admin/menu/list_menu')}}">list_menu</a>
                                </li>
                                <li >
                                    <a href="{{url('admin/menu/add_menu')}}">add_menu</a>
                                </li> -->

                                   
                            </ul>
                        </li>

                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
              <!--   <a href="#">
                   <img src="{{asset('admin_assets/images/icon/logo.png')}}" alt="CoolAdmin" />
                </a> -->
                 <a target="_blank" href="{{url('index')}}"><h3 class="text2">Go to के खाम</h3> </a>

            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                      
                            <li class="has-sub">
                            <a class="js-arrow" href="{{url('admin/dashboard')}}">
                                <i class="fas fa-home"></i>Dashboard</a>
                            
                        </li>
                         </li>

                         <!-- <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>Menu</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="#">List menu</a>
                                </li>
                                <li>
                                    <a href="#">Add menu</a>
                                </li>

                                   
                            </ul>
                        </li>
                         -->

                        

                        <li class="has-sub ">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-image" ></i>order</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li >
                                    <a href="{{url('vendor/order/list_order')}}">list_order</a>
                                </li>
                               <!--  <li >
                                    <a href="{{url('vendor/order/edit')}}">edit Order</a>
                                </li> -->

                                   
                            </ul>
                        </li>


                        

                                   
                           


                        



                           
                    </ul>
                </nav>
            </div>
             
           

        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form class="form-header" action="" method="POST">
                                <input class="au-input au-input--xl" type="text" name="search" placeholder="out of order" />
                                <button class="au-btn--submit" type="submit">
                                    <i class="zmdi zmdi-search"></i>
                                </button>
                            </form>
                            <div class="header-button">
                               
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                       
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{session('name')}} </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                               <!--  <div class="image">
                                            <img src="{{asset('admin_assets/images/icon/avatar-01.jpg')}}" alt="John Doe" />
                                        </div> -->



                                                <div class="content">
                                                    
                                                    <span class="email">{{session('email')}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="{{url('vendor/profile/manage')}}">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                             
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('vendor/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END HEADER DESKTOP-->

           <!-- MAIN CONTENT-->
            <div class="main-content" style="background-color: white;">
                <div class="section__content section__content-p30">
                    <div class="container">
           @section('container')
                         @show
                                        
                    </div>
                </div>
                 
            </div>

         

         

            </div>
        </div>
        <!-- END PAGE CONTAINER-->

       
    </div>

    

                  


   <!-- Jquery JS-->
    <script src="{{asset('admin_assets/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
 
    <script src="{{asset('admin_assets/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('admin_assets/vendor/animsition/animsition.min.js')}}"></script>
    <!-- <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script> -->
   
    
    <script src="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <!-- <script src="{{asset('admin_assets/vendor/chartjs/Chart.bundle.min.js')}}"></script> -->
    <script src="{{asset('admin_assets/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('admin_assets/js/main.js')}}"></script>
     <script>
        $(document).ready(function(){
        setTimeout(function(){

            $('#mydiv').fadeOut(10000);


        });
         setTimeout(function(){

            $('#mydiv1').fadeOut(10000);


        });





        });
    

    </script>

</body>

</html>
<!-- end document-->
