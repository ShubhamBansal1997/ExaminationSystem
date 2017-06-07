@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All Payouts</h1>

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
                        </div>
                        </div>
                        <div class="panel-body">
                            <div id="no-more-tables" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Method</th>
                                        <th>Bank Details</th>
                                        <th>Phone no</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                     @foreach(\App\Market_Payout::orderBy('created_at', 'DESC')->get() as $i => $payout)
                                    <tr  class="odd gradeX">
                                      <td>{{ ++$i }}</td>
                                      <td>{{ $payout->name }}</td>
                                      <td>{{ $payout->email }}</td>
                                      <td>{{ $payout->type }}</td>


                                      <td>IFSC CODE:{{ $payout->bank_ifsc_code }}
                                          Acc. No: {{ $payout->bank_acc_no }}</td>
                                      <td>{{ $payout->phoneno }}</td>
                                      <td>{{ $payout->created_at }} %</td>
                                      <td>
                                        @if($payout->active==true)
                                        <button class="btn btn-xs btn-danger">UNPAID</button>
                                        @else
                                        <button class="btn btn-xs btn-success">PAID</button>
                                        @endif
                                      </td>
                                      <td>
                                      @if($payout->active==true)
                                        <button id="paythepayout" data-id="{{ $payout->id }}" class="btn btn-xs btn-warning">Pay</button>
                                      @else
                                        <button class="btn btn-xs btn-info">Already Paid</button>
                                      @endif
                                      </td>
                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            </div>
                             <!-- acceptmodal Modal -->
                            <div class="modal fade" id="acceptmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Payout Processed Successfully</h4>
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
                             <!-- notacceptmodal Modal -->
                            <div class="modal fade" id="notacceptmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            <h4 class="modal-title" id="myModalLabel">Payout Not Processed Successfully!!! There is some server Issue</h4>
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
      $("#dataTables-example").on('click','#paythepayout',function(e){
        e.preventDefault();
        var id = $(this).attr("data-id");
        var classname = $(this).attr("class");
        $.ajax({
          url: '{{ URL::to('admin/paythepayout') }}'+'/'+id,
          data: null,
          type: "GET",
          context: this,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr("content")
          },
          success: function(response){
            $(this).removeClass('btn btn-xs btn-warning').addClass('btn btn-xs btn-info').text('Already Paid');
            $('#acceptmodal').modal('toggle');
            location.reload();
          },
          error: function(response){
            $('#notacceptmodal').modal('toggle');
          },
        });
      });

  });
</script>
@endsection

