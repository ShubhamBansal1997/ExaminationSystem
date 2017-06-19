@extends('market.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Coupon Conversions</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="panel-body">

                            <div class="row">
                              <div class="col-lg-4">
                                <b>Maximum Discount Expert:</b>{{ isset($user->max_discount_expert)?$user->max_discount_expert:null }}</br>
                                <b>Maximum Discount Pakcage:</b>{{ isset($user->max_discount_package)?$user->max_discount_package:null }}
                              </div>
                              <div class="col-lg-4">
                                <h4>Total Amount Remaining:
                                Rs.{{ \App\Coupon_Activity::where('admin_email',$user->email)->where('activity_status','UNPAID')->sum('admin_share') }}
                                </h4>
                                <h4>Tax Percentage:
                                  2%
                                </h4>
                                <h4>Amount at Payout:
                                Rs.{{ \App\Coupon_Activity::where('admin_email',$user->email)->where('activity_status','UNPAID')->sum('admin_share') * 0.98 }}
                                </h4>

                              </div>
                              <div class="col-lg-4">
                              <h4>Total Earning:

                                  Rs. {{ \App\Coupon_Activity::where('admin_email',$user->email)->sum('admin_share') }}

                                  </h4>
                              </div>
                            </div>
                            <!-- Coupon Error Modal -->
                            <div class="modal fade" id="errormodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">There is some error with your input or it's a server conflict!!!!!!!</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- Success Modal -->
                            <div class="modal fade" id="successmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Your Request Processed Successfully</h4>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
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


                                     @foreach(\App\Coupon_Activity::where('admin_email',$user->email)->where('active',1)->orderBy('created_at', 'DESC')->get() as $i => $coupon_act)
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

@section('script')

@endsection
