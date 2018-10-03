 <!-- START CONTENT -->
@extends('app')
@section('content')
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->

          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h1 class="breadcrumbs-title" style="font-size: 35px; margin-bottom: 12px;text-align: center;">Rules for the {{ $test->test_series_name }}</h1>
                <!-- <ol class="breadcrumbs">
                  <li><a href="index.html">Dashboard</a>
                  </li>
                  <li><a href="#">UI Elements</a>
                  </li>
                  <li class="active">Waves</li>
                </ol> -->
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">



          <div class="divider"></div>
          <!--Applying Waves-->





            <div class="row">
              <div class="col s12 m12 l12">

                <div class="collection waves-color-demo">
            @if($test->Rules1!="")      
 <div class="" style="font-size: 20px;">1.{{ $test->Rules1}}
                  </div>
                  @endif
@if($test->Rules2!="")      
 <div class="collection-item" style="font-size: 20px;">2.{{ $test->Rules2}}
                  </div>
                  @endif
@if($test->Rules3!="")      
 <div class="collection-item" style="font-size: 20px;">3.{{ $test->Rules3}}
                  </div>
                  @endif
@if($test->Rules4!="")      
 <div class="collection-item" style="font-size: 20px;">4.{{ $test->Rules4}}
                  </div>
                  @endif
@if($test->Rules5!="")      
 <div class="collection-item" style="font-size: 20px;">5.{{ $test->Rules5}}
                  </div>
                  @endif
@if($test->Rules6!="")      
 <div class="collection-item" style="font-size: 20px;">6.{{ $test->Rules6}}
                  </div>
                  @endif
@if($test->Rules7!="")      
 <div class="collection-item" style="font-size: 20px;">7.{{ $test->Rules7}}
                  </div>
                  @endif
@if($test->Rules8!="")      
 <div class="" style="font-size: 20px;">8.{{ $test->Rules8}}
                  </div>
                  @endif
@if($test->Rules9!="")      
 <div class="collection-item" style="font-size: 20px;">9.{{ $test->Rules9}}
                  </div>
                  @endif
@if($test->Rules10!="")      
 <div class="collection-item" style="font-size: 20px;">10.{{ $test->Rules10}}
                  </div>
                  @endif





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
