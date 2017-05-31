@extends('admin.app')
@section('content')
<style>
@media only screen and (max-width: 800px) {

    /* Force table to not be like tables anymore */
  #no-more-tables table,
  #no-more-tables thead,
  #no-more-tables tbody,
  #no-more-tables th,
  #no-more-tables td,
  #no-more-tables tr {
    display: block;
  }

  /* Hide table headers (but not display: none;, for accessibility) */
  #no-more-tables thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  #no-more-tables tr { border: 1px solid #ccc; }

  #no-more-tables td {
    /* Behave  like a "row" */
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
    white-space: normal;
    text-align:left;
  }

  #no-more-tables td:before {
    /* Now like a table header */
    position: absolute;
    /* Top/left values mimic padding */
    top: 6px;
    left: 6px;
    width: 45%;
    padding-right: 10px;
    white-space: nowrap;
    text-align:left;
    font-weight: bold;
  }

  /*
  Label the data
  */
  #no-more-tables td:before { content: attr(data-title); }
}
</style>
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
                            <p>
                            @if(Session::has('flash_message'))
                            <div class="alert alert-success fade in">
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_message') }}

                            </div>
                            @endif
                          </p>
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
                                        <th>Active</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($markets as $i=>$market)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $market->fname }}  {{ $market->lname }}</td>
                                      <td>{{ $market->email }}</td>
                                      <td>{{ $market->descrption }}</td>
                                      <td>{{ $market->phoneno }}</td>
                                      <td> Acc no: {{ $market->bank_acc_no }} <br/>
                                          Bank Ifsc Code: {{ $market->bank_ifsc_code }}</td>
                                      <td>{{ $market->id_proof }}</td>
                                      <td>{{ $market->max_discount }}</td>
                                      <td>Rs.{{ $market->unpaid }}</td>
                                      <td>Rs.{{ $market->total }}</td>
                                      <td>
                                          <button id="make_payout" data-id="{{ $market->id }}" class="btn btn-xs btn-success">Make Payout</button>
                                          <button id="edit_market" data-id="{{ $market->id }}" class="btn btn-xs btn-primary">Edit</button>
                                          <button id="delete_market" data-id="{{ $market->id }}" class="btn btn-xs btn-danger">Delete</button>
                                      </td>
                                      <td>
                                        @if($market->active==true)
                                        <button id="activeinactivestatus" var-id="{{ $market->id }}" class="btn btn-xs btn-success">Active</button>
                                        @else
                                        <button id="activeincativestatus" var-id="{{ $market->id }}" class="btn btn-xs btn-danger">Inactive</button>
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
            <form role="form" id="useraddform" method="POST">
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
                          <label>Max Discount(0-60)</label>
                          <input class="form-control" name="max_discount" required>
                        </div>
                        <div class="form-group">
                          <label>Aadhar Number</label>
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
                          <label>Phone No</label>
                          <input class="form-control" name="phoneno" placeholder="without +91" required>
                        </div>
                        <div class="form-group">
                          <label>Descrption</label>
                          <input class="form-control" name="descrption">
                        </div>
                        <div class="form-group">
                          <label>Comission</label>
                          <input class="form-control" name="comission">
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
                <h4 class="modal-title" id="myModalLabel">Add User </h4>
            </div>
            <form role="form" id="usereditform" method="POST">
            <div class="modal-body">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <input type="hidden" name='id' value="">
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
                          <input class="form-control" name="password" type="password" value="" placeholder="Keep it blank if donot want to change">
                        </div>
                        <div class="form-group">
                          <label>Max Discount(0-60)</label>
                          <input class="form-control" name="max_discount" value="" required>
                        </div>
                        <div class="form-group">
                          <label>Aadhar Number</label>
                          <input class="form-control" name="id_proof" value="" required>
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
                          <input class="form-control" name="descrption" value="" >
                        </div>
                        <div class="form-group">
                          <label>Comission</label>
                          <input class="form-control" name="comission" value="" >
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
    $('#dataTables-example').on('click','#activeincativestatus', function(e){
      e.preventDefault();
      var id = $(this).attr('var-id');
      //console.log(marketid);
      var classname = $(this).attr('class');
      $.ajax({
        url: '{{ URL::to('admin/marketstatus')}}'+'/'+id,
        data: null,
        type: "GET",
        context: this,
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response){
          if(classname==='btn btn-xs btn-success')
          $(this).removeClass('btn btn-xs btn-success').addClass('btn btn-xs btn-danger').text('Inactive');
          else
          $(this).removeClass('btn btn-xs btn-danger').addClass('btn btn-xs btn-success').text('Active');
        }
      })
    });

    /** function to delete the marketing user  */

    $('#dataTables-example').on('click','#delete_market', function(e){
      e.preventDefault();
      var id = $(this).attr('data-id');
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
      var marketid = $(this).attr('data-id');
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
          $('#usereditform input[name=fname]').val(response['fname']);
          //$('$usereditform input[name=lname]').val(response['lname']);
          $('#usereditform input[name=max_discount]').val(response['max_discount']);
          $('#usereditform input[name=lname]').val(response['lname']);
          $('#usereditform input[name=email]').val(response['email']);
          $('#usereditform input[name=id_proof]').val(response['id_proof']);
          $('#usereditform input[name=bank_acc_no]').val(response['bank_acc_no']);
          $('#usereditform input[name=bank_ifsc_code]').val(response['bank_ifsc_code']);
          $('#usereditform input[name=phoneno]').val(response['phoneno']);
          $('#usereditform input[name=descrption]').val(response['descrption']);
          $('#usereditform input[name=comission]').val(response['comission']);
          $('#usereditmodal').modal('toggle');
        }
      });
    });

    /** function to save the edit  marketing user form */
    $('#usereditform').submit(function(e){
      e.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url: '{{ URL::to('admin/editmarketuser')}}',
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

    /** function for making the payout the user */
    $('#dataTables-example').on('click','#make_payout',function(e){

      e.preventDefault();
      var marketid = $(this).attr('data-id');
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
