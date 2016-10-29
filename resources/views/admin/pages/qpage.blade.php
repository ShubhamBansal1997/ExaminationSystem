<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/web.css')}}">
  <style>
    .difficulty-btn {
      background-color: rgb(85, 187, 234);
    }

    .difficulty-btn:hover {
      background-color: rgba(0, 0, 0, 0.1);
    }
  </style>
</head>

<body>
  <div class="testTool js-test-tool">
    <div class="testTool_contentArea js-content-area">
      <div class="testTool_quesWrapper pv-60 js-ques-wrapper">
        <div class="ques_item fade-out js-question fade-in" id="ques-1" data-id="250772" data-style="single correct" data-solution-available="0" data-already-attempted="0" data-correctly-answered="0" data-seen="0" data-action="" data-n-selected-choices="0">
          <div class="ques m-0 js-question-tile" data-id="250772" data-style="single correct">
            <div class="ques_content">
              <form method="post" class="js-question-form" onsubmit="return false;">
                <input type="hidden" name="question_id" value="250772">
                <input type="hidden" name="sequence_no" value="1">
                <div class="ques_header cf">
                  <div class="ques_header_num">1</div>
                  <div class="ques_header_vSeparator fl"></div>
                  <div class="ques_header_id">#250772</div>
                  <div class="fr cf">
                    <div class="coachmarks_tooltip hide js-tooltipDoubts"> <span class="fa fa-close fr coachmarks_tooltip_close js-coachmarkClose"></span> <span class="coachmarks_tooltip_content fl">Got a doubt in this question? Ask our subject experts!</span> </div>
                    <div class="coachmarks_tooltip_arrow hide cf js-tooltipDoubts"></div>
                    <div class="fl hide js-qheader-options">
                      <a class="ques_header_option q_tip js-report-error-btn" original-title="Report Error"> <i class="fa fa-warning"></i> </a>
                      <div class="ques_header_vSeparator fl"></div>
                      <a class="ques_header_option ask-doubt show js-ask-doubt-btn"> <i class="fa fa-question mr-10"></i><span class="phn-hide">Ask a doubt</span><span class="hide phn-inline">Doubt</span> </a>
                      <div class="ques_header_vSeparator fl"></div>
                    </div>
                    <a class="ques_header_option ques_bookmark q_tip js-ques-bookmark disable-text-select  -gat" data-ga-category="Practice" data-ga-action="Mark option" data-ga-label="250772" original-title="Bookmark"> <i class="fa fa-bookmark ques_bookmark_iconBookmark"></i> <i class="fa fa-spinner fa-spin ques_bookmark_iconSpinner"></i> </a>
                  </div>
                </div>
                <div class="ques_text apply-mathjax"> {!! $question->ques_exp !!}
                </div>
                <div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item " data-choice-id="825133"> <span class="ques_option_label fl">A</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text ">{!! $question->ques_ans1 !!}
                      </div>
                    </div>
                    <div class="ques_option_result"> <i class="fa fa-check-circle ques_option_result_iconCorrect"></i> <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div>
                    <input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item " data-choice-id="825134"> <span class="ques_option_label fl">B</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text ">{!! $question->ques_ans2 !!}
                      </div>
                    </div>
                    <div class="ques_option_result"> <i class="fa fa-check-circle ques_option_result_iconCorrect"></i> <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div>
                    <input type="checkbox" class="hide" name="choices" value="825134">
                    <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item " data-choice-id="825135"> <span class="ques_option_label fl">C</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text ">{!! $question->ques_ans3 !!}
                      </div>
                    </div>
                    <div class="ques_option_result"> <i class="fa fa-check-circle ques_option_result_iconCorrect"></i> <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div>
                    <input type="checkbox" class="hide" name="choices" value="825135">
                    <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item " data-choice-id="825136"> <span class="ques_option_label fl">D</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text ">{!! $question->ques_ans4 !!}
                      </div>
                    </div>
                    <div class="ques_option_result"> <i class="fa fa-check-circle ques_option_result_iconCorrect"></i> <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div>
                    <input type="checkbox" class="hide" name="choices" value="825136">
                    <div class="clr">
                      
                    </div>
              
                  </div>
                         
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="testTool_qNav">
      <a class="testTool_qNav_arrow testTool_qNav_arrow-left js-qnav-prev"><i class="fa fa-angle-left"></i></a>
      <a class="testTool_qNav_arrow testTool_qNav_arrow-right js-qnav-next"><i class="fa fa-angle-right"></i></a>
    </div>

    <div class="testTool_topBar">
      <div class="testTool_topBar_container cf">
        <button class="testTool_topBar_stateBtn -strk js-btn-finish-assessment" data-strk='{"e":"ui.tapped", "ui_element_name": "finish"}'>
          <i class="fa fa-pause"></i>
          <span class="testTool_topBar_stateBtn_text">Pause</span>
        </button>
        <button class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn" data-strk='{"e":"ui.tapped", "ui_element_name": "finish"}'>
          DIFFICULTY
        </button>
        <button class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn" data-strk='{"e":"ui.tapped", "ui_element_name": "finish"}'>
          EASY
        </button>

        <div class="testTool_topBar_timer hide js-header-timer">
          <div class="testTool_topBar_timer_title js-timer-title">Time Elapsed</div>
          <div class="testTool_topBar_timer_val">
            7:30
            <span class="js-test-timer-minutes">--</span> : <span class="js-test-timer-seconds">--</span>
          </div>
        </div>

        <h1 class="testTool_topBar_title">Friction — Practice</h1>
      </div>
    </div>

    <div class="testTool_logoBlock"><img src="/static/v2/images/web/toppr_logo@2x.png" alt="Toppr Logo" /></div>

    <div class="testTool_btmBar">
      <div class="testTool_btmBar_actionBtn testTool_btmBar_actionBtn_primary testTool_btmBar_actionBtn_primary-fullWidth js-primary-btn-bottom">Skip</div>
      <div class="testTool_btmBar_loadingView hide js-loading-view-bottom">
        <div class="loadingDots loadingDots-h15 ma testTool_btmBar_loadingView_dots">
          <span class="loadingDots_dot loadingDots_dot-d1"></span>
          <span class="loadingDots_dot loadingDots_dot-d2"></span>
          <span class="loadingDots_dot loadingDots_dot-d3"></span>
          <div class="clr"></div>
        </div>
      </div>

      <!-- <div class="table width-full">
  					<div class="table-row">
  						<div class="table-cell testTool_btmBar_actionBtn">Prev</div>
  						<div class="table-cell testTool_btmBar_actionBtn testTool_btmBar_actionBtn_primary js-btn-next-ques">Skip and Next</div>
  						<div class="table-cell testTool_btmBar_actionBtn">Next</div>
  					</div>
  				</div> -->
    </div>

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
                  <div class="goalsList_goal_progress_meter_fill js-meter-fill" style="width:0%;"></div>
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
                  <div class="goalsList_goal_progress_meter_fill js-meter-fill" style="width:0%;"></div>
                </div>
              </div>
            </div>
          </div>



          <div class="goalsList_goal goalsList_goal-small goalsList_goal-animate js-goal" id="goal-63831" data-goal_id="63831" data-progress="0">

            <div class="goalsList_goal_num goalsList_goal_num-small"><i class="fa fa-lock q_tip_s" original-title="This goal is locked"></i></div>

            <div class="goalsList_goal_content goalsList_goal_content-small">
              <div class="goalsList_goal_title goalsList_goal_title-small">Kinetic Friction</div>
              <div class="goalsList_goal_desc goalsList_goal_desc-small"></div>

              <div class="goalsList_goal_progress color-prog-0p js-progress">
                <div class="goalsList_goal_progress_val goalsList_goal_progress_val-small js-score">0%</div>
                <div class="goalsList_goal_progress_meter">
                  <div class="goalsList_goal_progress_meter_fill js-meter-fill" style="width:0%;"></div>
                </div>
              </div>
            </div>
          </div>


        </div>
      </div>

      <div class="testTool_sideBar_overlay js-sidebar-overlay"></div>
    </div>
<!--
    <div class="testTool_loadingView table js-loading-view">
      <div class="table-row">
        <div class="table-cell am">
          <div class="testTool_loadingView_modal p-20">
            <h2 class="h3 ac js-loading-title">Loading Questions</h2>
             <div class="loadingDots loadingDots-h10 ma mt-20 mb-10 js-loading-dots">
              <span class="loadingDots_dot loadingDots_dot-d1"></span>
              <span class="loadingDots_dot loadingDots_dot-d2"></span>
              <span class="loadingDots_dot loadingDots_dot-d3"></span>
              <div class="clr"></div>
            </div> 
          </div> 
        </div>
      </div>
    </div>
-->
  </div>

</body>

</html>
