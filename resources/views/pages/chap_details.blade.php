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
                <h1 class="breadcrumbs-title">{{ \App\Chapters::chap_name($chap_id) }}</h1>
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
                  
                  <div class="collection-item" style="font-size: 25px;">All Questions ({{ \App\Questions::a_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/allques" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 25px;">Easy ({{ \App\Questions::e_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/easy" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 25px;">Medium ({{ \App\Questions::m_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/medium" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 25px;">Difficult ({{ \App\Questions::d_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})<a href="{{ URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/difficult" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Start</a>
                  </div>
                  <div class="collection-item" style="font-size: 25px;">Important ({{ \App\Questions::i_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})<a href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/imp" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Start</a>
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