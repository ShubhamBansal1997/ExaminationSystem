@extends('app')

@section('content')
<!-- BEGIN PAGE CONTENT -->
            <!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">


        <!--card stats start-->
        <div id="card-stats" style="cursor:pointer;">
            <div class="row">
                <a href="#">
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  green white-text">
                            <p class="card-stats-title" ><i class="mdi-social-group-add"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  green darken-2" style="text-align:center;color:white;">
                           Profile
                        </div>
                    </div>
                    
                </div>
            </a>
                <div class="clr"></div>
                <a href="{{ URL::to('home/1/11') }}">
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  pink white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  pink darken-2" style="text-align:center;color:white;">
                   Physics 11th 
                        </div>
                    </div>
                </div></a>
                 <a href="{{ URL::to('home/1/12') }}">
        <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  blue-grey white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  blue-grey darken-2" style="text-align:center;color:white;">
                   Physics 12th 
                        </div>
                    </div>
                </div></a>
                    <a href="{{ URL::to('home/2/11') }}">
        <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  purple white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  purple darken-2" style="text-align:center;color:white;">
                   Chemistry 11th
                        </div>
                    </div>
                </div></a>
            </div>
        </div>


                <div id="card-stats"style="cursor:pointer;">
            <div class="row">    <a href="{{ URL::to('home/2/12') }}">
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  purple white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  purple darken-2" style="text-align:center;color:white;">
                         Chemistry 12th
                        </div>
                    </div>
                </div></a>
                <div class="clr"></div>
                    <a href="{{ URL::to('home/3/11') }}">
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content blue-grey pink white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  blue-grey darken-2" style="text-align:center;color:white;">
                   Biology 11th
                        </div>
                    </div>
                </div></a>    <a href="{{ URL::to('home/3/12') }}">
        <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  pink white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  pink darken-2" style="text-align:center;color:white;">
                   Biology 12th 
                        </div>
                    </div>
                </div></a><a href="{{ URL::to('home/1') }}">
        <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  green white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  green darken-2" style="text-align:center;color:white;">
                   Test Series - NEET
                        </div>
                    </div>
                </div>
            </a>
            </div>
        </div>


          <div id="card-stats"style="cursor:pointer;">
            <div class="row" ><a href="{{ URL::to('home/2') }}">
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  blue-grey white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  blue-grey darken-2" style="text-align:center;color:white;">
                           Test Series - AIIMS
                        </div>
                    </div>
                </div></a><a href="{{ URL::to('home/3') }}">
                <div class="clr"></div>
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  purple white-text">
                            <p class="card-stats-title" ><i class="mdi-file-folder-open"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  purple darken-2" style="text-align:center;color:white;">
                   Test Series - EAMCET
                        </div>
                    </div>
                </div></a><a href="{{ URL::to('home/askadoubt') }}">
        <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  green white-text">
                            <p class="card-stats-title" ><i class="mdi-action-question-answer"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  green darken-2" style="text-align:center;color:white;">
                   Ask a doubt 
                        </div>
                    </div>
                </div></a><a href="#">
        <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  pink white-text">
                            <p class="card-stats-title" ><i class="mdi-social-person"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  pink darken-2" style="text-align:center;color:white;">
                   Experts
                        </div>
                    </div>
                </div></a>
            </div>
        </div>


         <div id="card-stats"style="cursor:pointer;">
            <div class="row" ><a href="#">
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  green white-text">
                            <p class="card-stats-title" ><i class="mdi-image-nature-people"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  green darken-2" style="text-align:center;color:white;">
                          Competitor
                        </div>
                    </div>
                </div></a><a href="{{ URL::to('package/') }}" >
                <div class="clr"></div>
                <div class="col s12 m6 l3">
                   <div class="card">
                        <div class="card-content  pink white-text">
                            <p class="card-stats-title" ><i class="mdi-editor-attach-money"style="font-size:80px;"></i></p>
                           
                        </div>
                        <div class="card-action  pink darken-2" style="text-align:center;color:white;">
                  Purchase
                        </div>
                    </div>
                </div></a>
            </div>
        </div>


        <!--card stats end-->

      

        <!--work collections end-->

        <!-- Floating Action Button -->
        <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
            <a class="btn-floating btn-large">
              <i class="mdi-action-stars"></i>
            </a>
            <ul>
              <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
              <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
              <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
              <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
            </ul>
        </div>
        <!-- Floating Action Button -->

    </div>
    <!--end container-->
</section>
<!-- END CONTENT -->
@endsection