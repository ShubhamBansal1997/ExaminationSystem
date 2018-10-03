<!DOCTYPE html>

<?php use App\Testseriesquestion;

?>

<?php
session_start();


?>
<html lang="en">
<head>
  <title>NeetGuruMantra Online Test</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
  .body
  {
    background-color: #FFFFFF;
  }
  .navbar
  {
    
    overflow: hidden;
   
  }
.white
{
  color:white;
}
.navbar-inverse .navbar-nav>li>a {
    color: #FFFFFF;
}
.navbar-inverse .navbar-brand {
    color: #FFFFFF;
}
.navbar-inverse .navbar-nav>.open>a, .navbar-inverse .navbar-nav>.open>a:focus, .navbar-inverse .navbar-nav>.open>a:hover {
    color: #fff;
    background-color: #55BBEA;
}
.navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
    color: #FFFFFF;
}
.dropdown-menu {
 
    background-color: #55BBEA;
  
}
.navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
   background-color: #55BBEA;
}

.outer-container
{
  padding:0px 0px 0px 0px;

     border-radius: 5px;
  border: 1px solid #d8d8d8;
  

}
.padding-top
{
 padding: 5px;
 
}
.ques_option 
{
display: block;
    position: relative;
    padding: 20px 18px;
    border-top: 1px solid #d8d8d8;
  
}
.width
{
   width:600px;
}

  </style>
</head>
<body class="body">
<?php

?>
<nav class="navbar navbar-inverse" style="background-color:#55BBEA; border:none;">
  <div class="container-fluid">
    <div class="navbar-header">
       <button type="button" class="navbar-toggle white" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
  <span class="glyphicon glyphicon-user white navbar-brand white">Time</span><a class="navbar-brand white" href="#" id="msg"></a>
    </div>
<div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
    
      <li class="dropdown"><a class="dropdown-toggle white" style="text-color:white;" data-toggle="dropdown" href="#">Chemistry<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Marked For review</a></li>
          <li><a href="#">Unattempted</a></li>
          <li><a href="#">Attempted</a></li>
           <li><a href="#">All</a></li>
        </ul>
      </li>
      
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li></li>
      <li><a href="#"><span class="white" id=""></span> </a></li>
    </ul>
  </div></div>
</nav>

<div class="container" style="padding:25px;height:75%;width:75%;">

 
<div class="col-md-8 outer-container" style="height:350px;width:600px;">
      <div class="container" >
        <div class="row padding-top">
          <div class="col-md-2 ">
            <?php echo  $_SESSION['index'];?>
          </div>
          <div class="col-md-2 ">
         Subject information
          </div>

        </div>
        <div class="row width ">
          <div class="col-md-12 ques_option">
            Question
          </div>

        </div>
        <div class="row width ">
          <div class="col-md-12  ques_option">
            option A
          </div>
         

        </div>
        <div class="row width">
          <div class="col-md-12 ques_option">
          option b
          </div>
         
        </div>
        <div class="row width ">
          <div class="col-md-12 ques_option">
          option c
          </div>
         </div>
      
        <div class="row width ">
          <div class="col-md-12 ques_option">
          option d
          </div>
         
        


      </div>



</div></div>
<div class="col-md-4" >
dfvsd
</div>





</div>
<div class="container">
  <div class="col-md-1">
  </div>
  <div class="col-md-2">
   <a href="{{ URL::to('/prev') }}"> <button class="btn btn-primary" href="#">Previous</button></a>
  </div>
  <div class="col-md-2">
 <a href="{{ URL::to('/next') }}">     <button class="btn btn-success" href="#">Next</button></a>
  </div>
    <div class="col-md-2">
     <button class="btn btn-danger">Mark For Review</button>
  </div>

</div>






</body>
</html>








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
   if((data.attempt)=="A")
                           {
                            aselect();
                           }
                           else if((data.attempt)=="B")
                           {
                            bselect();
                           }
                          else  if((data.attempt)=="C")
                           {
                            cselect();
                           }
                         else   if((data.attempt)=="D")
                           {
                            dselect();
                           }
else {
      $('#optionD').removeClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').removeClass("solution_heading"); 
}
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
  if((data.attempt)=="A")
                           {
                            aselect();
                           }
                           else if((data.attempt)=="B")
                           {
                            bselect();
                           }
                          else  if((data.attempt)=="C")
                           {
                            cselect();
                           }
                         else   if((data.attempt)=="D")
                           {
                            dselect();
                           }
else {
      $('#optionD').removeClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').removeClass("solution_heading"); 
}
               }
            });
}


function dselect()
{
    $('#optionD').addClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').removeClass("solution_heading");
var id =$("#quesid").text();
 $.ajax({
               type:'GET',
               url:'/submitAns',
               data:{name:id,data:"D"},

               success:function(data){
                  

               }
            });
  

}
function aselect()
{
    $('#optionD').removeClass("solution_heading");
    $('#optionA').addClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').removeClass("solution_heading");
    var id =$("#quesid").text();
 $.ajax({
               type:'GET',
               url:'/submitAns',
               data:{name:id,data:"A"},

               success:function(data){
                  

               }
            });
}
function bselect()
{
    $('#optionD').removeClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').addClass("solution_heading");
    $('#optionC').removeClass("solution_heading");
    var id =$("#quesid").text();
 $.ajax({
               type:'GET',
               url:'/submitAns',
               data:{name:id,data:"B"},

               success:function(data){
                  

               }
            });
}
function cselect()
{
    $('#optionD').removeClass("solution_heading");
    $('#optionA').removeClass("solution_heading");
    $('#optionB').removeClass("solution_heading");
    $('#optionC').addClass("solution_heading");  
    var id =$("#quesid").text();
 $.ajax({
               type:'GET',
               url:'/submitAns',
               data:{name:id,data:"C"},

               success:function(data){
                  

               }
            });
}
function review(a)
{
  var id = a;
if($("#"+a).text()=="Mark For Review")
{
$("#"+a).text('Marked For Review');
 $("#"+a).removeClass("btn btn-success");
 $("#"+a).addClass("btn btn-danger");  
 $.ajax({
               type:'GET',
               url:'/markforreview',
               data:{name:id},

               success:function(data){
                 
               }
            });
}
else
{
$("#"+a).text('Mark For Review');
 $("#"+a).removeClass("btn btn-danger");
$("#"+a).addClass("btn btn-success");  
$.ajax({
               type:'GET',
               url:'/unmarkforreview',
               data:{name:id},

               success:function(data){
               
               }
            });
}
}

</script>

</body>
</html>
