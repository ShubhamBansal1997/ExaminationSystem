<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Wishbells-Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('admin_assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <!-- MetisMenu CSS -->
    <link href="{{ asset('admin_assets/vendor/metisMenu/metisMenu.min.css') }}" rel="stylesheet">


    <!-- Morris Charts CSS -->
    <link href="{{ asset('admin_assets/vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('admin_assets/dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('admin_assets/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <script src="{{URL::asset('templateEditor/ckeditor/ckeditor.js')}}"></script>
 <script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Neetgurumantra - Admin</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <!-- <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider"></li>
                        <li><a href="{{ URL::to('/admin/logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="{{ URL::to('/admin/dashboard') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i>  Add Questions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/addques/1/11') }}">Physics-11th</a></li>
                               <li><a href="{{ URL::to('admin/addques/1/12') }}">Physics-12th</a></li>
                               <li><a href="{{ URL::to('admin/addques/2/11') }}">Chemistry-11th</a></li>
                               <li><a href="{{ URL::to('admin/addques/2/12') }}">Chemistry-12th</a></li>
                               <li><a href="{{ URL::to('admin/addques/3/11') }}">Biology-11th</a></li>
                               <li><a href="{{ URL::to('admin/addques/3/12') }}">Biology-12th</a></li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-tasks fa-fw"></i>  View Questions<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/viewques/1/11') }}">Physics-11th</a></li>
                               <li><a href="{{ URL::to('admin/viewques/1/12') }}">Physics-12th</a></li>
                               <li><a href="{{ URL::to('admin/viewques/2/11') }}">Chemistry-11th</a></li>
                               <li><a href="{{ URL::to('admin/viewques/2/12') }}">Chemistry-12th</a></li>
                               <li><a href="{{ URL::to('admin/viewques/3/11') }}">Biology-11th</a></li>
                               <li><a href="{{ URL::to('admin/viewques/3/12') }}">Biology-12th</a>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                        @if(Session::get('a_status')=='1')
                        <li>
                            <a href="{{ URL::to('admin/view_users') }}"><i class="fa fa-wrench fa-fw"></i> Users<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i> Add Employees<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/content') }}">Content</a></li>
                                <li><a href="{{ URL::to('admin/marketers') }}">Marketers</a></li>
                                
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        @endif
                       <!--  <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Location<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">State</a>
                                </li>
                                <li>
                                    <a href="#">City</a>
                                </li>
                                <li>
                                    <a href="#">Area</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        <!-- </li> --> 
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Order <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a class="active" href="{{ URL::to('admin/dashboard/orders')}}">All</a>
                                </li>
                                <li>
                                    <a class="active" href="{{ URL::to('admin/dashboard/orders')}}/month">This Month</a>
                                </li>
                                <li>
                                    <a class="active" href="{{ URL::to('admin/dashboard/orders')}}/today">Today</a>
                                </li>
                                <li>
                                    <a class="active" href="{{ URL::to('admin/dashboard/orders')}}/tomorrow">Tomorrow</a>
                                </li>
                                <li>
                                    <a class="active" href="{{ URL::to('admin/dashboard/orders')}}/thenextday">Next Day</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
@yield('content')
	</div>
<script>
function confirm(){
    confirm("Press a button!");
};
</script>

<!-- jQuery -->
<script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="{{ asset('admin_assets/vendor/metisMenu/metisMenu.min.js') }}"></script>


<!-- Morris Charts JavaScript -->
<script src="{{ asset('admin_assets/vendor/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/morrisjs/morris.min.js') }}"></script>
<script src="{{ asset('admin_assets/data/morris-data.js') }}"></script>

<!-- DataTables JavaScript -->
<script src="{{asset('admin_assets/vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('admin_assets/vendor/datatables-responsive/dataTables.responsive.js') }}"></script>
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

 <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>

<!-- Custom Theme JavaScript -->
<script src="{{ asset('admin_assets/dist/js/sb-admin-2.js') }}"></script>

</body>

</html>