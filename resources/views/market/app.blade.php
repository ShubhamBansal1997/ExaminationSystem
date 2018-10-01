<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Neetgurumantra-Market</title>

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
                <a class="navbar-brand" href="index.html">Neetgurumantra - Marketing</a>
            </div>
                        <form  role="form" method="get" action="{{ URL::to('marketing/logout') }}" >
              <button class="btn btn-success btn-lg">logout</button>
      </form>
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
                      
<!--                        
                   
                        <li>
                            <a href="{{ URL::to('marketing/couponconversion') }}"><i class="fa fa-tasks fa-fw"></i>  Coupons Conversion<span class="fa arrow"></span></a>

                            /.nav-second-level 
                        </li>
                        <li>
                            <a href="{{ URL::to('marketing/payouts') }}"><i class="fa fa-tasks fa-fw"></i>  Payouts<span class="fa arrow"></span></a>

                             /.nav-second-level 
                        </li> -->
                        <li>
                            <a href="{{ URL::to('marketing/profile') }}"><i class="fa fa-tasks fa-fw"></i>  Profile<span class="fa arrow"></span></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                       
                        <li>
                            <a href="{{ URL::to('marketing/coupons') }}"><i class="fa fa-tasks fa-fw"></i>Add/Generate Coupons<span class="fa arrow"></span></a>
                           
                        </li>
                        <li>
                            <a href="{{ URL::to('marketing/allcouponactivities') }}"><i class="fa fa-tasks fa-fw"></i> All coupon activities<span class="fa arrow"></span></a>
                           
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
function deleteques(ques_id,sub_id,std)
{
string = "{{ URL::to('admin/deleteques/')}}";
var href = string.concat("/",ques_id,'/',sub_id,'/',std);

//var link = document.createElement('button');
if(!confirm('Are you sure that you want to submit the form') ){
  event.preventDefault();
}
else
{

    window.location = href;

}

};
</script>

<!-- jQuery -->
<script src="{{ asset('admin_assets/vendor/jquery/jquery.min.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.0.1/jquery-confirm.min.js"></script>


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
@yield('script')
</body>

</html>
