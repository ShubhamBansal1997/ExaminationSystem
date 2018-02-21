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
        <div id='exam-heading' class="text-center">
            <p class="mt-5 grey-color">CBSE</p>

            <h1 class="secondary-color text-center display-4">National Eligibility cum Entrance Test <br/> NEET 2018</h1>

            <p class="mt-5 grey-color">Don't be late, start preparing now</p>

            <a class="btn btn-orange btn-lg" href="#">Start Learning</a>
        </div>

        <div class="row mt-5 grey-color">
            <div class='col-md-6'>
                <p class='grey-color text-justify'>The National Eligibility cum Entrance Test or NEET is the country’s sole medical entrance examination through which all medical colleges, run by the central and state governments, as well as private institutions and minority institutions, will admits students. NEET 2017 (National Eligibility cum Entrance Test) will be held for providing admissions to MBBS/BDS courses, offered by all government and private medical colleges in India. A one-tier exam, it commences once a year in the month of May. All seats (MBBS/BDS) in any medical/dental college will be filled by the score of NEET examination only.</p>
                <p class='grey-color text-justify'>The National Eligibility cum Entrance Test or NEET is the country’s sole medical entrance examination through which all medical colleges, run by the central and state governments, as well as private institutions and minority institutions, will admits students. NEET 2017 (National Eligibility cum Entrance Test) will be held for providing admissions to MBBS/BDS courses, offered by all government and private medical colleges in India. A one-tier exam, it commences once a year in the month of May. All seats (MBBS/BDS) in any medical/dental college will be filled by the score of NEET examination only.</p>
            </div>
            <div class='col-md-6'>
                <h3 class="grey-color">Important Dates</h3>

                <table class='table table-bordered'>
                    <thead>
                        <tr class="table-active">
                            <th>
                                Dates
                            </th>
                            <th>
                                Event
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                31-01-2018
                            </td>
                            <td>
                                NEET 2017 Application Form Available
                            </td>
                        </tr>
                        <tr>
                            <td>
                                31-01-2018
                            </td>
                            <td>
                                NEET 2017 Application Form Available
                            </td>
                        </tr>
                        <tr>
                            <td>
                                31-01-2018
                            </td>
                            <td>
                                NEET 2017 Application Form Available
                            </td>
                        </tr>
                        <tr>
                            <td>
                                31-01-2018
                            </td>
                            <td>
                                NEET 2017 Application Form Available
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-5 grey-color">
            <div class="col-md-12">
                <h3 class="grey-color">Study Material</h3>
                <p>
                    This is often said that previous year papers are the best ways to judge your preparation and this holds true for NEET as well. Solve all the previous papers of NEET within the set time limit,focusing on frequently-asked questions, topics and patterns. You could also try solving question papers of other examinations such as JIPMER, RPET, and AIIMS for more diversity in practice or if you are planning to appear for Medical Entrance Exams other than NEET/AIPMT 2017. Since the JEE Main papers are set by the same body, you may also attempt current and past papers of JEE Main.
                </p>
            </div>
        </div>
        <div  id="packages">
            <h1 class="secondary-color display-4 my-5">Frequently Asked Questions(FAQ)</h1>
                <div class="demo">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        This is first FAQ. Click to view answer.
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                      This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        This is second FAQ. Click to view answer.
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer. This is FAQ answer.
                                </div>
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="more-less glyphicon glyphicon-plus"></i>
                                        This is third FAQ. Click to view answer.
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    This is FAQ answer.
                                </div>
                            </div>
                        </div>

                    </div><!-- panel-group -->
                </div><!-- container -->
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
