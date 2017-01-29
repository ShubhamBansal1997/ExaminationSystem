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
                <h5 class="breadcrumbs-title"><div style="margin-bottom: 10px; text-align: center; font-size: 30px;" >@if($sub_id==1) {{ "Physics" }} @elseif($sub_id==2) {{ "Chemistry" }} @else {{ "Biology" }} @endif - {{ $std }}th</div></h5>
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
                  @foreach(\App\Chapters::where('sub_id',$sub_id)->where('std',$std)->get() as $i=>$chapters)
                  @if($i==0)
                  <div class="collection-item">{{ str_limit($chapters->chap_name, $limit = 41, $end = '...') }}<a href="{{ URL::to('home') }}/{{ $sub_id }}/{{ $std }}/{{ $chapters->chap_id }}" class="waves-effect waves-light btn secondary-content" style="margin-right:7px;margin-top: 10px;">Start</a>
                  </div>
                  @else
                  <div class="collection-item">{{ str_limit($chapters->chap_name, $limit = 41, $end = '...') }}<a href="#" class="waves-effect btn secondary-content purple darken-4" style="margin-top: 10px;">Unlock</a>
                  </div>
                  @endif
                  @endforeach
                  
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