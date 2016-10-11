<!DOCTYPE html>
<html class="" lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="admin-themes-lab">
  <meta name="author" content="themes-lab">
  <link rel="shortcut icon" href="{{ s32('img/favicon.png') }}" type="image/png">
  <title>Neetgurumantra</title>
  <link href="http://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet" type="text/css">
  <link href="{{ s32('css/style.css') }}" rel="stylesheet"> <!-- MANDATORY -->
  <link href="{{ s32('css/theme.css') }}" rel="stylesheet"> <!-- MANDATORY -->
  <link href="{{ s32('css/ui.css') }}" rel="stylesheet"> <!-- MANDATORY -->
  <link href="{{ s32('plugins/datatables/dataTables.min.css') }}" rel="stylesheet">
<link href="{{ s32('plugins/slider-pips/jquery-ui-slider-pips.css') }}" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>  
  <script src="{{URL::asset('templateEditor/ckeditor/ckeditor.js')}}"></script>
 
</head>
<!-- LAYOUT: Apply "submenu-hover" class to body element to have sidebar submenu show on mouse hover -->
<!-- LAYOUT: Apply "sidebar-collapsed" class to body element to have collapsed sidebar -->
<!-- LAYOUT: Apply "sidebar-top" class to body element to have sidebar on top of the page -->
<!-- LAYOUT: Apply "sidebar-hover" class to body element to show sidebar only when your mouse is on left / right corner -->
<!-- LAYOUT: Apply "submenu-hover" class to body element to show sidebar submenu on mouse hover -->
<!-- LAYOUT: Apply "fixed-sidebar" class to body to have fixed sidebar -->
<!-- LAYOUT: Apply "fixed-topbar" class to body to have fixed topbar -->
<!-- LAYOUT: Apply "rtl" class to body to put the sidebar on the right side -->
<!-- LAYOUT: Apply "boxed" class to body to have your page with 1200px max width -->
<!-- THEME STYLE: Apply "theme-sdtl" for Sidebar Dark / Topbar Light -->
<!-- THEME STYLE: Apply  "theme sdtd" for Sidebar Dark / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltd" for Sidebar Light / Topbar Dark -->
<!-- THEME STYLE: Apply "theme sltl" for Sidebar Light / Topbar Light -->
<!-- THEME COLOR: Apply "color-default" for dark color: #2B2E33 -->
<!-- THEME COLOR: Apply "color-primary" for primary color: #319DB5 -->
<!-- THEME COLOR: Apply "color-red" for red color: #C9625F -->
<!-- THEME COLOR: Apply "color-default" for green color: #18A689 -->
<!-- THEME COLOR: Apply "color-default" for orange color: #B66D39 -->
<!-- THEME COLOR: Apply "color-default" for purple color: #6E62B5 -->
<!-- THEME COLOR: Apply "color-default" for blue color: #4A89DC -->
<!-- BEGIN BODY -->
<body class="fixed-topbar theme-sdtl fixed-sidebar color-primary bg-darker">
  <section>
      <!-- BEGIN SIDEBAR -->
      <div class="sidebar">
        <div class="logopanel">
          <h1><a href="dashboard">&nbsp;</a></h1>
        </div>
        <div class="sidebar-inner">
          <div class="sidebar-top"></div>
          <div class="menu-title">
            <!--
             <span>Navigation</span> 
            <div class="pull-right menu-settings">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true" data-delay="300"> 
              <i class="icon-settings"></i>
              </a>
              <ul class="dropdown-menu">
                <li><a href="#" id="reorder-menu" class="reorder-menu">Reorder menu</a></li>
                <li><a href="#" id="remove-menu" class="remove-menu">Remove elements</a></li>
                <li><a href="#" id="hide-top-sidebar" class="hide-top-sidebar">Hide user &amp; search</a></li>
              </ul>
            </div>  -->
          </div>
          <ul class="nav nav-sidebar">
            <li class="tm nav-active"><a href="http://portal.neetgurumantra.com/user/dashboard"><i class="icon-home"></i><span>Home</span></a></li>
            <li class="tm nav-parent nav-active">
                <a href="#"><i class="icon-puzzle"></i><span>Add Questions</span> <span class="fa arrow"></span></a>
                <ul class="children collapse">
                   <li><a href="{{ URL::to('admin/addques/1/11') }}">Physics-11th</a></li>
                   <li><a href="{{ URL::to('admin/addques/1/12') }}">Physics-12th</a></li>
                   <li><a href="{{ URL::to('admin/addques/2/11') }}">Chemistry-11th</a></li>
                   <li><a href="{{ URL::to('admin/addques/2/12') }}">Chemistry-12th</a></li>
                   <li><a href="{{ URL::to('admin/addques/3/11') }}">Biology-11th</a></li>
                   <li><a href="{{ URL::to('admin/addques/3/12') }}">Biology-12th</a></li>
                </ul>
            </li>
            <li class="tm nav-parent nav-active">
              <a href="#"><i class="icon-puzzle"></i><span>View Questions</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                   <li><a href="{{ URL::to('admin/viewques/1/11') }}">Physics-11th</a></li>
                   <li><a href="{{ URL::to('admin/viewques/1/12') }}">Physics-12th</a></li>
                   <li><a href="{{ URL::to('admin/viewques/2/11') }}">Chemistry-11th</a></li>
                   <li><a href="{{ URL::to('admin/viewques/2/12') }}">Chemistry-12th</a></li>
                   <li><a href="{{ URL::to('admin/viewques/3/11') }}">Biology-11th</a></li>
                   <li><a href="{{ URL::to('admin/viewques/3/12') }}">Biology-12th</a>
                </ul>
            </li>
            <li class="tm nav-parent nav-active">
              <a href="#"><i class="icon-bulb"></i><span>Biology</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                   <li><a href="{{ URL::to('home/3/11') }}">11th</a></li>
                   <li><a href="{{ URL::to('home/3/12') }}">12th</a></li>
                </ul>
            </li>
            <li class="tm nav-parent nav-active">
              <a href="#"><i class="icon-screen-desktop"></i><span>Test Series</span> <span class="fa arrow"></span></a>
              <ul class="children collapse">
                <li><a href="#">NEET</a></li>
                <li><a href="#">AIIMS</a></li>
                <li><a href="#">EAMCET</a></li>
              </ul>
            </li>
            <li class="tm nav-active"><a href="http://portal.neetgurumantra.com/user/dashboard"><i class="icon-home"></i><span>Experts Team</span></a></li>
            <li class="tm nav-active"><a href="http://portal.neetgurumantra.com/user/dashboard"><i class="icon-home"></i><span>Ask a DOUBT</span></a></li>
            <li class="tm nav-active"><a href="http://portal.neetgurumantra.com/user/dashboard/Purchase"><i class="icon-home"></i><span>Purchase</span></a></li>
          </ul>
          <div class="sidebar-widgets">
          <p class="menu-title widget-title">Questions Attempted <span class="pull-right"><a href="#" class="hide-widget"> <i class="icons-office-52"></i></a></span></p>
          <div class="charts-sidebar progress-chart">
            <div class="sidebar-charts-inner">
              <div class="clearfix">
                <div class="sidebar-chart-title">Physics</div>
                <div class="sidebar-chart-number">82%</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-primary stat1" data-transitiongoal="82" aria-valuenow="82" style="width: 82%;"></div>
              </div>
            </div>
            <div class="sidebar-charts-inner">
              <div class="clearfix">
                <div class="sidebar-chart-title">Chemistry</div>
                <div class="sidebar-chart-number">43%</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-primary stat2" data-transitiongoal="43" aria-valuenow="43" style="width: 43%;"></div>
              </div>
            </div>
            <div class="sidebar-charts-inner">
              <div class="clearfix">
                <div class="sidebar-chart-title">Biology</div>
                <div class="sidebar-chart-number" id="number-visits">93%</div>
              </div>
              <div class="progress">
                <div class="progress-bar progress-bar-primary stat3" data-transitiongoal="93" aria-valuenow="93" style="width: 93%;"></div>
              </div>
            </div>
          </div>
