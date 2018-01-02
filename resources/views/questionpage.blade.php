<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link rel="stylesheet" href="{{ URL::asset('css/web.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
  <script type="text/javascript"
  src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-MML-AM_CHTML">
</script>
</head>
<style>
    @font-face { font-family: Lato, "sans-serif"; }
    .spinner {
      margin: auto;
      position: absolute;
      top: 0; left: 0; bottom: 0; right: 0;
    }
  </style>
<body >
<img class="spinner" src="https://i1.wp.com/cdnjs.cloudflare.com/ajax/libs/galleriffic/2.0.1/css/loader.gif" alt="Loading ..." v-show='loading==true'>

  <div id="starting">
    <!-- react-text: 2 -->
    <!-- /react-text -->
    <!-- react-text: 3 -->
    <!-- /react-text -->
    <div class="testTool_logoBlock"><img src="#" alt="Neet-guru-mantra Logo" style="height: 35px; margin-top: 12.5px;"></div>
    <div class="testTool_sideBar testTool_sideBar-tillBottom js-sidebar">
      <div class="goalsList mt-15 testTool_goalList js-goals-list pl-30">
        <div class="testTool_sideBar_sHeading mb-20">Goals</div>
        <div class="pr-30">

          <div v-for='currentQuestion in questions' class="goalsList_goal goalsList_goal-small goalsList_goal-animate js-goal" data-goal_id="63829" data-progress="0">
            <div class="goalsList_goal_num goalsList_goal_num-small">@{{{ currentQuestion.ques_id }}}</div>
            <div class="goalsList_goal_content goalsList_goal_content-small">
              <div class="goalsList_goal_title goalsList_goal_title-small">Question @{{{ currentQuestion.s_no + 1 }}}</div>
              <div class="goalsList_goal_desc goalsList_goal_desc-small"></div>
              <div class="goalsList_goal_progress color-prog-0p js-progress">
                <div class="goalsList_goal_progress_meter">
                  <div v-if="currentQuestion.ques_input === currentQuestion.ques_ans" class="goalsList_goal_progress_meter_fill js-meter-fill color-good" style="width: 100%;"></div>
                  <div v-else-if="currentQuestion.ques_input !== currentQuestion.ques_ans && currentQuestion.ques_input !== null" class="goalsList_goal_progress_meter_fill js-meter-fill color-bad" style="width: 100%;"></div>
                  <div v-else class="goalsList_goal_progress_meter_fill js-meter-fill color-prog-100p" style="width: 0%;"></div>
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
        <div class="testTool_topBar_container cf">
          <button class="testTool_topBar_stateBtn -strk js-btn-finish-assessment">
            <i class="fa fa-pause"></i>
            <span class="testTool_topBar_stateBtn_text">Pause</span>
          </button>
          <div class="testTool_topBar_timer js-header-timer" style="display: block;">
            <div class="testTool_topBar_timer_title js-timer-title">Time Elapsed</div>
            <div class="testTool_topBar_timer_val">
              <span class="js-test-timer-hours">1</span>
              <!-- react-text: 49 -->:
              <!-- /react-text --><span class="js-test-timer-minutes">1</span>
              <!-- react-text: 51 -->:
              <!-- /react-text --><span class="js-test-timer-seconds">59</span></div>
          </div>
          <button v-if='currentQuestion.ques_level==1' class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn">EASY</button>    
          <button v-else-if='currentQuestion.ques_level==2' class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn">MEDIUM</button>    
          <button v-else class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn">DIFFICULT</button>    
          <button v-if='currentQuestion.ques_imp==1' class="testTool_topBar_stateBtn -strk js-btn-finish-assessment difficulty-btn">IMPORTANT</button>
          <h1 class="testTool_topBar_title">@{{ basic.chap_name }}</h1>
        </div>
      </div>
    </div>
    <div v-for='currentQuestion in questions'>
    <div class="testTool_contentArea js-content-area" v-show='currentQuestion.s_no == questionIndex'>
      <div class="testTool_quesWrapper pv-60 js-ques-wrapper">
        <div class="ques_item fade-out js-question fade-in" id="ques-1" data-id="250772" data-style="single correct" data-solution-available="0" data-already-attempted="0" data-correctly-answered="0" data-seen="0" data-action="true" data-n-selected-choices="0">
          <div class="ques m-0 js-question-tile is-attempted is-correct" data-id="250772" data-style="single correct">
            <div class="ques_content">
              <form method="post" class="js-question-form">
                <div class="ques_header cf">
                  <div class="ques_header_num"></div>
                  <div class="ques_header_vSeparator fl"></div>
                  <div class="ques_header_id">@{{{ currentQuestion.ques_id }}}</div>
                </div>
                <div class="ques_text apply-mathjax" v-html='currentQuestion.ques_exp'>
                </div>
                <div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item"
                  v-on:click='attempt(1)'
                  v-bind:class="{ 'is-selected': selectans.ans1, 'is-correct': correctans.ans1, 'is-wrong': incorrectans.ans1 }">
                    <span class="ques_option_label fl">A</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px" v-html="currentQuestion.ques_ans1"></span></p>
                      </div>
                    </div>
                    <div class="ques_option_result">
                      <i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                      <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div>
                    <input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item" 
                    v-on:click='attempt(2)'
                    v-bind:class="{ 'is-selected': selectans.ans2, 'is-correct': correctans.ans2, 'is-wrong': incorrectans.ans2 }">
                    <span class="ques_option_label fl">B</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px" v-html='currentQuestion.ques_ans2'></span></p>
                      </div>
                    </div>
                    <div class="ques_option_result">
                      <i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                      <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div>
                    <input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item"
                    v-on:click='attempt(3)'
                    v-bind:class="{ 'is-selected': selectans.ans3, 'is-correct': correctans.ans3, 'is-wrong': incorrectans.ans3 }">
                    <span class="ques_option_label fl">C</span>
                      <div class="ques_option_content">
                        <div class="ques_option_content_text">
                          <p><span style="font-size:18px" v-html="currentQuestion.ques_ans3"></span></p>
                        </div>
                      </div>
                      <div class="ques_option_result">
                        <i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                        <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                        <div class="ques_option_result_text">Your Answer</div>
                        <div class="clr"></div>
                      </div>
                      <input type="checkbox" class="hide" name="choices" value="825133">
                      <div class="clr"></div>
                  </div>
                  <div class="ques_option is-clickable apply-mathjax js-ques-list-option-item"
                    v-on:click='attempt(4)'
                    v-bind:class="{ 'is-selected': selectans.ans4, 'is-correct': correctans.ans4, 'is-wrong': incorrectans.ans4 }">
                    <span class="ques_option_label fl">D</span>
                    <div class="ques_option_content">
                      <div class="ques_option_content_text">
                        <p><span style="font-size:18px" v-html='currentQuestion.ques_ans4'></span></p>
                      </div>
                    </div>
                    <div class="ques_option_result">
                      <i class="fa fa-check-circle ques_option_result_iconCorrect"></i>
                      <i class="fa fa-times-circle ques_option_result_iconWrong"></i>
                      <div class="ques_option_result_text">Your Answer</div>
                      <div class="clr"></div>
                    </div>
                    <input type="checkbox" class="hide" name="choices" value="825133">
                    <div class="clr"></div>
                    <div class="solution_text_container js-solution-text" v-show='currentQuestion.ques_input!=null'>
                        <div class="solution_heading">Solution</div>
                        <div class="js-solution-content">
                          <div class="testTool_qSolution_text solution_text apply-mathjax" v-html='currentQuestion.ques_sol'></div>
                        </div>
                      </div>
                  </div>
                </div>
               </form>
            </div>
          </div>
        </div>
        <button style="display: none;">Test</button><br>
        <button type="button" class="btn" style="display: none; margin-top: 5px; padding: 10px 30px;">NEXT</button></div>
    </div>
    </div>
    <div class="testTool_qNav">
      <a class="testTool_qNav_arrow testTool_qNav_arrow-left js-qnav-prev "><i class="fa fa-angle-left"></i></a>
      <a class="testTool_qNav_arrow testTool_qNav_arrow-right js-qnav-next"><i class="fa fa-angle-right"></i></a>
    </div>
    <div class="testTool_btmBar">
      <div v-if='bottombutton.nextgrey==true' v-on:click='next()' class="testTool_btmBar_actionBtn testTool_btmBar_actionBtn_primary testTool_btmBar_actionBtn_primary-fullWidth js-primary-btn-bottom grey">Next</div>
      <div class="testTool_btmBar_actionBtn testTool_btmBar_actionBtn_primary testTool_btmBar_actionBtn_primary-fullWidth js-primary-btn-bottom"
        v-else-if='bottombutton.submit==true' 
        v-on:click='submit_question_request()'>SUBMIT</div>
      <div class="testTool_btmBar_loadingView hide js-loading-view-bottom">
        <div class="loadingDots loadingDots-h15 ma testTool_btmBar_loadingView_dots">
        <span class="loadingDots_dot loadingDots_dot-d1"></span>
        <span class="loadingDots_dot loadingDots_dot-d2"></span>
        <span class="loadingDots_dot loadingDots_dot-d3"></span>
          <div class="clr"></div>
        </div>
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
<script>
Vue.http.headers.common['X-CSRF-TOKEN'] = $("#token").attr("value");
new Vue({
  el: '#starting',
  delimiters: ['@{{{', '}}}'],

  data: {
    currentQuestion: {},
    questionIndex: 0,
    email: 'shubhambansal17@hotmail.com',
    questions: {},
    question: {},
    question_attempt: {},
    basic: {},
    selectans: {'ans1':false, 'ans2':false, 'ans3':false, 'ans4':false},
    correctans: {'ans1':false, 'ans2':false, 'ans3':false, 'ans4':false},
    incorrectans: {'ans1':false, 'ans2':false, 'ans3':false, 'ans4':false},
    bottombutton: {'nextgrey':true, 'submit':false,'nextsubmit':false},
    selected_ans: null,
    loading: false,
  },
  mounted: function(){
    this.getQuestions();
  },
  methods: {
    getQuestions: function() {
      self = this;
      this.loading = true;
      this.$http.get('/questions')
          .then((response) => {
            this.questions = response.data.data;
            this.basic = response.data.basic;
            this.loading = false;
            this.analyze();
          })
          .catch((err) => {
            console.log(err);
            this.loading = false;
          });
    },
    analyze: function(){
      if(this.questions[this.questionIndex].ques_input!=null){
        this.attempt(this.questions[this.questionIndex].ques_input);
        this.submit_question();
      }
    },
    next: function() {
      console.log(this.questions.length);
      console.log(this.questionIndex);
      if(this.questions.length > this.questionIndex+1){
        this.$nextTick(function() {
                      MathJax.Hub.Queue(["Typeset", MathJax.Hub]);
                  });
        this.selectans =  {'ans1':false, 'ans2':false, 'ans3':false, 'ans4':false},
        this.correctans = {'ans1':false, 'ans2':false, 'ans3':false, 'ans4':false},
        this.incorrectans = {'ans1':false, 'ans2':false, 'ans3':false, 'ans4':false},
        this.bottombutton = {'nextgrey':true, 'submit':false, 'nextsubmit':false},
        this.questionIndex++;
        this.analyze();
      }
      
    },
    // Go to previous question
    prev: function() {
      this.questionIndex--;
    },
    correct: function(index) {
      return true;
    },
    attempt: function(index) {
        if(this.questions[this.questionIndex].ques_input===null){
        this.selectans = {'ans1':false, 'ans2':false, 'ans3':false, 'ans4':false};
        this.bottombutton =  {'nextgrey':true, 'submit':false,'nextsubmit':false};
        if(index===1){
          this.selectans.ans1 = true;
          this.selected_ans = 1;
        }
        else if(index===2){
          this.selectans.ans2 = true;
          this.selected_ans = 2;
        }
        else if(index===3){
          this.selectans.ans3 = true;
          this.selected_ans = 3;
        }else{
          this.selectans.ans4 = true;
          this.selected_ans = 4;
        }
        this.bottombutton =  {'nextgrey':false, 'submit':true,'nextsubmit':false};
      }
    },
    submit_question_request: function(){
      this.questions[this.questionIndex].ques_input = this.selected_ans;
      if(this.questions[this.questionIndex].ques_ans!==this.selected_ans)
        var ques_status = 'correct';
      else
        var ques_status = 'incorrect';
      var data = {
        'ques_id': this.questions[this.questionIndex].ques_id,
        'ques_input': this.selected_ans,
        'sub_id': this.questions[this.questionIndex].sub_id,
        'chap_id': this.questions[this.questionIndex].chap_id,
        'ques_cat': this.questions[this.questionIndex].ques_cat,
        'user_email': this.questions[this.questionIndex].email,
        'ques_status': ques_status,
      };
      this.loading = true;
      this.$http.post('/submit_question',data)
          .then((response) => {
            
            this.submit_question();
          })
          .catch((err) => {
            this.loading = false;
            console.log(err);
          });
    },
    submit_question: function(){
      var index = this.selected_ans;
      if(this.questions[this.questionIndex].ques_ans!==this.selected_ans){
        if(index===1){
          this.incorrectans.ans1 = true;
        }
        else if(index===2){
          this.incorrectans.ans2 = true;
        }
        else if(index===3){
          this.incorrectans.ans3 = true;
        }else{
          this.incorrectans.ans4 = true;
        }
      }
      index = this.questions[this.questionIndex].ques_ans;
      if(index===1){
        this.correctans.ans1 = true;
      }
      else if(index===2){
        this.correctans.ans2 = true;
      }
      else if(index===3){
        this.correctans.ans3 = true;
      }else{
        this.correctans.ans4 = true;
      }
      this.bottombutton =  {'nextgrey':true, 'submit':true, 'nextsubmit':false};
      this.loading = false;


    }


  }

});

</script>
</body>
</html>
