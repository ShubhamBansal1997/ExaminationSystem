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
                    <h1 class="page-header">Marketing Payouts</h1>
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
<!--                             <button class="btn btn-primary btn-lg" id="adduserbutton">
                                Add User
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

                                        <th>Order</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <td>Amount</td>
                                        <th>Type</th>
                                        <th>Bank IFSC Code</th>
                                        <td>Bank Account Number</td>
                                        <td>Phone no</td>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach($payouts as $i=>$payout)
                                    <tr  class="odd gradeX">
                                      <td>{{ $i++ }}</td>
                                      <td>{{ $payout->name }}</td>
                                      <td>{{ $payout->email }}</td>
                                      <td> Rs. {{ $payout->amount }}</td>
                                      <td>{{ $payout->type }}</td>
                                      <td> {{ $payout->bank_ifsc_code }}</td>
                                      <td>{{ $payout->back_acc_no }}</td>
                                      <td>Rs.{{ $payout->phoneno }}</td>
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
