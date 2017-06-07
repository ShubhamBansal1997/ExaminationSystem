@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">COUPON ACTIVITY</h1>

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
                            <button class="btn btn-primary btn-sm" id="requestpayout">
                                Request Pay out
                            </button>
                            </div>
                            <!-- Payout Modal -->
                            <div class="modal fade" id="payoutmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Request Payout</h4>
                                        </div>
                                        <div class="modal-body">
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" id="payoutrequestform" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="admin_email" value="{{ Session::get('aemail')}}" >
                                            <div class="form-group">
                                                <label>Payout Method</label>
                                                <select name="payout_method" class="form-control">
                                                  <option value="PAYTM">Paytm</option>
                                                  <option value="ACCOUNT">Account</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                 <label>Amount</label>
                                                 <input class="form-control" name="payout_amount" value="{{ \App\Coupon_Activity::where('admin_email',$email)->where('activity_status','UNPAID')->sum('admin_share') * 0.98 }}" disabled>
                                                 >
                                            </div>
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
                            <!-- payouterromodal Modal -->
                            <div class="modal fade" id="payouterromodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">You Must have a Minimum Payout Amount of Rs.200</h4>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- accept modal -->
                            <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Your payout request has been accepted</h4>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <!-- accept modal -->
                            <div class="modal fade" id="accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">There is some server issue</h4>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                            <div class="col-lg-4">
                                <h4>Total Amount Remaining:
                                Rs.{{ \App\Coupon_Activity::where('admin_email',$email)->where('activity_status','UNPAID')->sum('admin_share') }}
                                </h4>
                                <h4>Tax Percentage:
                                  2%
                                </h4>
                                <h4>Amount at Payout:
                                Rs.{{ \App\Coupon_Activity::where('admin_email',$email)->where('activity_status','UNPAID')->sum('admin_share') * 0.98 }}
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


                                     @foreach(\App\Coupon_Activity::where('admin_email',$email)->where('active',1)->orderBy('created_at', 'DESC')->get() as $i => $coupon_act)
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
  <script type="text/javascript">
    $(document).ready(function(){
      $('button#requestpayout').click(function(e){
        if({{ \App\Coupon_Activity::where('admin_email',$email)->where('activity_status','UNPAID')->sum('admin_share') * 0.98 }}>200)
          $('#payoutmodal').modal('toggle');
        else
          $('#payouterromodal').modal('toggle');
      });

      $('#payoutrequestform').submit(function(e){
        e.preventDefault();
        data = $(this).serialize();
        $.ajax({
          url: '{{ URL::to('marketing/requestpayout') }}';,
          data: data,
          type: "POST",
          context: this,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
          },
          success: function(response){
            $('#accept').modal('toggle');
          },
          error: function(response){
            $('#notaccept').modal('toggle');
          },
        });
      });

    });
  </script>
@endsection