</div>
          
          <div class="sidebar-footer clearfix" style="">
            
          </div>  
        </div>
      </div>
      <!-- END SIDEBAR -->
      <div class="main-content">
        <!-- BEGIN TOPBAR -->
        <div class="topbar">
          <div class="header-left">       <div class="topnav">
         <a class="menutoggle" href="#" data-toggle="sidebar-collapsed"><span class="menu__handle"><span>Menu</span></span></a>
         <!--
         <ul class="nav nav-icons">
           <li><span class="octicon octicon-cloud-upload"></span></li>
           <li><span class="octicon octicon-link"></span></li>
           <li><span class="octicon octicon-device-camera"></span></li>
           <li><span class="octicon octicon-comment-discussion"></span></li>
         </ul>  -->
       </div>
</div>
          <div class="header-right">
            <ul class="header-menu nav navbar-nav">
              <!-- END USER DROPDOWN -->
              <!-- BEGIN NOTIFICATION DROPDOWN -->
              
              <!-- END NOTIFICATION DROPDOWN -->
              <!-- BEGIN MESSAGES DROPDOWN -->
              
              <!-- END MESSAGES DROPDOWN -->
              <!-- BEGIN USER DROPDOWN -->
              <li class="dropdown" id="user-header">
                <a href="#" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                <img src="{{ s32('images/avatars/user1.png') }}" alt="user image">
                <span class="username">Hi, {{ \App\Admins::userName() }}</span>
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="#"><i class="icon-user"></i><span>My Profile</span></a>
                  </li>
                  <li>
                    <a href="#"><i class="icon-settings"></i><span>Account Settings</span></a>
                  </li>
                  <li>
                    <a href="{{ URL::to('admin/logout') }}"></i><span>Logout</span></a>
                  </li>
                </ul>
              </li>
              <!-- END USER DROPDOWN -->
              <!-- CHAT BAR ICON -->
              
            </ul>
          </div>
          <!-- header-right -->
        </div>
        <!-- END TOPBAR -->
          
        @yield('content')
        <div class="footer">
            <div class="copyright">
              <p class="pull-left sm-pull-reset">
                <span>Copyright <span class="copyright">©</span> 2015 </span>
                <span>NeetGurumantra</span>.
                <span>All rights reserved. </span>
              </p>
              <p class="pull-right sm-pull-reset">
                <span><a href="#" class="m-r-10">Support</a> | <a href="#" class="m-l-10 m-r-10">Terms of use</a> | <a href="#" class="m-l-10">Privacy Policy</a></span>
              </p>
            </div>
          </div>
        </div>
              <!-- END PAGE CONTENT -->
      </div>
      <!-- END MAIN CONTENT -->
    </section>

