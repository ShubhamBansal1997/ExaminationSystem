@extends('admin.app')
@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Marketers</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">

                            <button class="btn btn-primary btn-lg" id="adduserbutton">
                                Add User
                            </button>

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
                                        <th>Order</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <td>Descrption</td>
                                        <th>Phone no</th>
                                        <th>Bank Details</th>
                                        <td>Aaddhar Number</td>
                                        <td>Max Discount</td>
                                        <th>Unpaid </th>
                                        <th>Total </th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($markets as $i=>$market)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $market->fname }}  {{ $market->lname }}</td>
                                      <td>{{ $market->email }}</td>
                                      <td>{{ $market->description }}</td>
                                      <td>{{ $market->phoneno }}</td>
                                      <td> Acc no: {{ $market->bank_acc_no }} <br/>
                                          Bank Ifsc Code: {{ $market->bank_ifsc_code }}</td>
                                      <td>{{ $market->id_proof }}</td>
                                      <td>{{ $market->max_discount }}</td>
                                      <td>Rs.{{ \App\Coupon_Activity::where('user_email',$market->email)->where('activity_status','UNPAID')->sum('admin_share') }}</td>
                                      <td>Rs.{{ \App\Coupon_Activity::where('user_email',$market->email)sum('admin_share') }}</td>
                                      <td>
                                          <button id="make_payout" data-id="{{ $market->id }}" class="btn btn-xs btn-success">Make Payout</button>
                                          <button id="edit_market" data-id="{{ $market->id }}" class="btn btn-xs btn-primary">Edit</button>
                                          <button id="delete_market" data-id="{{ $market->id }}" class="btn btn-xs btn-danger">Delete</button>
                                        @if($market->active==true)
                                        <button id="active_status" data-id="{{ $market->id }}" class="btn btn-xs btn-success">Active</button>
                                        @else
                                        <button id="active_status" data-id="{{ $market->id }}" class="btn btn-xs btn-danger">Inactive</button>
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

