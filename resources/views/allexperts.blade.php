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
        <title>All Experts</title>
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
        <div id='exam-heading' class="mt-5 ">
      <h1 class="secondary-color display-4 mb-4">Book a Guidance Session by NEET/AIIMS Topper</h1>
            <h4 class="grey-color mb-4">Choose your expert</h4>
        </div>
        <!--div class="card" style="width: 20rem;">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-block">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div-->
        <div class="row grey-color">
            @foreach($experts as $expert)
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="/images/{{ $expert->photo_of_expert }}" alt="Card image cap" style="
    height: 28em;
">
                  <div class="card-block">
                    <h4 class="grey-color">{{ $expert->first_name }} {{ $expert->last_name }}</h4>
                    {!! $expert->rank_in_various_exams !!}
                    {{ $expert->quote }}
                    @if($expert->status!=1)
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b>
                     Currently Unavailable
                    @endif
                   </p>
                   @if($expert->status==1)
                    <a class="btn btn-orange" href="{{ URL::to('bookexpert')}}/{{ $expert->first_name}}/{{ $expert->id }}">BOOK NOW</a>
                   @endif
                  </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <footer class="mt-5">
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('new_asset/images/neetgurumantra-logo-org.png') }}" alt="NEET Gurumantra"/>
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
    <script>
        $('.carousel').carousel();
        $('#expert-time').timepicker();
        $('#expert-date').datepicker();
    </script>
  </body>
</html>
