@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Payout History</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="panel-body">
                            <!-- Button trigger modal -->
                            <div class="col-lg-4">
                                <h4>Total Payouts: 
                                {{ \App\Transaction::where('admin_email',$email)->count() }}
                                </h4>
                            </div>
                            <!-- Modal -->
                            <div class="col-lg-4">
                                <h4>Total Amount Remaining: 
                                @foreach(\App\Admins::where('email',$email)->get() as $admin)
                                Rs.{{ $admin->amount }}
                                @endforeach
                                </h4>
                            </div>
                            <div class="col-lg-4">
                            <h4>Total Earning: 
                                
                                Rs. {{ \App\Coupon_Activity::where('admin_email',$email)->sum('admin_share') }}
                                
                                </h4>
                            </div>
                            <!-- /.modal -->
                        </div>
                            <p>
                            @if(Session::has('flash_message'))
                            <div class="alert alert-success fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_message') }}

                            </div>
                            @endif
                          </p>
                            <!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Orders
                            </button> -->

                            <!-- Modal -->
                            
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-heading -->
                        <!-- 'order_id','cust_name', 'cust_add', 'cust_pincode','cust_state','cust_city','user_id','del_date','complete_price','is_completed' -->

                        <div class="panel-body">
                            <div id="no-more-tables" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Trn Id</th>
                                        <th>Amount</th>
                                        <th>Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               

                                     @foreach(\App\Transaction::where('admin_email',$email)->where('initiate',TRUE)->orderBy('created_at', 'DESC')->get() as $i => $tr)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i }}</td>
                                      <td>{{ $tr->tr_id }}</td>
                                      <td>Rs.{{ $tr->amount }}%</td>
                                      <td>{{ $tr->method }}</td>
                                      <td></td>
                                    </tr>
                                    @endforeach

                                                                                      
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                                    
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection
