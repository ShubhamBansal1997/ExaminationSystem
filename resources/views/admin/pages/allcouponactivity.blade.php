@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All COUPON ACTIVITY</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">

                        <div class="panel-body">
                            <div class="col-lg-4">
                              <h2>Total Coupons Generated:{{ \App\Coupons::count() }}</h2>
                            </div>
                            <div class="col-lg-4">
                              <h2>Total Coupons Redmeed: {{ \App\Coupon_Activity::count() }}</h2>
                            </div>
                        </div>
                        </div>
                        <div class="panel-body">
                            <div id="no-more-tables" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Coupon Name</th>
                                        <th>Amount</th>
                                        <th>Discount</th>
                                        <th>Benefit</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>


                                     @foreach(\App\Coupon_Activity::where('active',1)->orderBy('created_at', 'DESC')->get() as $i => $coupon_act)
                                    <tr  class="odd gradeX">
                                      <td>{{ ++$i }}</td>
                                      <td>{{ $coupon_act->user_name }}</td>
                                      <td>{{ $coupon_act->user_email }}%</td>
                                      <td>{{ $coupon_act->created_at }}</td>
                                      <td>{{ $coupon_act->coupon_type }}</td>
                                      <td>{{ $coupon_act->coupon_name }}</td>
                                      <td>Rs.{{ $coupon_act->price }}</td>
                                      <td>{{ $coupon_act->coupon_percent }} %</td>
                                      <td>Rs.{{ $coupon_act->admin_share }} </td>
                                      <td>
                                      @if($coupon_act->activity_status=='PAID')
                                        <button class="btn btn-xs btn-success">PAID</button>
                                      @elseif($coupon_act->activity_status=='UNPAID')
                                        <button class="btn btn-xs btn-danger">UNPAID</button>
                                      @endif
                                      </td>
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

