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
                        <img class="d-block img-fluid" src="{{ $expert->profile_pic }}" alt="First slide">
                    </div>
                    <h3 class="pt-2 mt-2">{{ $expert->first_name }} {{ $expert->last_name }}</h3>
                    <p><b>Rank in NEET: </b> {{ $expert->neet_rank }}</p>
                    <p><b>Rank in AIIMS: </b> {{ $expert->aiims_rank }}</p>
                    <p><b>Preferred Langauge: </b> {{ $expert_description->preferred_language }}</p>
                    <i>{{ $expert_description->quote }}</i>
                </div>
            </div>
            <div class='offset-md-1 col-md-7 grey-color'>
                <div>
                    <h4 class="mb-3">Book your slot now!</h4>

                    <p><b>Guidance Session: </b> 30 minutes</p>
                    <p><b>Cost: </b> Rs. {{ $expert_description->charges }}</p>
                <form v-on:submit.prevent="addBooking()">
                    <div class='form-group'>
                        <label for="name">Name</label>
                        <input class="form-control" v-model='newBooking.name' type="text" required="required">
                    </div>
                    <div class='form-group'>
                        <label for="email">Email</label>
                        <input type='text' class="form-control" v-model='newBooking.email' required="required">
                    </div>
                    <div class='form-group'>
                        <label for="phone">Phone</label>
                        <input type='text' class="form-control" v-model='newBooking.phone' required="required">
                    </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class='form-group'>
                                    <label for="phone">Date</label>
                                    <input type="text" class="form-control" v-model="newBooking.date" required="required" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class='form-group'>
                                    <label for="phone">Time</label>
                                    <select class="form-control" v-model='newBooking.time'>
                                    @foreach($slots as $i => $slot)
                                    <option value="{{ $slot->time }}">{{ $slot->time }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    <div class='form-group'>
                        <label for="promo">Add promo code</label>
                        <input type="text" class="form-control" v-model="newBookin.promo" required="required">
                    </div>
                    <div class='form-group'>
                        <input type='submit' value="Book Now" class="btn btn-orange">
                    </div>
                </form>
                </div>
            </div>
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

    <script src={{ asset('new_asset/jquery/dist/jquery.min.js') }}" ></script>
    <script src={{ asset('new_asset/tether/dist/js/tether.min.js') }}"></script>
    <script src={{ asset('new_asset/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src={{ asset('new_asset/timepicker/jquery.timepicker.min.js') }}" type="text/javascript"></script>
    <script>
        $('.carousel').carousel();
        $('#expert-time').timepicker();
        $('#expert-date').datepicker();
    </script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script>
        Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
Vue.http.options.emulateJSON = true;
Vue.http.interceptors.push((request, next) => {
    next((response) => {
    // modify response
    response.data = response.json()
  })
})
new Vue({
  el: 'body',

  data: {
    newBooking : {'name': '', 'email':'', 'phone': '', 'date': '', 'time': '', 'promo': ''},
    phoneapprove: false,
    dateapprove: false,

  },

  methods: {

  }

});

</script>
    </script>
  </body>
</html>{{ asset('new_asset/
