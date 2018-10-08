@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All reported errors</h1>

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
                                        <th>Id</th>
                                        <th>Heading</th>
                                        <th>Query</th>
                                        <th>email</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>


                                     @foreach(\App\Report::orderBy('report_id', 'DESC')->get() as $i => $payout)
                                    <tr  class="odd gradeX">
                                      
                                      <td>{{ $payout->report_id }}</td>
                                      <td>{{ $payout->report_heading }}</td>
                                      <td> Rs. {{ $payout->error_description }}</td>
                                      <td>{{ $payout->email }}</td>


                                    </tr>
                                    @endforeach


                                </tbody>
                            </table>
                            </div>
                             <!-- acceptmodal Modal -->
                          
                            <!-- /.modal -->
                             <!-- notacceptmodal Modal -->
                           
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

