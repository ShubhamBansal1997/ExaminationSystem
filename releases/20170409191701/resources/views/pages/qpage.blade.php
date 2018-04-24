<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya:400,700">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/web.css')}}">
  <style>
    .difficulty-btn {
      background-color: rgb(85, 187, 234);
    }

    .testTool_topBar_timer {
      display: block;
      padding: 0 20px;
      margin: 0;
    }

    .pv-60 {
      padding-top: 25px;
    }

    .testTool_qNav_arrow {
      width: 70px;
      left: -75px;
    }

    /*
    .difficulty-btn:hover, .btn-active-dark {
      background-color: rgba(0, 0, 0,Medi 0.1);
    }
    */

    .btn-active-dark {
      background-color: rgba(0, 0, 0, 0.1);
    }

    .example-enter {
      opacity: 0.01;
    }

    .example-enter.example-enter-active {
      opacity: 1;
      transition: opacity 500ms ease-in;
    }

    .example-leave {
      opacity: 1;
    }

    .example-leave.example-leave-active {
      opacity: 0.01;
      transition: opacity 300ms ease-in;
    }



    @media only screen and (max-width: 550px) {
      .is-active {
        /*display: none !important;*/
      }
    }

    @media only screen and (max-width: 450px) {

      .js-btn-finish-assessment i.fa-pause {
        margin-right: 0;
      }

      .js-btn-finish-assessment span.testTool_topBar_stateBtn_text {
        display: none;
      }

      .testTool_topBar_container.cf, .testTool_topBar_timer.js-header-timer {
        margin: 0 !important;
      }

      .testTool_topBar_timer.js-header-timer {
        padding-right: 0 !important;
        padding-left: 5px !important;
      }

      .difficulty-btn {
        padding: 0 7.5px !important;
        font-size: 12.5px;
      }

      .md_footer.ph-40 {
        padding: 15px 5px;
      }
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>

<body>
  <div id="root"></div>


  <script type="text/javascript">
    //DOM loaded
    $(document).ready(function() {
      $.urlParam = function(name){
        var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
        return results[1] || 0;
      }


      window.subCode = $.urlParam('sub_id');
      window.chapCode = $.urlParam('chap_id');
      window.quesCat = $.urlParam('ques_cat');
      window.chapName = {{ $chap_name }};
      
      window.user_email = "{{ $email }}";
    });
  </script>
  <script type="text/javascript" src="{{ URL::asset('js/bundle.js') }}"></script>
</body>
</html>
