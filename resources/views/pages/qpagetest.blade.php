<!DOCTYPE html>
@extends('pages.app')
<?php use App\Testseriesquestion;?>

<?php
$_SESSION['index'] = 0;
?>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>NeetGuruMantra - Mock Test {{$mock_test_id}} of {{ $testseries->test_series_name}} Test series</title>
  <link rel="stylesheet" href="{{ URL::asset('css/web.css') }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script type="text/javascript"
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body onload="getQues()">

  <div id="starting">
    <!-- react-text: 2 -->
    <!-- /react-text -->
    <!-- react-text: 3 -->
    <!-- /react-text -->
    <div class="testTool_logoBlock"><img src="{{ URL::asset('home/v2/topprweb/images/logo.png') }}" alt="Neet-guru-mantra Logo" style="height: 35px; margin-top: 12.5px;"></div>
    <div class="testTool_sideBar testTool_sideBar-tillBottom js-sidebar">
      <div class="goalsList mt-15 testTool_goalList js-goals-list pl-30">
        <div class="testTool_sideBar_sHeading mb-20">Section</div>
        <div class="pr-30">
          <div  class="goalsList_goal goalsList_goal-small goalsList_goal-animate js-goal" data-goal_id="63829" data-progress="0">
        
            <div class="container">
  @foreach($subject as $sub)
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" id="toggle" href="#collapse1"><b>{{ strtoupper($sub->subject_name) }}</b></a>
        </h4>
      </div>
      <div  class="panel-collapse ">
        <?php
        $ques1=Testseriesquestion::where('test_series_id',$test_id)->where('mock_test_id',$mock_test_id)->where('subject_name',$sub->subject_name)->get();

 $totalques=Testseriesquestion::where('test_series_id',$test_id)->where('mock_test_id',$mock_test_id)->get();



          $items = array();
          foreach($totalques as $totques) {
          $items[] = $totques->id;
         
        

}





        ?>
        @foreach($ques1 as $ques)
        <div class="panel-footer">
          <button class="btn btn-success but" id="{{ $ques->id }}" onclick="review({{ $ques->id }})" value="" >Mark For Review</button>
<button class="btn btn-success but" onclick="getquesonbutton({{ $ques->id }})" value=" {{ $ques->id }}" >

          {{ $ques->id }}
</button>
          {{ strip_tags($ques->ques_exp)  }}

        </div>
        @endforeach
      </div>
    </div>
  </div>
  @endforeach
</div>
          </div>
        </div>
      </div>
     
    </div>
    <div>
      <div class="testTool_topBar">
        <div class="testTool_topBar_container cf">
       
          <div class="testTool_topBar_timer js-header-timer" style="display: block;">
            <div class="testTool_topBar_timer_title js-timer-title">Time Left</div>
            <div class="testTool_topBar_timer_val"  >
  

              <span class="" id="msg"></span>
             
              
          </div>
        
         
          <h1 class="testTool_topBar_title"></h1>
        </div>
      </div>
    </div>
    <div >
    <div class="testTool_contentArea js-content-area" >
      <div class="testTool_quesWrapper pv-60 js-ques-wrapper">
        <div class="ques_item fade-out js-question fade-in" id="ques-1" data-id="250772" data-style="single correct" data-solution-available="0" data-already-attempted="0" data-correctly-answered="0" data-seen="0" data-action="true" data-n-selected-choices="0">
          <div class="ques m-0 js-question-tile is-attempted is-correct" data-id="250772" data-style="single correct">
            <div class="ques_content">
              <form method="post" class="js-question-form">
                <div class="ques_header cf">
                  <div class="ques_header_num" style="padding-right:5px; font-size:20px;" id="quesid"></div>
                  <div class="" id="quesblock">


                  </div>
                  <div class="ques_header_id"></div>
                </div>
                <div class="ques_text apply-mathjax" >
                </div>
                <div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item">
                    <span class="ques_option_label fl">A</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px" id="optionA" class="" onclick="aselect()"></span></p>
                      </div>
                    </div>
             
                    <input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item">
                    <span class="ques_option_label fl">B</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px" id="optionB" class="" onclick="bselect()"></span></p>
                      </div>
                    </div>
                
                    <input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item">
                    <span class="ques_option_label fl">C</span>
                      <div class="ques_option_content">
                        <div class="ques_option_content_text">
                          <p><span style="font-size:18px" id="optionC" class="" onclick="cselect()"></span></p>
                        </div>
                      </div>
                      
                      <input type="checkbox" class="hide" name="choices" value="825133">
                      <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item">
                    <span class="ques_option_label fl">D</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px" id="optionD" class="" onclick="dselect()"></span></p>
                      </div>
                    </div>
                   
                    <input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                  
                      </div>
                  </div>
                </div>

               
            </div>
          </div>
        </div>  </form>
         <div class="row">
        <div class="col-md-12">
          <div class="col-md-4">
        <button class="btn btn-primary">Back</button>
          </div>
          <div class="col-md-2">
 
        </div>
      <div class="col-md-4">
          
      
    
    </div>
          <div class="col-md-2">
         <button class="btn btn-primary" onclick="getNextQues()">Next</button>
          </div>
