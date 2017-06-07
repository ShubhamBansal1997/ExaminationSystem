@extends('market.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Tables</h1>

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
                                <button class="btn btn-primary btn-lg" id="addcoupon">
                                Add coupon
                                </button>
                                <br/>
                                <b>Maximum Discount:</b>{{ isset($user->max_discount)?$user->max_discount:null }}
                              </div>
                              <div class="col-lg-3">
                                <button class="btn btn-primary btn-lg" id="editprofile">
                                Update Profile
                                </button>
                                <br/>
                                <b>Comission:</b>{{ isset($user->comission)?$user->comission:null }}
                              </div>
                              <div class="col-lg-3">
                                <b>Unpaid: </b>{{ isset($user->unpaid)?$user->unpaid:null }}
                              </div>
                              <div class="col-lg-3">
                                <b>Total: </b>{{ isset($user->total)?$user->total:null }}
                              </div>
                            </div>
                            <!-- Add Coupon Modal -->
                            <div class="modal fade" id="addcouponmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
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
                                        <form method="post" id="addcouponform">
                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="form-group">
                                                <label>Coupon Name</label>
                                                <input class="form-control" name="coupon_name" required>
                                            </div>
                                            <div class="form-group">
                                                 <label id="maximum_discount"></label>
                                                 <input class="form-control" name="coupon_discount">

                                            </div>
                                            <div class="form-group">
                                                <label>Coupon Number</label>
                                                <input class="form-control" name="coupon_number">
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
                            <!-- Edit Profile Modal -->
                            <div class="modal fade" id="editprofilemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Edit Profile</h4>
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
                                        <form method="post" id="editprofileform">

                                            {{ csrf_field() }}
                                            <input type="hidden" name="id" value="{{ $user->id }}">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input class="form-control" name="fname" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input class="form-control" name="lname" required>
                                            </div>
                                            <div class="form-group">
                                              <label>Email</label>
                                              <input class="form-control" name="email" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Aadhaar Card No.</label>
                                                <input class="form-control" name="id_proof" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank Account Number</label>
                                                <input class="form-control" name="bank_acc_no" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Bank IFSC Code</label>
                                                <input class="form-control" name="bank_ifsc_code" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input class="form-control" name="phoneno" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <input class="form-control" name="description" required>
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
                                        <th>Coupon Name</th>
                                        <th>Discount</th>
                                        <th>Number</th>
                                        <th>Active</th>
                                        <th>Action</th>
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
<script type="text/javascript">
  $(document).ready(function(){
    $('#addcoupon').click(function(e){
      var value = 'Maximum Discount allowed ' + '{{ $user->max_discount }}'  + ':';

      $('#maximum_discount').text(value);
      $('#addcouponmodal').modal('toggle');
    });

    $('#addcouponform').submit(function(e){
      e.preventDefault();
      var discount = $('#addcouponform input[name=coupon_discount]').val();
      if(discount > {{ $user->max_discount }} ){
        $('#errormodal').modal('toggle');
      }
      //console.log(response);
      var data = $(this).serialize();
      console.log(data);
      console.log(data);
      $.ajax({
        url: '{{ URL::to('marketing/addcoupon')}}',
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

    /** show the edit profile form */
    $('#editprofile').click(function(e){
      e.preventDefault();
      $.ajax({
        url: '{{ URL::to('marketing/getmarketuser')}}'+'/'+{{ $user->id }},
        data: null,
        type: "GET",
        context: this,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        },
        success: function(response){

          $('#editprofileform input[name=fname]').val(response['fname']);
          //$('$editprofileform input[name=lname]').val(response['lname']);
          $('#editprofileform input[name=max_discount]').val(response['max_discount']);
          $('#editprofileform input[name=lname]').val(response['lname']);
          $('#editprofileform input[name=email]').val(response['email']);
          $('#editprofileform input[name=id_proof]').val(response['id_proof']);
          $('#editprofileform input[name=bank_acc_no]').val(response['bank_acc_no']);
          $('#editprofileform input[name=bank_ifsc_code]').val(response['bank_ifsc_code']);
          $('#editprofileform input[name=phoneno]').val(response['phoneno']);
          $('#editprofileform input[name=descrption]').val(response['descrption']);
          $('#editprofilemodal').modal('toggle');
        },
        error: function(response){
          $('#errormodal').modal('toggle');
        },
      });
    });
    /** end of profile form */

    /** edit profile request */
    $('#editprofileform').submit(function(e){
      e.preventDefault();
      data = $(this).serialize();
      $.ajax({
        url: '{{ URL::to('marketing/updatemarketuser')}}',
        data: data,
        type: "POST",
        context: this,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
        },
        success: function(response){
          $('#successmodal').modal('toggle');
        },
        error: function(response){
          $('#errormodal').modal('toggle');
        },
      });
    });
    /** end of edit profile request */

    $('#dataTables-example').on('click','#activeinactivestatus',function(e){
      e.preventDefault();
      var id = $(this).attr("data-id");
      console.log(id);
      var classname = $(this).attr("class");
      $.ajax({
        url: '{{ URL::to('marketing/couponstatus')}}'+'/'+id,
        context: this,
        data: null,
        type: "GET",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          if(classname==='btn btn-xs btn-success')
            $(this).removeClass('btn btn-xs btn-success').addClass('btn btn-xs btn-danger').text('Inactive');
          else
            $(this).removeClass('btn btn-xs btn-danger').addClass('btn btn-xs btn-success').text('Active');
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
        url: '{{ URL::to('marketing/deletecoupon')}}'+'/'+id,
        data: null,
        context: this,
        type: "GET",
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

  });
  </script>
@endsection
