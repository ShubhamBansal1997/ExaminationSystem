@extends('content.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">All coupon Activities</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>


                        <div class="panel-body">
                          <div class="row" style=" background-color:#ebebe0; padding:20px;">
                            <div class="col-lg-2"></div>
                                 <div class="col-lg-4">
                                <b>
                               Total Earning : 
                                </b></br></br>
                                 <b>
                              Tax and payment gateway charges percentage :
                                </b></br></br>
                                 <b>
                               Net Earning : 
                                </b></br>
                                <br/>
                             
                              </div>
 <div class="col-lg-2"></div>
                               <div class="col-lg-3">
                                <b>
                               Total Paid Amount :
                                </b>
                                <br/></br>
                               <b>
                              Total Remaining amount :
                                </b>
                                <br/></br>
                                  <b>
                               Requested Payout :
                                </b>
                                <br/>
                              </div>


                          </div>
                            <div id="no-more-tables" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S No</th>
                                        <th>Name of Student</th>
                                        <th>Date and time</th>
                                        <th>Sale type</th>
                                        <th>Total amount paid by the student</th>
                                        <th>Coupon Name</th>
                                        <th>Discount got by student</th>
                                        <th>Benefit of the marketer</th>
                                        <th>Status of payment</th>
                                       <!--  <th>Actions</th>
                                        <th>Status</th> -->
                                    </tr>
                                </thead>
                                <tr>
                                    <td>1</td>
                                    <td>Ankit Arora</td>
                                    <td>02/7/17</td>
                                    <td>Package</td>                                  
                                    <td>2000</td>
                                    <td>STUDY100</td>
                                    <td>500</td>
                                    <td>1500</td>
                                    <td>Paid</td>
                                </tr>
                                <tbody>



                                   <!--   @foreach($coupons as $i => $coupon) -->
                                 <!--    <tr  class="odd gradeX">
                                      <td>{{ $i }}</td>
                                      <td>{{ $coupon->coupon_name }}</td>
                                      <td>{{ $coupon->coupon_percent }}</td>
                                      <td>{{ $coupon->coupon_number }}</td>
                                      <td>{{ $coupon->coupon_type }}</td>
                                      <td></td>
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
                                    </tr> -->
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

    $('#addcouponform').submit(function(e){
      e.preventDefault();
      var discount = $('#addcouponform input[name=coupon_discount]').val();
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
