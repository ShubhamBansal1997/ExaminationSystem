@extends('admin.app')
@section('content')
<div id="loading"></div>
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Coupons</h1>

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
                            <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Add coupon
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Add Coupon</h4>
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
                                        <form method="POST" id="addcouponform" >
                                            {{ csrf_field() }}
                                            <input type="hidden" name="admin_email" value="{{ Session::get('aemail')}}" >
                                            <div class="form-group">
                                                <label>Coupon Name</label>
                                                <input class="form-control" name="coupon_name">
                                            </div>
                                            <div class="form-group">
                                                 <label>Coupon Percentage</label>
                                                 <input class="form-control" name="coupon_percent">
                                            </div>
                                            <div class="form-group">
                                                <label>Coupon Number</label>
                                                <input class="form-control" name="coupon_number">
                                            </div>
                                            <div class="form-group">
                                              <label>Coupon Sale Type</label>
                                              <select name="coupon_type" class="form-control">
                                                <option value="PACKAGE">PACKAGE</option>
                                                <option value="EXPERT">GUIDANCE SESSION</option>
                                              </select>
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
                            <!-- error modal -->
                            <div class="modal fade" id="errormodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Error in your Input</h4>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- error modal -->
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
                                        <th>Coupon Name</th>
                                        <th>Discount</th>
                                        <th>Type</th>
                                        <th>Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                     @foreach(\App\Coupons::where('admin_email',$email)->where('coupon_delete',FALSE)->orderBy('created_at', 'DESC')->get() as $i => $coupon)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i }}</td>
                                      <td>{{ $coupon->coupon_name }}</td>
                                      <td>{{ $coupon->coupon_percent }}%</td>
                                      <td>{{ $coupon->coupon_type }}</td>
                                      <td>{{ $coupon->coupon_number }}</td>
                                      <td>
                                      @if($coupon->coupon_active==1)
                                      <button id="activeinactivestatus" data-id="{{ $coupon->id }}" class="btn btn-xs btn-success">ACTIVE</button>
                                      @else
                                      <button id="activeinactivestatus" data-id="{{ $coupon->id }}" class="btn btn-xs btn-danger">INACTIVE</button>
                                      @endif
                                      </td>
                                      <td>
                                      <button data-id="{{ $coupon->id }}" id="deletecoupon" class="btn btn-xs btn-danger">DELETE</button>
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

    $("#addcouponform").submit(function(e){
      e.preventDefault();


      //$('#spinner').show();
      var data = $(this).serialize();
      $.ajax({
        url: '{{ URL::to('marketing/addcoupon') }}',
        data: data,
        type: "POST",
        context: this,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        },
        success: function(response){
          location.reload();
        },
        error: function(response){
          $('#errormodal').modal('toggle');
        },

      });
    });

      $('#dataTables-example').on('click','#deletecoupon',function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var parent = $(this).parent();
        $.ajax({
          url: '{{ URL::to('marketing/deletecoupon') }}'+'/'+id,
          data: null,
          type: "GET",
          context: this,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
          },
          success: function(response){
            parent.slideUp(300, function () {
              parent.closest("tr").remove();
            });
          },
          error: function(response){
            $('#errormodal').modal('toggle');
          },

        });
      });

      $('#dataTables-example').on('click','#activeinactivestatus',function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var classname = $(this).attr("class");
        $.ajax({
          url: '{{ URL::to('marketing/couponstatus') }}'+'/'+id,
          data: null,
          type: "GET",
          context: this,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
          },
          success: function(response){
            if(classname ==='btn btn-xm success'){
              $(this).removeClass("btn btn-xs btn-success").addClass("btn btn-xs btn-danger").text("INACTIVE");
            }
            else
            {
              $(this).removeClass("btn btn-xs btn-danger").addClass("btn btn-xs btn-success").text("ACTIVE");
            }
          },
          error: function(response){
            $('#errormodal').modal('toggle');
          },

        });
      });


  });
</script>
@endsection

