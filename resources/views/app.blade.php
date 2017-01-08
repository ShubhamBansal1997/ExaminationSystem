
<!DOCTYPE html>
<html lang="en">

<!--================================================================================
  Item Name: Materialize - Material Design Admin Template
  Version: 3.1
  Author: GeeksLabs
  Author URL: http://www.themeforest.net/user/geekslabs
================================================================================ -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="msapplication-tap-highlight" content="no">
    <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
    <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
    <title>Neetgurumantra</title>

    <!-- Favicons-->
    <link rel="icon" href="{{ asset('home_asset/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <!-- Favicons-->
    <link rel="apple-touch-icon-precomposed" href="{{ asset('home_asset/images/favicon/apple-touch-icon-152x152.png') }}">
    <!-- For iPhone -->
    <meta name="msapplication-TileColor" content="#00bcd4">
    <meta name="msapplication-TileImage" content="{{ asset('home_asset/images/favicon/mstile-144x144.png') }}">
    <!-- For Windows Phone -->


    <!-- CORE CSS-->    
    <link href="{{ asset('home_asset/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('home_asset/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ asset('home_asset/css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">


    <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
    <link href="{{ asset('home_asset/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('home_asset/js/plugins/jvectormap/jquery-jvectormap.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="{{ asset('home_asset/js/plugins/chartist-js/chartist.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">


</head>

<body>
    <!-- Start Page Loading -->
    <div id="loader-wrapper">
        <div id="loader"></div>        
        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>
    </div>
    <!-- End Page Loading -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START HEADER -->
    <header id="header" class="page-topbar">
        <!-- start header nav-->
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper"><a href="{{ URL::to('home') }}" class="brand-logo darken-1"><img src="{{ asset('home_asset/images/materialize-logo.png') }}" alt="neetgurumantra logo"></a> <span class="logo-text">Neetgurumantra</span></h1></li>
                    </ul>
                    <div class="header-search-wrapper hide-on-med-and-down">
                        <i class="mdi-action-search"></i>
                        <input type="text" name="Search" class="header-search-input z-depth-2" placeholder="Explore Materialize"/>
                    </div>
                    <ul class="right hide-on-med-and-down">
                        
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light toggle-fullscreen"><i class="mdi-action-settings-overscan"></i></a>
                        </li>
                        <li><a href="javascript:void(0);" class="waves-effect waves-block waves-light notification-button" data-activates="notifications-dropdown"><i class="mdi-social-notifications"><small class="notification-badge">5</small></i>
                        
                        </a>
                        </li>                        
                        
                    </ul>
                    <!-- translation-button -->
                    
                    <!-- notifications-dropdown -->
                    
                </div>
            </nav>
        </div>
        <!-- end header nav-->
    </header>
    <!-- END HEADER -->

    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START MAIN -->
    <div id="main">
        <!-- START WRAPPER -->
        <div class="wrapper">

            <!-- START LEFT SIDEBAR NAV-->
            <aside id="left-sidebar-nav">
                <ul id="slide-out" class="side-nav fixed leftside-navigation">
                <li class="user-details cyan darken-2">
                <div class="row">
                    <div class="col col s4 m4 l4">
                        <img src="{{ asset('home_asset/images/avatar.jpg') }}" alt="" class="circle responsive-img valign profile-image">
                    </div>
                    <div class="col col s8 m8 l8">
                        <ul id="profile-dropdown" class="dropdown-content">
                            <li><a href="#"><i class="mdi-action-face-unlock"></i> Profile</a>
                            </li>
                            <li><a href="#"><i class="mdi-action-settings"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{ URL::to('logout') }}"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                            </li>
                        </ul>
                        <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown">{{ \App\Users::userName() }}<i class="mdi-navigation-arrow-drop-down right"></i></a>
                    </div>
                </div>
                </li>
                <li class="bold active"><a href="{{ URL::to('home') }}" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i> Home</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-my-library-books"></i>Physics</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ URL::to('home/1/11') }}">11th </a>
                                    </li>
                                    <li><a href="{{ URL::to('home/1/12') }}">12th </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-my-library-books"></i>Chemistry</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ URL::to('home/2/11') }}">11th </a>
                                    </li>
                                    <li><a href="{{ URL::to('home/2/12') }}">12th </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-my-library-books"></i>Biology</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="{{ URL::to('home/3/11') }}">11th </a>
                                    </li>
                                    <li><a href="{{ URL::to('home/3/12') }}">12th </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-av-my-library-books"></i>Test Series</a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="#">NEET </a>
                                    </li>
                                    <li><a href="#">AIIMS </a>
                                    </li>
                                    <li><a href="#">EACMET </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold active"><a href="#" class="waves-effect waves-cyan"><i class="mdi-social-school"></i> Experts</a>
                </li>
                <li class="bold active"><a href="{{ URL::to('home/askadoubt') }}" class="waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Ask a DOUBT</a>
                </li>
                <li class="bold active"><a href="{{ URL::to('package/') }}" class="waves-effect waves-cyan"><i class="mdi-editor-attach-money"></i> Purchase</a>
                </li>
                
                
                
            </ul>
                <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
            </aside>
            <!-- END LEFT SIDEBAR NAV-->

            <!-- //////////////////////////////////////////////////////////////////////////// -->

@yield('content')

            <!-- //////////////////////////////////////////////////////////////////////////// -->
            
            <!-- LEFT RIGHT SIDEBAR NAV-->

        </div>
        <!-- END WRAPPER -->

    </div>
    <!-- END MAIN -->



    <!-- //////////////////////////////////////////////////////////////////////////// -->

    <!-- START FOOTER -->
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container">
                Copyright © 2017 <a class="grey-text text-lighten-4" href="#" target="_blank">Neetgurumantra</a> All rights reserved.
                <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="http://shubhambansal.me">Shubham Bansal</a></span>
            </div>
        </div>
    </footer>
    <!-- END FOOTER -->


    <!-- ================================================
    Scripts
    ================================================ -->
    
    <!-- jQuery Library -->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/jquery-1.11.2.min.js') }}"></script>    
    <!--materialize js-->
    <script type="text/javascript" src="{{ asset('home_asset/js/materialize.min.js') }}"></script>
    <!--scrollbar-->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    

    <!-- chartist -->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/chartist-js/chartist.min.js') }}"></script>   

    <!-- chartjs -->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/chartjs/chart.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/chartjs/chart-script.js') }}"></script>

    <!-- sparkline -->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/sparkline/jquery.sparkline.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/sparkline/sparkline-script.js') }}"></script>
    
    <!-- google map api -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAZnaZBXLqNBRXjd-82km_NO7GUItyKek"></script>

    <!--jvectormap-->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins/jvectormap/vectormap-script.js') }}"></script>
    
    <!--google map-->
    <!-- <script type="text/javascript" src="{{ asset('home_asset/js/plugins/google-map/google-map-script.js') }}"></script> -->

    
    <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins.min.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('home_asset/js/custom-script.js') }}"></script>
    <!-- Toast Notification -->
    @yield('script')
    <script type="text/javascript">

    // Toast Notification
    /*$(window).load(function() {
        setTimeout(function() {
            Materialize.toast('<span>Hiya! I am a toast.</span>', 1500);
        }, 1500);
        setTimeout(function() {
            Materialize.toast('<span>You can swipe me too!</span>', 3000);
        }, 5000);
        setTimeout(function() {
            Materialize.toast('<span>You have new order.</span><a class="btn-flat yellow-text" href="#">Read<a>', 3000);
        }, 15000);
    });*/
    </script>
</body>

</html>