@section('modal')
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
                          <input type="hidden" name="id" value="" id="payoutmarketid">
                          <label>Name:</label>
                          <input class="form-control" name='name' disabled="true" value="">
                        </div>
                        <div class="form-group">
                          <label>Amount</label>
                          <input class="form-control" type="text" name="amount" disabled="true" id="payoutamount" value="" >
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
<!-- User Add  Modal -->
<div class="modal fade" id="useraddmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add User </h4>
            </div>

            <div class="modal-body">
            <form role="form" method="POST" action="{{ URL::to('admin/adduser') }}" enctype='multipart/form-data' >
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>First Name:</label>
                          <input class="form-control" name='fname' required>
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                          <input class="form-control" name="lname" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" type="text" name="email" required>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input class="form-control" name="password" type="password" required>
                        </div>
                        <div class="form-group">
                          <label>Max Discount Package(0-60)</label>
                          <input class="form-control" name="max_discount_package" required>
                        </div>
                        <div class="form-group">
                          <label>Max Discount Expert(0-60)</label>
                          <input class="form-control" name="max_discount_expert" required>
                        </div>
                        <div class="form-group">
                          <label>ID Proof Number</label>
                          <input class="form-control" name="id_proof" required>
                        </div>
                        <div class="form-group">
                          <label>ID Proof File</label>
                          <input class="form-control" type="file" name="id_proof_file" required>
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
                          <label>Phone No</label>
                          <input class="form-control" name="phoneno" placeholder="without +91" required>
                        </div>
                        <div class="form-group">
                          <label>Descrption</label>
                          <input class="form-control" name="descrption">
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
<!-- /.User Add modal -->
<!-- User Edit  Modal -->
<div class="modal fade" id="usereditmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Edit User </h4>
            </div>
            <form role="form" action="{{ URL::to('admin/editmarketuser')}}" method="POST" id="usereditform">
            {{ csrf_field() }}
            <div class="modal-body">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <input type="hidden" name="id" value="">
                        <div class="form-group">
                          <label>First Name:</label>
                          <input class="form-control" name='fname' value="" required>
                        </div>
                        <div class="form-group">
                          <label>Last Name</label>
                          <input class="form-control" name="lname" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Email</label>
                          <input class="form-control" type="text" name="email" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input class="form-control" name="password" type="password" value="" >
                        </div>
                        <div class="form-group">
                          <label>Max Discount Package(0-60)</label>
                          <input class="form-control" name="max_discount_package" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Max Discount Expert(0-60)</label>
                          <input class="form-control" name="max_discount_expert" value="" required>
                        </div>
                        <div class="form-group">
                          <label>ID Proof Number</label>
                          <input class="form-control" name="id_proof" value="" required>
                        </div>
                        <div class="form-group">
                          <label>ID Proof File</label>
                          <input class="form-control" type="file" name="id_proof_file" value="" >
                        </div>
                        <div class="form-group">
                          <label>Bank Account Number</label>
                          <input class="form-control" name="bank_acc_no" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Bank IFSC Code</label>
                          <input class="form-control" name="bank_ifsc_code" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Phone No</label>
                          <input class="form-control" name="phoneno" placeholder="without +91" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Descrption</label>
                          <input class="form-control" name="descrption" value="">
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
<!-- /.User Edit modal -->
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){

    /** function to call a modal on add user */
    $('#adduserbutton').click(function(e){
      //e.preventDefault();
      console.log("esdas");
      $('#useraddmodal').modal('toggle');
    });

    /** function to change the status of the marketing user */
    $('#dataTables-example').on('click','#active_status', function(e){
      e.preventDefault();
      var id = $(this).attr("data-id");
      console.log(id);
      var classname = $(this).attr("class");
      $.ajax({
        url: '{{ URL::to('admin/marketstatus')}}'+'/'+id,
        data: null,
        type: "GET",
        context: this,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          if(classname=='btn btn-xs btn-success')
          $(this).removeClass('btn btn-xs btn-success').addClass('btn btn-xs btn-danger').text('Inactive');
          else
          $(this).removeClass('btn btn-xs btn-danger').addClass('btn btn-xs btn-success').text('Active');
        }
      });
    });

    /** function to delete the marketing user  */

    $('#dataTables-example').on('click','#delete_market', function(e){
      e.preventDefault();
      var id = $(this).attr("data-id");
      var parent = $(this).parent();
      $.ajax({
        url: '{{ URL::to('admin/deletemarket')}}'+'/'+id,
        data: null,
        type: "GET",
        context: this,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          parent.slideUp(300, function () {
                    parent.closest("tr").remove();
                });
        }
      })
    });

    /** function to toogle the edit marketing user form */
    $('#dataTables-example').on('click','#edit_market', function(e){
      e.preventDefault();
      var marketid = $(this).attr("data-id");
      //var response = getuserdata(marketid);
      //console.log(response);

      $.ajax({
        url: '{{ URL::to('admin/getmarketdata')}}' + '/' + marketid,
        data: null,
        type: "GET",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        context: this,
        success: function(response){
          console.log(response);
          $('#usereditform input[name=id]').val(marketid);
          $('#usereditform input[name=email]').val(response['email']);
          $('#usereditform input[name=fname]').val(response['fname']);
          $('#usereditform input[name=lname]').val(response['lname']);
          $('#usereditform input[name=max_discount_package]').val(response['max_discount_package']);
          $('#usereditform input[name=max_discount_expert]').val(response['max_discount_expert']);
          $('#usereditform input[name=id_proof]').val(response['id_proof']);
          $('#usereditform input[name=bank_acc_no]').val(response['bank_acc_no']);
          $('#usereditform input[name=bank_ifsc_code]').val(response['bank_ifsc_code']);
          $('#usereditform input[name=phoneno]').val(response['phoneno']);
          $('#userdeitform input[name=descrption]').val(response['description']);
          $('#usereditmodal').modal('toggle');
        }
      });
    });



    /** function for making the payout the user */
    $('#dataTables-example').on('click','#make_payout',function(e){

      e.preventDefault();
      var marketid = $(this).attr("data-id");
      //var response = getuserdata(marketid);
      //console.log(response);
      $.ajax({
        url: '{{ URL::to('admin/getmarketdata')}}'+ '/' + marketid,
        data: null,
        type: "GET",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        context: this,
        success: function(response){
          console.log(response);
          console.log(response['fname']);
          $('#payoutmarketid').val(marketid);
          $('#payoutform input[name=name]').val(response['fname']);
          $('#payoutform input[name=amount]').val(response['unpaid']);
      //      $('#invoicepk').val(invoicepk);
          $('#payoutmodal').modal('toggle');
        }
      });



    });

    /** function to submit the payout form of the user */
    $('#payoutform').submit(function(e){
      e.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url: '{{ URL::to('admin/addpayout')}}',
        data: data,
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          location.reload();
        }
      });
    });

    /** function to submit the new user form  */
    $('#useraddform').submit(function(e){
      e.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url: '{{ URL::to('admin/adduser') }}',
        data: data,
        type: "POST",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        },
        success: function(response){

            location.reload();
        }

      });
    });



    function getuserdata(marketid)
    {
      var response;
      $.ajax({
        url: '{{ URL::to('admin/getmarketdata')}}'+'/'+marketid,
        data: null,
        type: "GET",
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        context: this,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(responce){
            response = responce;
        }
      });
      return response;
    }

  });
</script>
@endsection