<!-- Preloader -->
<div class="loader-overlay">
  <div class="spinner">
    <div class="bounce1"></div>
    <div class="bounce2"></div>
    <div class="bounce3"></div>
  </div>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up"></i></a>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/summernote/0.7.0/summernote.js"></script>
<script type="text/javascript">  
     CKEDITOR.replace( 'editor' );  
</script>
<script type="text/javascript">  
     CKEDITOR.replace( 'editor1' );  
</script>
<script type="text/javascript">  
     CKEDITOR.replace( 'editor2' );  
</script>
<script type="text/javascript">  
     CKEDITOR.replace( 'editor3' );  
</script>
<script type="text/javascript">  
     CKEDITOR.replace( 'editor4' );  
</script>
<script type="text/javascript">  
     CKEDITOR.replace( 'editor5' );  
</script>  
<script>
$(document).ready(function() {
var IMAGE_PATH = 'http://localhost:8000/images/thread/';

$.ajaxSetup({
    headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content')     }
});
$('#message').summernote({
    height: 400,
    onImageUpload: function(files) {
        data = new FormData();
        data.append("image", files[0]);
        $.ajax({
            data: data,
            type: "POST",
            url: "admin/image/upload",
            cache: false,
            contentType: false,
            processData: false,
            success: function(filename) {
                var file_path = IMAGE_PATH + filename;
                console.log(file_path);
                $('#message').summernote("insertImage", file_path);
            }
        });
    }
});

});
   
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="{{ s32('plugins/jquery/jquery-1.11.1.min.js') }}"></script>
<script src="{{ s32('plugins/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
<script src="{{ s32('plugins/gsap/main-gsap.min.js') }}"></script> <!-- HTML Animations -->
<script src="{{ s32('plugins/jquery-ui/jquery-ui-1.11.2.min.js') }}"></script>
<script src="{{ s32('plugins/jquery-block-ui/jquery.blockUI.min.js') }}"></script> <!-- simulate synchronous behavior when using AJAX -->
<script src="{{ s32('plugins/translate/jqueryTranslator.min.js') }}"></script> <!-- Translate Plugin with JSON data -->
<script src="{{ s32('plugins/bootbox/bootbox.min.js') }}"></script>
<script src="{{ s32('plugins/mcustom-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script> <!-- Custom Scrollbar sidebar -->
<script src="{{ s32('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ s32('plugins/bootstrap-dropdown/bootstrap-hover-dropdown.min.js') }}"></script> <!-- Show Dropdown on Mouseover -->
<script src="{{ s32('plugins/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script> <!-- Animated Progress Bar -->
<script src="{{ s32('plugins/switchery/switchery.min.js') }}"></script> <!-- IOS Switch -->
<script src="{{ s32('plugins/charts-sparkline/sparkline.min.js') }}"></script> <!-- Charts Sparkline -->
<script src="{{ s32('plugins/retina/retina.min.js') }}"></script>  <!-- Retina Display -->
<script src="{{ s32('plugins/jquery-cookies/jquery.cookies.js') }}"></script> <!-- Jquery Cookies, for theme -->
<script src="{{ s32('plugins/bootstrap/js/jasny-bootstrap.min.js') }}"></script> <!-- File Upload and Input Masks -->
<script src="{{ s32('plugins/select2/select2.min.js') }}"></script> <!-- Select Inputs -->
<script src="{{ s32('plugins/bootstrap-tags-input/bootstrap-tagsinput.min.js') }}"></script> <!-- Select Inputs -->
<script src="{{ s32('plugins/bootstrap-loading/lada.min.js') }}"></script> <!-- Buttons Loading State -->
<script src="{{ s32('plugins/timepicker/jquery-ui-timepicker-addon.min.js') }}"></script> <!-- Time Picker -->
<script src="{{ s32('plugins/multidatepicker/multidatespicker.min.js') }}"></script> <!-- Multi dates Picker -->
<script src="{{ s32('plugins/colorpicker/spectrum.min.js') }}"></script> <!-- Color Picker -->
<script src="{{ s32('plugins/touchspin/jquery.bootstrap-touchspin.min.js') }}"></script> <!-- A mobile and touch friendly input spinner component for Bootstrap -->
<script src="{{ s32('plugins/autosize/autosize.min.js') }}"></script> <!-- Textarea autoresize -->
<script src="{{ s32('plugins/icheck/icheck.min.js') }}"></script> <!-- Icheck -->
<script src="{{ s32('plugins/bootstrap-editable/js/bootstrap-editable.min.js') }}"></script> <!-- Inline Edition X-editable -->
<script src="{{ s32('plugins/bootstrap-context-menu/bootstrap-contextmenu.min.js') }}"></script> <!-- File Upload and Input Masks -->
<script src="{{ s32('plugins/prettify/prettify.min.js') }}"></script> <!-- Show html code -->
<script src="{{ s32('plugins/slick/slick.min.js') }}"></script> <!-- Slider -->
<script src="{{ s32('plugins/countup/countUp.min.js') }}"></script> <!-- Animated Counter Number -->
<script src="{{ s32('plugins/noty/jquery.noty.packaged.min.js') }}"></script>  <!-- Notifications -->
<script src="{{ s32('plugins/backstretch/backstretch.min.js') }}"></script> <!-- Background Image -->
<script src="{{ s32('plugins/charts-chartjs/Chart.min.js') }}"></script>  <!-- ChartJS Chart -->
<script src="{{ s32('plugins/bootstrap-slider/bootstrap-slider.js') }}"></script> <!-- Bootstrap Input Slider -->
<script src="{{ s32('plugins/visible/jquery.visible.min.js') }}"></script> <!-- Visible in Viewport -->
<script src="{{ s32('js/builder.js') }}"></script>
<script src="{{ s32('js/sidebar_hover.js') }}"></script>
<script src="{{ s32('js/application.js') }}"></script> <!-- Main Application Script -->
<script src="{{ s32('js/plugins.js') }}"></script> <!-- Main Plugin Initialization Script -->
<script src="{{ s32('js/widgets/notes.js') }}"></script>
<script src="{{ s32('js/quickview.js') }}"></script> <!-- Quickview Script -->
<script src="{{ s32('js/pages/search.js') }}"></script> <!-- Search Script -->
<!-- BEGIN PAGE SCRIPTS -->
<script src="{{ s32('plugins/datatables/jquery.dataTables.min.js') }}"></script> <!-- Tables Filtering, Sorting & Editing -->
<script src="{{ s32('plugins/summernote/summernote.js') }}"></script>
<script src="{{ s32('plugins/skycons/skycons.js') }}"></script>
<script src="{{ s32('plugins/simple-weather/jquery.simpleWeather.min.js') }}"></script>
<script src="{{ s32('js/widgets/widget_weather.js') }}"></script>
<script src="{{ s32('js/widgets/todo_list.js') }}"></script>
<script src="{{ s32('plugins/slider-pips/jquery-ui-slider-pips.min.js') }}"></script>
<script src="{{ s32('plugins/saveas/saveAs.js') }}"></script>
<script src="{{ s32('js/builder_page.js') }}"></script>
<!-- END PAGE SCRIPTS -->
</body>
</html>