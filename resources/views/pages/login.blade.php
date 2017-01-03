
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <meta name="description" content="Materialize is a Material Design Admin Template,It's modern, responsive and based on Material Design by Google. ">
  <meta name="keywords" content="materialize, admin template, dashboard template, flat admin template, responsive admin template,">
  <title>Login | Neetgurumantra</title>

  <!-- Favicons-->
  <link rel="icon" href="{{ asset('home_asset/images/favicon/favicon-32x32.png') }}" sizes="32x32">
  <!-- Favicons-->
  <link rel="apple-touch-icon-precomposed" href="{{ asset('home_asset/images/favicon/apple-touch-icon-152x152.png') }}">
  <!-- For iPhone -->
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="{{ asset('home_asset/images/favicon/mstile-144x144.png') }}">
  <!-- For Windows Phone -->


  <!-- CORE CSS-->
  
  <link href="{{ asset('home_asset/css/materialize.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('home_asset/css/style.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
    <!-- Custome CSS-->    
    <link href="{{ asset('home_asset/css/custom/custom.min.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('home_asset/css/layouts/page-center.css') }}" type="text/css" rel="stylesheet" media="screen,projection">

  <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->
  <link href="{{ asset('home_asset/js/plugins/prism/prism.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="{{ asset('home_asset/js/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" type="text/css" rel="stylesheet" media="screen,projection">
  
</head>

<body class="cyan">
  <!-- Start Page Loading -->
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <!-- End Page Loading -->



  <div id="login-page" class="row">
    <div class="col s12 z-depth-4 card-panel">
      <form action="{{ URL::to('login') }}" method="post" class="login-form">
        <div class="card red lighten-5">
        @if (count($errors) > 0)
          <div class="card-content red-text">
            <ul style="list-style: none;">
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
              </ul>
            <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span></button>
              
          </div>
        @endif
        </div>
        @if(Session::has('flash_message'))
        <div class="card red lighten-5">
          <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">x</span></button>
              {{ Session::get('flash_message') }}
        </div>
        @endif
        {{ csrf_field() }}
        <div class="row">
          <div class="input-field col s12 center">
            <img src="{{ asset('home_asset/images/login-logo.png') }}" alt="" class="circle responsive-img valign profile-image-login">
            <p class="center login-form-text">Neetgurumantra</p>
          </div>
        </div>
        <div class="row margin">
          <div class="input-field col s12">
            <i class="mdi-action-perm-phone-msg prefix"></i>
            <input id="mobile" type="text" name="mobile">
            <label for="mobile" class="center-align">Mobile(10 digit)</label>
          </div>
        </div>
        <div class="row">          
          <div class="input-field col s12 m12 l12  login-text">
              <input type="checkbox" id="remember-me" />
              <label for="remember-me">Remember me</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <button type="submit" class="btn waves-effect waves-light col s12">Login</a>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6 m6 l6">
            <p class="margin medium-small"><a href="{{ URL::to('register') }}">Register Now!</a></p>
          </div>
                    
        </div>

      </form>
    </div>
  </div>
  



  <!-- ================================================
    Scripts
    ================================================ -->

  <!-- jQuery Library -->
  <script type="text/javascript" src="{{ asset('home_asset/js/plugins/jquery-1.11.2.min.js') }}"></script>
  <!--materialize js-->
  <script type="text/javascript" src="{{ asset('home_asset/js/materialize.min.js') }}"></script>
  <!--prism-->
  <script type="text/javascript" src="{{ asset('home_asset/js/plugins/prism/prism.js') }}"></script>
  <!--scrollbar-->
  <script type="text/javascript" src="{{ asset('home_asset/js/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  
      <!--plugins.js - Some Specific JS codes for Plugin Settings-->
    <script type="text/javascript" src="{{ asset('home_asset/js/plugins.min.js') }}"></script>
    <!--custom-script.js - Add your own theme custom JS-->
    <script type="text/javascript" src="{{ asset('home_asset/js/custom-script.js') }}"></script>

</body>

</html>