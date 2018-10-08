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
                <h1 class="breadcrumbs-title" style="font-size: 35px; margin-bottom: 12px;text-align: center;">{{ \App\Chapters::chap_name($chap_id) }}</h1>
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

                  <div class="collection-item" style="font-size: 20px;">All Questions ({{$data['allques']}}/{{$data['allques']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/allques" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">Easy ({{$data['easy']}}/{{$data['allques']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/easy" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">Medium ({{$data['medium']}}/{{$data['allques']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/medium" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">Difficult ({{$data['diff']}}/{{$data['allques']}})<a href="{{ URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/difficult" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">Important ({{$data['imp']}}/{{$data['allques']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/imp" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a></div>
                  <div class="collection-item" style="font-size: 20px;">A-R Questions ({{$data['ar']}}/{{$data['allques']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/ar" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a></div>

                  <div class="collection-item" style="font-size: 20px;">Unattempted ({{$data['unattempt']}}/{{$data['allques']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/unattempted" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:7px;margin-top: 10px;">Start</a></div>


                  <div class="collection-item" style="font-size: 20px;">Correct ({{$data['correct']}}/{{$data['attempt']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/correct" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;;margin-right:12px;margin-top: 10px;">View</a></div>

                  <div class="collection-item" style="font-size: 20px;">Incorrect ({{$data['incorrect']}}/{{$data['attempt']}})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/incorrect" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:12px;margin-top: 10px;">View</a></div>
                  <div class="collection-item" style="font-size: 20px;">Marked for Review (0/{{ \App\Questions::a_ques($chap_id) }})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/imp" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;margin-right:12px;margin-top: 10px;">View</a></div>
                  <div class="collection-item" style="font-size: 20px; text-align: center"><a onClick="myfun()" href="#" class="waves-effect waves-light btn secondary-content purple darken-4" style="font-size: 18px;margin-top: 18px">Attempt The Whole Chapter Again</a></div>





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
<?php
use Illuminate\Support\Facades\Input;
?>
<script>
function myfun()
{
 var a =confirm("All the previous progress will be deleted?");
 if(a)
 {
  alert("All of the progess is deleted after a defined duration.");
 }
 
}
</script>