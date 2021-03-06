<!DOCTYPE html>
<html lang="en" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/icon/apple-icon-57x57.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/icon/apple-icon-60x60.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/icon/apple-icon-72x72.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/icon/apple-icon-76x76.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/icon/apple-icon-114x114.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/icon/apple-icon-120x120.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/icon/apple-icon-144x144.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/icon/apple-icon-152x152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/icon/apple-icon-180x180.png') }}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('assets/icon/android-icon-192x192.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/icon/favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/icon/favicon-96x96.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/icon/favicon-16x16.png') }}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('assets/icon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        <link rel="stylesheet" href="{{ asset('assets/bootstrap/dist/css/bootstrap.min.css') }}">
        <link href="{{ asset('assets/custom.css') }}" rel="stylesheet" type="text/css"/>
        <title>Exam</title>
    </head>
    <body class="h-full">

    <nav class="navbar navbar-toggleable-md navbar-light" style="background: #fff;">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleContainer" aria-controls="navbarsExampleContainer" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand primary-color" href="/">
                <img src="{{ asset('assets/images/neetgurumantra-logo-org.png') }}" alt="NEET Gurumantra"/>
                <span>NEET Gurumantra</span>
            </a>

            <div class="collapse navbar-collapse" id="navbarsExampleContainer">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle primary-color" href="index.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exams</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                            <a class="dropdown-item primary-color" href="/neet">NEET</a>
                            <a class="dropdown-item primary-color" href="/aiims">AIIMS</a>
                            <a class="dropdown-item primary-color" href="/jipmer">JIPMER</a>
                            <a class="dropdown-item primary-color" href="/eamcet">EAMCET</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle primary-color" href="index.html" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Pricing</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            <a class="dropdown-item primary-color" href="#">Test Series</a>
                            <a class="dropdown-item primary-color" href="#">PCB Package</a>
                            <a class="dropdown-item primary-color" href="#">Advanced Package</a>
                        </div>
                    </li>
                </ul>
                <div class="form-inline my-2 my-md-0 pull-sm-left">
                    <a class="grey-color mr-2 primary-color" href="{{ URL::to('register') }}">Sign Up</a>
                    <a class="grey-color primary-color" href="{{ URL::to('login') }}">Log In</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div id='exam-heading' class="mt-5 ">
            <h1 class="secondary-color display-4 mb-4">Book a guidence session by NEET/AIIMS Topper</h1>
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
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="assets/images/expert1.png" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="grey-color">Rahul Bansal</h4>
                    <p class="mb-0 pb-0 grey-color font-9"><b>Rank in NEET: </b> 675</p>
                    <p class="mt-0 pt-0 mb-0 pb-0 font-9"><b>Rank in AIIMS: </b> 675</p>
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b> Available</p>
                    <input type='submit' value="Book Now" class="btn btn-orange">
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="assets/images/expert1.png" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="grey-color">Rahul Bansal</h4>
                    <p class="mb-0 pb-0 grey-color font-9"><b>Rank in NEET: </b> 675</p>
                    <p class="mt-0 pt-0 mb-0 pb-0 font-9"><b>Rank in AIIMS: </b> 675</p>
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b> Available</p>
                    <input type='submit' value="Book Now" class="btn btn-orange">
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="assets/images/expert1.png" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="grey-color">Rahul Bansal</h4>
                    <p class="mb-0 pb-0 grey-color font-9"><b>Rank in NEET: </b> 675</p>
                    <p class="mt-0 pt-0 mb-0 pb-0 font-9"><b>Rank in AIIMS: </b> 675</p>
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b> Available</p>
                    <input type='submit' value="Book Now" class="btn btn-orange">
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="assets/images/expert1.png" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="grey-color">Rahul Bansal</h4>
                    <p class="mb-0 pb-0 grey-color font-9"><b>Rank in NEET: </b> 675</p>
                    <p class="mt-0 pt-0 mb-0 pb-0 font-9"><b>Rank in AIIMS: </b> 675</p>
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b> Available</p>
                    <input type='submit' value="Book Now" class="btn btn-orange">
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="assets/images/expert1.png" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="grey-color">Rahul Bansal</h4>
                    <p class="mb-0 pb-0 grey-color font-9"><b>Rank in NEET: </b> 675</p>
                    <p class="mt-0 pt-0 mb-0 pb-0 font-9"><b>Rank in AIIMS: </b> 675</p>
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b> Available</p>
                    <input type='submit' value="Book Now" class="btn btn-orange">
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="assets/images/expert1.png" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="grey-color">Rahul Bansal</h4>
                    <p class="mb-0 pb-0 grey-color font-9"><b>Rank in NEET: </b> 675</p>
                    <p class="mt-0 pt-0 mb-0 pb-0 font-9"><b>Rank in AIIMS: </b> 675</p>
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b> Available</p>
                    <input type='submit' value="Book Now" class="btn btn-orange">
                  </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card">
                  <img class="card-img-top img-fluid" src="assets/images/expert1.png" alt="Card image cap">
                  <div class="card-block">
                    <h4 class="grey-color">Rahul Bansal</h4>
                    <p class="mb-0 pb-0 grey-color font-9"><b>Rank in NEET: </b> 675</p>
                    <p class="mt-0 pt-0 mb-0 pb-0 font-9"><b>Rank in AIIMS: </b> 675</p>
                    <p class="mt-0 pt-0 font-9"><b>Availability: </b> Available</p>
                    <input type='submit' value="Book Now" class="btn btn-orange">
                  </div>
                </div>
            </div>
        </div>
    </div>

    <footer class="mt-5">
        <div class="container pt-4 pb-4">
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/neetgurumantra-logo-org.png') }}" alt="NEET Gurumantra"/>
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

    <script src="{{ asset('assets/jquery/dist/jquery.min.js') }}" ></script>
    <script src="{{ asset('assets/tether/dist/js/tether.min.js') }}"></script>
    <script src="{{ asset('assets/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script>
        $('.carousel').carousel();
    </script>
  </body>
</html>
