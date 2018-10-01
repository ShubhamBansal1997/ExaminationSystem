@extends('market.app')
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
                            <div class="col-lg-4">
                                <b>Maximum Discount Expert:</b>{{ isset($user->max_discount_expert)?$user->max_discount_expert:null }}</br>
                                <b>Maximum Discount Pakcage:</b>{{ isset($user->max_discount_package)?$user->max_discount_package:null }}
                                <br/>
                                <button class="btn btn-xs btn-success" id="requestpayout">Request Payout</button>
                              </div>
                             <h4>Tax Percentage:
                                  2%
                                </h4>
                              <div class="col-lg-4">
                                <h4>Total Amount Remaining:
                                Rs.{{ \App\Coupon_Activity::where('admin_email',$user->email)->where('activity_status','UNPAID')->sum('admin_share') }}
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
                                        <th>Bank Details</th>
                                        <th>Phone no</th>
                                        <th>Method</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                     @foreach($payouts as $i => $payout)
                                    <tr  class="odd gradeX">
                                      <td>{{ ++$i }}</td>
                                      <td>IFSC CODE:{{ $payout->bank_ifsc_code }}
                                          Acc. No: {{ $payout->bank_acc_no }}</td>
                                      <td>{{ $payout->phoneno }}</td>
                                      <td>{{ $payout->type }}</td>
                                      <td>{{ $payout->created_at }}</td>
                                      <td>
                                        @if($payout->active=='true')
                                        <button class="btn btn-xs btn-danger">UNPAID</button>
                                        @else
                                        <button class="btn btn-xs btn-success">PAID</button>
                                        @endif
                                      </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                            <!-- Payout Modal -->
                            <div class="modal fade" id="payoutmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Payout </h4>
                                        </div>
                                        <form role="form" id="payoutform" method="POST">
                                        <div class="modal-body">
                                            <div class="panel-body">
                                              <div class="row">
                                                <div class="col-lg-12">

                                                    <div class="form-group">
                                                      <input type="hidden" name="id" value="{{ $user->id }}">
                                                      <label>Name:</label>
                                                      <input class="form-control" name='name' value="{{ $user->fname }} {{ $user->lname }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Amount</label>
                                                      <input class="form-control" name='amount' value="{{ \App\Coupon_Activity::where('admin_email',$user->email)->where('activity_status','UNPAID')->sum('admin_share') * 0.98 }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Method</label>
                                                      <select class="form-control" data-style="white" data-placeholder="Choose the Payment Method" name="method" value="" required>
                                                        <option value="paytm">Paytm</option>
                                                        <option value="bank">Bank</option>
                                                      </select>
                                                    </div>
                                                  </div>
                                              </div>
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
                            <!-- /.Payout modal -->
                            <!-- Success Modal -->
                            <div class="modal fade" id="succesmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Payout Request Sent Successfully!!!</h4>
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
                            <!-- /.Success modal -->
                            <!-- Failure Modal -->
                            <div class="modal fade" id="failuremodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">There is some server issue</h4>
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
                            <!-- /.Failure modal -->
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
      $("button#requestpayout").click(function(e){
        e.preventDefault();
        $('#payoutmodal').modal('toggle');
      });

      $("form#payoutform").submit(function(e){
        e.preventDefault();
        var data = $(this).serialize();
        $.ajax({
          url: '{{ URL::to('marketing/requestpayout') }}',
          data: data,
          type: "POST",
          context: this,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
          },
          success: function(response){
            $("#succesmodal").modal('toggle');
          },
          error: function(response){
            $("failuremodal").modal('toogle');
          }
        });
      });

  });
</script>
@endsection


