<!DOCTYPE html>
<html lang="en" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('new_asset/icon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('new_asset/icon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('new_asset/icon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('new_asset/icon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('new_asset/icon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('new_asset/icon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('new_asset/icon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('new_asset/icon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('new_asset/icon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('new_asset/icon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('new_asset/icon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('new_asset/icon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('new_asset/icon/favicon-16x16.png') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('new_asset/icon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="{{ asset('new_asset/bootstrap/dist/css/bootstrap.min.css') }}">
        <link href="{{ asset('new_asset/custom.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('new_asset/timepicker/jquery.timepicker.css') }}" rel="stylesheet" type="text/css"/>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Experts</title>
    </head>
    <body class="h-full">
        
    <nav class="navbar navbar-toggleable-md navbar-light" style="background: #fff;">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleContainer" aria-controls="navbarsExampleContainer" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand primary-color" href="/">
                <img src="{{ asset('new_asset/images/neetgurumantra-logo-org.png') }}" alt="NEET Gurumantra"/>
                <span>NEET Gurumantra</span>
            </a>

            <div class="collapse navbar-collapse" id="navbarsExampleContainer">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle primary-color" href="{{ URL::to('/') }}" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exams</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                            <a class="dropdown-item primary-color" href="/neet">NEET</a>
                            <a class="dropdown-item primary-color" href="/aiims">AIIMS</a>
                            <a class="dropdown-item primary-color" href="/jipmer">JIPMER</a>
                            <a class="dropdown-item primary-color" href="/eamcet">EAMCET</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle primary-color" href="{{ URL::to('/') }}" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pricing</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item primary-color" href="#">Test Series</a>
                            <a class="dropdown-item primary-color" href="#">PCB Package</a>
                            <a class="dropdown-item primary-color" href="#">Advanced Package</a>
                        </div>
                    </li>
                </ul>
                <div class="form-inline my-2 my-md-0 pull-sm-left">
                    <a class="grey-color mr-2 primary-color" href="{{ URL::to('login') }}">Log In</a>
                    <a class="grey-color primary-color" href="{{ URL::to('register') }}">Sign Up</a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container">
        <div id='exam-heading' class="mt-5">
            <h1 class="secondary-color display-4">Guidance Session</h1>
        </div>
        
        <div class="row mt-5 grey-color">
            <div class='col-md-4'>
                <div class="fixed">
                    <div id='expert-img'>
                        <img class="d-block img-fluid" src="assets/images/expert1.png" alt="First slide">
                    </div>
                    <h3 class="pt-2 mt-2">Rahul Bansal</h3>
                    <p><b>Rank in NEET: </b> 675</p>
                    <p><b>Preferred Langauge: </b> English</p>
                    <i>"This is dummy quote by the expert. Its is just dummy it has no meaning"</i>
                </div>
            </div>
            <div class='offset-md-1 col-md-7 grey-color'>
                <div class="hidden-xs-up">
                    <h4 class="alert-danger">The expert is not available for guidance session right now</h4>
                </div>
                <div>
                    <h4 class="mb-3">Thank You!</h4>

                    <p>This is dummy message.</p>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="mt-5">
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-md-4">
                    <img src="assets/images/neetgurumantra-logo-org.png" alt="NEET Gurumantra"/>
                    <p class="mt-2">This is some text about the company.</p>
                    <p>&COPY; 2017 NEETGURUMANTRA</p>
                </div>
                <div class="col-md-4">
                    <h5>Heading 1</h5>
                    <a href="#">Link 1</a> <br>
                    <a href="#">Link 2</a><br>
                    <a href="#">Link 3</a><br>
                    <a href="#">Link 4</a>
                </div>
                <div class="col-md-4">
                    <h5>Heading 1</h5>
                    <a href="#">Link 5</a><br>
                    <a href="#">Link 6</a><br>
                    <a href="#">Link 7</a><br>
                    <a href="#">Link 8</a>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{ asset('new_asset/jquery/dist/jquery.min.js') }}" ></script>
    <script src="{{ asset('new_asset/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('new_asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('new_asset/timepicker/jquery.timepicker.min.js') }}" type="text/javascript"></script>
  </body>
</html>
