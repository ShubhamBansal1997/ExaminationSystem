@extends('admin.app')
@section('content')
<div id="loading"></div>
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All Coupons</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                        <div class="panel-body">
                        </div>
                        </div>

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


                                     @foreach(\App\Coupons::where('coupon_delete',FALSE)->orderBy('created_at', 'DESC')->get() as $i => $coupon)
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

