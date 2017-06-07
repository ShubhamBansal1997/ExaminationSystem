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
                              <div class="col-lg-3">
                                <b>Maximum Discount:</b>{{ isset($user->max_discount)?$user->max_discount:null }}
                              </div>
                              <div class="col-lg-3">
                                <b>Comission:</b>{{ isset($user->comission)?$user->comission:null }}
                              </div>
                              <div class="col-lg-3">
                                <b>Unpaid: </b>{{ isset($user->unpaid)?$user->unpaid:null }}
                              </div>
                              <div class="col-lg-3">
                                <b>Total: </b>{{ isset($user->total)?$user->total:null }}
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
                                        <th>CouponName(%)</th>
                                        <th>Amount</th>
                                        <th>Benefit</th>
                                        <th>Payout Amount(after Tax Deduction)</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>


                                     @foreach($coupons as $i => $coupon)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i }}</td>
                                      <td>{{ $coupon->coupon_name }}</td>
                                      <td>{{ $coupon->coupon_percent }}</td>
                                      <td>{{ $coupon->coupon_number }}</td>
                                      <td>
                                      @if($coupon->coupon_active==true)
                                        <button id="activeinactivestatus" data-id="{{ $coupon->id }}" class="btn btn-xs btn-success">Active</button>
                                      @else
                                        <button id="activeinactivestatus" data-id="{{ $coupon->id }}" class="btn btn-xs btn-danger">Inactive</button>
                                      @endif
                                      </td>
                                      <td>
                                        <button id="deletecoupon" data-id="{{ $coupon->id }}" class="btn btn-xs btn-danger">Delete</button>
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
