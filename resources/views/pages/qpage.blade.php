<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ URL::asset('css/web.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script type="text/javascript" async
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
</head>
<body>
  <div data-reactroot="">
    <div class="testTool_logoBlock"><img src="http://www.neetgurumantra.com/v2/topprweb/images/logo_hor.png" alt="Neet-guru-mantra Logo" style="height: 35px; margin-top: 12.5px;"></div>
    <div class="testTool_sideBar testTool_sideBar-tillBottom js-sidebar">
      <div class="goalsList mt-15 testTool_goalList js-goals-list pl-30">
        <div class="testTool_sideBar_sHeading mb-20">Goals</div>
        <div class="pr-30">
          <div class="goalsList_goal goalsList_goal-small goalsList_goal-animate js-goal" id="goal-63829" data-goal_id="63829" data-progress="0">
            <div class="goalsList_goal_num goalsList_goal_num-small">1</div>
            <div class="goalsList_goal_content goalsList_goal_content-small">
              <div class="goalsList_goal_title goalsList_goal_title-small">Basics of Friction</div>
              <div class="goalsList_goal_desc goalsList_goal_desc-small"></div>
              <div class="goalsList_goal_progress color-prog-0p js-progress">
                <div class="goalsList_goal_progress_val goalsList_goal_progress_val-small js-score">0%</div>
                <div class="goalsList_goal_progress_meter">
                  <div class="goalsList_goal_progress_meter_fill js-meter-fill" style="width: 0%;"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="goalsList_goal goalsList_goal-small goalsList_goal-animate js-goal" id="goal-63830" data-goal_id="63830" data-progress="0">
            <div class="goalsList_goal_num goalsList_goal_num-small">2</div>
            <div class="goalsList_goal_content goalsList_goal_content-small">
              <div class="goalsList_goal_title goalsList_goal_title-small">Static Friction</div>
              <div class="goalsList_goal_desc goalsList_goal_desc-small"></div>
              <div class="goalsList_goal_progress color-prog-0p js-progress">
                <div class="goalsList_goal_progress_val goalsList_goal_progress_val-small js-score">0%</div>
                <div class="goalsList_goal_progress_meter">
                  <div class="goalsList_goal_progress_meter_fill js-meter-fill" style="width: 0%;"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="goalsList_goal goalsList_goal-small goalsList_goal-animate js-goal" id="goal-63831" data-goal_id="63831" data-progress="0">
            <div class="goalsList_goal_num goalsList_goal_num-small"><i class="fa fa-lock q_tip_s"></i></div>
            <div class="goalsList_goal_content goalsList_goal_content-small">
              <div class="goalsList_goal_title goalsList_goal_title-small">Kinetic Friction</div>
              <div class="goalsList_goal_desc goalsList_goal_desc-small"></div>
              <div class="goalsList_goal_progress color-prog-0p js-progress">
                <div class="goalsList_goal_progress_val goalsList_goal_progress_val-small js-score">0%</div>
                <div class="goalsList_goal_progress_meter">
                  <div class="goalsList_goal_progress_meter_fill js-meter-fill" style="width: 0%;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="testTool_sideBar_overlay js-sidebar-overlay"></div>
    </div>
    <div>
      <div class="testTool_topBar">
        <div class="testTool_topBar_container cf"><button class="testTool_topBar_stateBtn -strk js-btn-finish-assessment"><i class="fa fa-pause"></i><span class="testTool_topBar_stateBtn_text">Pause</span></button>
          <div class="testTool_topBar_timer js-header-timer" style="display: block;">
            <div class="testTool_topBar_timer_title js-timer-title">Time Elapsed</div>
            <div class="testTool_topBar_timer_val"><span class="js-test-timer-hours">1</span>
              <!-- react-text: 49 -->:
              <!-- /react-text --><span class="js-test-timer-minutes">2</span>
              <!-- react-text: 51 -->:
              <!-- /react-text --><span class="js-test-timer-seconds">57</span></div>
          </div><button class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn">@if($question->ques_level==1) EASY @elseif($question->ques_level==2) MEDIUM @else DIFFICULT @endif</button><button class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn">@if($question->ques_imp==1) IMPORTANT @endif</button>
          <h1 class="testTool_topBar_title"><!-- react-text: 56 -->Biological Classification<!-- /react-text --><!-- react-text: 57 --> — Practice<!-- /react-text --></h1></div>
      </div>
    </div>
    <div class="testTool_contentArea js-content-area">
      <div class="testTool_quesWrapper pv-60 js-ques-wrapper">
        <div class="ques_item fade-out js-question fade-in" id="ques-1" data-id="250772" data-style="single correct" data-solution-available="0" data-already-attempted="0" data-correctly-answered="0" data-seen="0" data-action="true" data-n-selected-choices="0">
          <div class="ques m-0 js-question-tile null is-correct" data-id="250772" data-style="single correct">
            <div class="ques_content">
              <form method="post" class="js-question-form">
                <div class="ques_header cf">
                  <div class="ques_header_num"></div>
                  <div class="ques_header_vSeparator fl"></div>
                  <div class="ques_header_id">
                    <!-- react-text: 68 -->#
                    <!-- /react-text -->
                    <!-- react-text: 69 -->1
                    <!-- /react-text -->
                  </div>
                </div>
                <div class="ques_text apply-mathjax">
                  {!! $question->ques_exp !!}
                </div>
                <div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item   " data-choice_id="<p><span style='font-size:18px'>(a), (b) and (d)</span></p> "><span class="ques_option_label fl">A</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px">{!! $question->ques_ans1 !!}</span></p>
                      </div>
                    </div>
                    <div class="ques_option_result">
                      <!-- react-text: 77 -->
                      <!-- /react-text --><i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                      <!-- react-text: 79 -->
                      <!-- /react-text --><i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div><input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                    <!-- react-text: 85 -->
                    <!-- /react-text -->
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item   " data-choice_id="<p><span style='font-size:18px'>(a) and (d)</span></p> "><span class="ques_option_label fl">B</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px">{!! $question->ques_ans2 !!}</span></p>
                      </div>
                    </div>
                    <div class="ques_option_result">
                      <!-- react-text: 91 -->
                      <!-- /react-text --><i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                      <!-- react-text: 93 -->
                      <!-- /react-text --><i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div><input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                    <!-- react-text: 99 -->
                    <!-- /react-text -->
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item   " data-choice_id="<p><span style='font-size:18px'>Only (d)</span></p> "><span class="ques_option_label fl">C</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px">{!! $question->ques_ans3 !!}</span></p>
                      </div>
                    </div>
                    <div class="ques_option_result">
                      <!-- react-text: 105 -->
                      <!-- /react-text --><i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                      <!-- react-text: 107 -->
                      <!-- /react-text --><i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div><input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                    <!-- react-text: 113 -->
                    <!-- /react-text -->
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item   " data-choice_id="<p><span style='font-size:18px'>(b), (c) and (d)</span></p> "><span class="ques_option_label fl">D</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px">{!! $question->ques_ans4 !!}</span></p>
                      </div>
                    </div>
                    <div class="ques_option_result">
                      <!-- react-text: 119 -->
                      <!-- /react-text --><i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                      <!-- react-text: 121 -->
                      <!-- /react-text --><i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div><input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                    <!-- react-text: 127 -->
                    <!-- /react-text -->
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div><button style="display: none;">Test</button><br><button type="button" class="btn" style="display: none; margin-top: 5px; padding: 10px 30px;">NEXT</button></div>
    </div>
    <div class="testTool_qNav"><a class="testTool_qNav_arrow testTool_qNav_arrow-left js-qnav-prev "><i class="fa fa-angle-left"></i></a><a class="testTool_qNav_arrow testTool_qNav_arrow-right js-qnav-next"><i class="fa fa-angle-right"></i></a></div>
    <div class="testTool_btmBar">
      <div class="testTool_btmBar_actionBtn testTool_btmBar_actionBtn_primary testTool_btmBar_actionBtn_primary-fullWidth js-primary-btn-bottom grey">Skip</div>
      <div class="testTool_btmBar_loadingView hide js-loading-view-bottom">
        <div class="loadingDots loadingDots-h15 ma testTool_btmBar_loadingView_dots"><span class="loadingDots_dot loadingDots_dot-d1"></span><span class="loadingDots_dot loadingDots_dot-d2"></span><span class="loadingDots_dot loadingDots_dot-d3"></span>
          <div class="clr"></div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