</div>
</div>

      
    </div>
   
      
      
    </div>
    </div>
    <div class="testTool_qNav">
      
    </div>
    <div class="testTool_btmBar">

   

  </div>

    <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">"Report error for Question" <span id="myText"></span></h4>
        </div>
        <div class="modal-body">
         <form type="role" action="/submit_report" method="POST">
    <div class="form-group">
       <input type="hidden" class="form-control" id="myid" name="myid" value="" >
      <label for="usr">Heading:</label>
      <input type="text" class="form-control" id="heading" name="heading" required>
    </div>
    <div class="form-group">
      <label for="pwd">Description:</label>
      <textarea class="form-control" id="description" name="description" required></textarea>
    </div>
       <button class="btn btn-success">SUBMIT</button>
 <form>
  
        </div>
        <div class="modal-footer">


          
        </div>
      </div>
     
    </div>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.0.1/jquery-confirm.min.js"></script>


<!-- Bootstrap Core JavaScript -->
<script src="{{ asset('admin_assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/vue@2.5.13/dist/vue.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vue-resource@1.3.5"></script>
<script type="text/javascript">
setInterval(function(){  
 $.ajax({
               type:'GET',
               url:'/timercode',
               data:null,
               success:function(data){
                  $("#msg").html(data.msg);
               }
            }); }, 1000);

$(document).ready(function()
{
$('#toggle').on('click',function()
{
$('#collapse1').toggle(1000);
})

});


function getQues()
{

  var id= <?php echo $items[0]?>;
 
 $.ajax({
               type:'GET',
               url:'/getQues',
               data:{name:id},

               success:function(data){
                  $("#quesblock").html(data.ques);
                    $("#optionA").html(data.optionA);
                      $("#optionB").html(data.optionB);
                        $("#optionC").html(data.optionC);
                          $("#optionD").html(data.optionD);
                           $("#quesid").html(data.quesid);
               }
            });

}

function getquesonbutton(a)
{
  var id =a;
 
 $.ajax({
               type:'GET',
               url:'/getQues',
               data:{name:id},

               success:function(data){
                  $("#quesblock").html(data.ques);
                    $("#optionA").html(data.optionA);
                      $("#optionB").html(data.optionB);
                        $("#optionC").html(data.optionC);
                          $("#optionD").html(data.optionD);
                           $("#quesid").html(data.quesid);
               }
            });
}


function getNextQues()
{

  var id= <?php echo $items[$_SESSION['index']+1]?>;
alert(id);
 $.ajax({
               type:'GET',
               url:'/getQues',
               data:{name:id},

               success:function(data){
                  $("#quesblock").html(data.ques);
                    $("#optionA").html(data.optionA);
                      $("#optionB").html(data.optionB);
                        $("#optionC").html(data.optionC);
                          $("#optionD").html(data.optionD);
               }
            });


}
function dselect()
{
    $('#optionD').addClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').removeClass("solution_heading");
}
function aselect()
{
    $('#optionD').removeClass("solution_heading");
    $('#optionA').addClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').removeClass("solution_heading");
}
function bselect()
{
    $('#optionD').removeClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').addClass("solution_heading");
    $('#optionC').removeClass("solution_heading");
}
function cselect()
{
    $('#optionD').removeClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').addClass("solution_heading");  
}
function review(a)
{
if($("#"+a).text()=="Mark For Review")
{
$("#"+a).text('Marked For Review');
 $("#"+a).removeClass("btn btn-success");
 $("#"+a).addClass("btn btn-danger");  

}
else
{
$("#"+a).text('Mark For Review');
 $("#"+a).removeClass("btn btn-danger");
$("#"+a).addClass("btn btn-success");  
}
}

</script>

</body>
</html>
