 <!-- START CONTENT -->
@extends('app')
@section('content')
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->

         
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">



          <div class="divider"></div>
          <!--Applying Waves-->





            <div class="row">
              <div class="col s12 m12 l12">

                <div class="collection waves-color-demo">






      <div class="collection-item" style="font-size: 20px;">Mock Test 1<a href="{{URL::to('qpagetest')}}/{{ $test->test_series_id }}/1" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
        </div>
                  <div class="collection-item" style="font-size: 20px;">Mock Test 2<a href="{{URL::to('qpagetest')}}/{{ $test->test_series_id }}/2" class="waves-effect waves-light btn secondary-content" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
        </div>   
     <div class="collection-item" style="font-size: 20px;">Mock Test 3<a href="{{URL::to('qpagetest')}}/{{ $test->test_series_id }}/3" class="waves-effect waves-light btn secondary-content" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
        </div>
     <div class="collection-item" style="font-size: 20px;">Mock Test 4<a href="{{URL::to('qpagetest')}}/{{ $test->test_series_id }}/4" class="waves-effect waves-light btn secondary-content" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
        </div>

     <div class="collection-item" style="font-size: 20px;">Mock Test 5<a href="{{URL::to('qpagetest')}}/{{ $test->test_series_id }}/5" class="waves-effect waves-light btn secondary-content" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
        </div>
                </div>
              </div>
            </div>


          </div>

          <div class="divider"></div>
          <!--  Circle  -->

          <!-- Floating Action Button -->

            <!-- Floating Action Button -->
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
@endsection
