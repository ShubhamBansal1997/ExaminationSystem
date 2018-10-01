@extends('market.app')
@section('content')
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

                            <div class="row">
                              <div class="col-lg-3">
                                <button class="btn btn-primary btn-lg" id="addcoupon">
                                Add coupon
                                </button>
                                <br/>
                              <!--   <b>Maximum Discount Package:</b>{{ isset($user->max_discount_package)?$user->max_discount_package:null }} -->
                              </div>
                            <!--   <div class="col-lg-3">
                                <button class="btn btn-primary btn-lg" id="editprofile">
                                Update Profile
                                </button>
                                <br/>
                                <b>Maximum Discount Expert :</b>{{ isset($user->max_discount_expert)?$user->max_discount_expert:null }}
                              </div> -->
                           <!--    <div class="col-lg-3">
                                <b>Unpaid: </b>{{ \App\Coupon_Activity::where('user_email',$user->email)->where('activity_status','UNPAID')->sum('admin_share') }}
                              </div>
                              <div class="col-lg-3">
                                <b>Total: </b>{{ \App\Coupon_Activity::where('user_email',$user->email)->sum('admin_share') }}
                              </div> -->

                              <div class="col-lg-3">
                                <b>( {{$user->max_discount_package}}% ) for Package</b><!-- {{ \App\Coupon_Activity::where('user_email',$user->email)->where('activity_status','UNPAID')->sum('admin_share') }} -->
                              </div>
                              <div class="col-lg-3">
                                <b>( {{$user->max_discount_expert}}% ) for Guidance Session</b><!-- {{ \App\Coupon_Activity::where('user_email',$user->email)->sum('admin_share') }}
                              </div> - -->
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
                                        <form method="POST" action="{{ URL::to('marketing/addcoupon')}}">
                                            {{ csrf_field() }}
                                           
                                            <div class="form-group">
                                                <label>Coupon Name</label>
                                                <input class="form-control" name="coupon_name" required>
                                            </div>
                                            <div class="form-group">
                                                 <label id="maximum_discount"></label>
<select name="max_discount" class="form-control" required>
<?php if($user->max_discount_expert >= $user->max_discount_package)
{
$iterator = $user->max_discount_expert;
}
else
{
  $iterator = $user->max_discount_package;
}

for( $i = 0 ; $i<= $iterator;$i++)
{?>
<option value="<?php echo $i; ?>"><?php echo $i;?></option>
<?php
}?>

</select>


                                            </div>

                                            

                                            <div class="form-group">
                                                <label>Number Of Coupon</label>
                                                <input class="form-control" name="coupon_number" required>
                                            </div>
                                            <div class="form-group">
                                              <label>Coupon Sale Type</label>
                                              <select name="coupon_type" class="form-control" required>
                                                <option value="PACKAGE">PACKAGE</option>
                                                <option value="GUIDANCE SESSION">GUIDANCE SESSION</option>
                                              </select>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Create Coupon</button>
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
                                        <form role="form" action="{{ URL::to('marketing/updatemarketuser')}}" method="POST" enctype=multipart/form-data >
                                        {{ csrf_field() }}
                                        <div class="modal-body">
                                              <div class="panel-body">
                                                <div class="row">
                                                  <div class="col-lg-12">
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                    <div class="form-group">
                                                      <label>First Name:</label>
                                                      <input class="form-control" name='fname' value="{{ $user->fname }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Last Name</label>
                                                      <input class="form-control" name="lname" value="{{ $user->lname }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Email</label>
                                                      <input class="form-control" type="text" name="email" value="{{ $user->email }}" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Max Discount Package(0-60)</label>
                                                      <input class="form-control" name="max_discount_package" value="{{ $user->max_discount_package }}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Max Discount Expert(0-60)</label>
                                                      <input class="form-control" name="max_discount_expert" value="{{ $user->max_discount_expert }}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>ID Proof Number</label>
                                                      <input class="form-control" name="id_proof" value="{{ $user->id_proof }}">
                                                    </div>
                                                    <div class="form-group">
                                                      <label>ID Proof File</label>
                                                      <input class="form-control" type="file" name="id_proof_file" value="" >
                                                      <a href="{{ URL::to('images/id_proof') }}/{{ $user->id_proof_file }}" target="_blank">Previous File</a>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Bank Account Number</label>
                                                      <input class="form-control" name="bank_acc_no" value="{{ $user->bank_acc_no }}"  >
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Bank IFSC Code</label>
                                                      <input class="form-control" name="bank_ifsc_code" value="{{ $user->bank_ifsc_code }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Phone No</label>
                                                      <input class="form-control" name="phoneno" placeholder="without +91" value="{{ $user->phoneno }}" required>
                                                    </div>
                                                    <div class="form-group">
                                                      <label>Descrption</label>
                                                      <input class="form-control" name="descrption" value="{{ $user->descrption }}">
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
                                        <th>Sale Type</th>
                                        <th>Coupon code name</th>
                                        <th>Discount Percentage</th>
                                        <th>Benefit percentage</th>
                                        <th>Total number coupon generated</th>
                                        <th>Remaining number of coupons</th>
                                        <th>Actions</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>


                                   <!--   @foreach($coupons as $i => $coupon) -->
                                    <tr  class="odd gradeX">
                                      <td>{{ $i }}</td>
                                       <td>{{ $coupon->coupon_type }}</td>
                                      <td>{{ $coupon->coupon_name }}</td>
                                      <td>{{ $coupon->coupon_percent }}%</td>
                                      @if($coupon->coupon_type == "PACKAGE")
                                      <td>{{($user->max_discount_package) -  ($coupon->coupon_percent) }}%</td>
                                      @else
                                       <td>{{($user->max_discount_expert-$coupon->coupon_percent) }}%</td>
                                       @endif
                                      <td>{{ $coupon->coupon_number }}</td>
                                     <td></td>
                                    
                                      <td>
                                        <button id="deletecoupon" data-id="{{ $coupon->id }}" class="btn btn-xs btn-danger">Delete</button>
                                      </td>
                                        <td>
                                      @if($coupon->coupon_active==true)
                                        <button id="activeinactivestatus" data-id="{{ $coupon->id }}" class="btn btn-xs btn-success">Active</button>
                                      @else
                                        <button id="activeinactivestatus" data-id="{{ $coupon->id }}" class="btn btn-xs btn-danger">Inactive</button>
                                      @endif
                                      </td>
                                    </tr>
                                  <!--   @endforeach -->


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
      var value = 'Maximum Discount allowed ' + '{{ $user->max_discount_expert }} (for expert) {{ $user->max_discount_package }} (for package)'  + ':';

      $('#maximum_discount').text(value);
      $('#addcouponmodal').modal('toggle');
    });

   
    /** show the edit profile form */
    $('#editprofile').click(function(e){
      e.preventDefault();
      $('#editprofilemodal').modal('toggle');
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
