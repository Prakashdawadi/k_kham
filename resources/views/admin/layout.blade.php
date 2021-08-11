<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
   
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Admin||@yield('page_title')</title>







    <!-- Fontfaces CSS-->
    <!-- <link href="{{asset('admin_assets/css/font-face.css')}}" rel="stylesheet" media="all"> -->
    <link href="{{asset('admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
     <link href="{{asset('admin_assets/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all"> 

    <!-- Vendor CSS-->
    <link href="{{asset('admin_assets/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('admin_assets/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    
    <!-- 
    <link href="{{asset('admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!- Main CSS-->
    <link href="{{asset('admin_assets/css/theme.css')}}" rel="stylesheet" media="all"> -->

</head>
<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>

            <!-- mobile  section header section-->

            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">

                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard sasdas1</a>
                                </li>
                                <li>
                                   

                            </ul>
                        </li>



                           <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>resturant</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/resturant/list_resturant')}}">List resturant</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/resturant/add_resturant')}}">Add resturant</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->


                           <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>menu</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/menu/list_menu')}}">List menu</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/menu/add_menu')}}">Add menu</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->



                           <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>banner</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/banner/list_banner')}}">List banner</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/banner/add_banner')}}">Add banner</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->

                             <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>order</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/order/list_order')}}">List order</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/order/list_order')}}">Add order</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->

                              <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>Vendor manage</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/vendor/inactive')}}">List unactive resturant</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/vendor/active')}}">list active vendor</a>
                                </li>

                                   
                            </ul>
                        </li>

                        <!-- END -->




                       
                    </ul>
                </div>
            </nav>
        </header>

        <!-- mobile section header en  -->

        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
               <!--  <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a> -->
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="list-unstyled navbar__sub-list js-sub-list">
                                <li>
                                 <a href="{{url('admin/dashboard/view')}}">Dashboard</a>
                                </li>
                               





                            </ul>

                        </li>


                           <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>resturant</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/resturant/list_resturant')}}">List resturant</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/resturant/add_resturant')}}">Add resturant</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->



                           <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>menu</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/menu/list_menu')}}">List menu</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/menu/add_menu')}}">Add menu</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->


                           <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>banner</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/banner/list_banner')}}">List banner</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/banner/add_banner')}}">Add banner</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->

                             <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>order</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/order/list_order')}}">List order</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/order/list_order')}}">Add order</a>
                                </li>

                                   
                            </ul>
                        </li>
                        
                            <!-- end -->




                           <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>Vendor manage</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/vendor/inactive')}}">List unactive resturant</a>
                                </li>
                                <li>
                                    <a href="{{url('admin/vendor/active')}}">list active vendor</a>
                                </li>

                                   
                            </ul>
                        </li>

                        <!-- END -->

                         <!-- start -->
                         <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-box"></i>user manage</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{url('admin/user/list')}}">List all user</a>
                                </li>
                                <li>
                                    <a href="#">no list yet</a>
                                </li>

                                   
                            </ul>
                        </li>

                        <!-- END -->







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
                                        <div class="image">
                                          
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">{{session('name')}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                               <!--  <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                    </a>
                                                </div> -->
                                                <div class="content">
                                                    <h5 class="name">
                                                        <span class="name">
                                                        <a href="#"></a>
                                                    </span>
                                                    </h5>
                                                    <span class="email">{{session('email')}}</span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                               
                                            </div>
                                            <div class="account-dropdown__footer">
                                               <a href="{{url('admin/logout')}}">
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
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->

            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                       
                       
                         @yield('container')
                          

                    
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

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
