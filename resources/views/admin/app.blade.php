<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Neetgurumantra-Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
 <li>
<a><i class="fa fa-wrench fa-fw"></i>Add Question In Test Series<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/addneetseries') }}">NEET Test Series</a></li>
                                <li><a href="{{ URL::to('admin/addaiimsseries') }}">AIIMS Test Series</a></li>
                                <li><a href="{{ URL::to('admin/addeamcetseries') }}">EAMCET Test Series</a></li>
                              
                            </ul>  


</li>
<li>
<a><i class="fa fa-wrench fa-fw"></i>View Question Of Test Series<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/view_ques_test/1') }}">NEET Test Series</a></li>
                                <li><a href="{{ URL::to('admin/view_ques_test/2') }}">AIIMS Test Series</a></li>
                                <li><a href="{{ URL::to('admin/view_ques_test/3') }}">EAMCET Test Series</a></li>
                              
                            </ul>  


</li>

                       
<li>
<a><i class="fa fa-wrench fa-fw"></i>Define Test Series<span class="fa arrow"></span></a>
<ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/Defineneet') }}">NEET Test Series</a></li>
                                <li><a href="{{ URL::to('admin/Defineaiims') }}">AIIMS Test Series</a></li>
                                <li><a href="{{ URL::to('admin/Defineeamcet') }}">EAMCET Test Series</a></li>
                              
                            </ul>  


</li>
                        @if(Session::get('a_status')=='1')
                        <li>
                            <a href="{{ URL::to('admin/view_users') }}"><i class="fa fa-wrench fa-fw"></i> Users<span class="fa arrow"></span></a>

                            <!-- /.nav-second-level -->
                        </li>
                         <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Marketers<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/marketers') }}">Add Marketer</a></li>
                                <li><a href="{{ URL::to('admin/marketingpayouts') }}">Marketing Payouts</a></li>

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-wrench fa-fw"></i>Content Writer<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="{{ URL::to('admin/content') }}">Add Content Writer</a></li>
                               

                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                          <a href="{{ URL::to('admin/list_leads') }}"><i class="fa fa-wrench fa-fw"></i>Leads<span class="fa arrow"></span></a>
                        </li>

                       <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Experts<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{ URL::to('admin/addexpert') }}">Add Expert</a>
                                </li>
                                <li>
                                    <a href="{{ URL::to('admin/expertpayouts')}}">Expert Payouts</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/coupons') }}"><i class="fa fa-files-o fa-fw"></i> Coupons <span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/couponactivity') }}"><i class="fa fa-files-o fa-fw"></i> Coupons Activity<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/payouts') }}"><i class="fa fa-files-o fa-fw"></i> Payouts<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/allcoupons') }}"><i class="fa fa-files-o fa-fw"></i> All Coupons <span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/allcouponactivity') }}"><i class="fa fa-files-o fa-fw"></i> All Coupons Activity<span class="fa arrow"></span></a>
                        </li>
                        <li>
                            <a href="{{ URL::to('admin/allpayouts') }}"><i class="fa fa-files-o fa-fw"></i> All Payouts(Marketing)<span class="fa arrow"></span></a>
                        </li>
                         <li>
                            <a href="{{ URL::to('admin/allerror') }}"><i class="fa fa-files-o fa-fw"></i>Errors reported<span class="fa arrow"></span></a>
                        </li>

                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
@yield('content')
	</div>
@yield('modal')


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
