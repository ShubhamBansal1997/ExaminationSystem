@extends('app')
@section('content')      
      <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">1 Year Packages</h5>
                
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">

            
            <div class="divider"></div>
            <div class="row">
              

              <form action="{{ URL::to('applycouponcode') }}" method="post">
              <div class="col s12 m12 l12">
                  <div class="row">
                    <div class="input-field col s6">
                      <input value="" id="first_name2" type="text" class="validate" name="coupon_code">
                      <label class="active" for="first_name2">Promocode</label>
                    </div>
                  </div>
                  <div class="row">
                    <div class="input-field col s6">
                      
                      <button type="submit" name="coupon" value="coupon" class="btn waves-effect waves-light col s6">Apply Coupon</a><br/>

                      <button type="submit" name="proceed" value="procced" class="btn waves-effect waves-light col s6">Proceed To Payment</a>
                    </div>
                  </div>
              </div>

              </form>
                @if(Session::has('coupon_successful'))
                <div id="card-alert" class="card light-blue lighten-5">
                  <div class="card-content light-blue-text">
                    <p>{{ Session::get('coupon_successful')}}</p>
                  </div>
                </div>
                @endif
                @if(Session::has('coupon_unsuccessful'))
                <div id="card-alert" class="card red">
                  <div class="card-content white-text">
                    <p>{{ Session::get('coupon_unsuccessful') }}</p>
                  </div>
                </div>
                @endif
            </div>
            
          </div>
          <!-- Floating Action Button -->
            
            <!-- Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $(".event-box").on("click", function(e){
      $(".event-box").removeClass("selected-event");
      $(e.target).addClass("selected-event");
      $("input[name=event]").val($(e.target).attr("data"));
      console.log($(e.target).attr("data"));
      });
  });
</script>
@endsection
