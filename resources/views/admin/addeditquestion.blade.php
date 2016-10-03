@extends('admin.app')

@section('content')
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="row">
        <div class="col-md-12 portlets">
            <div class="panel">
                <h3><i class="icon-note"></i> <strong>Enter New Question-Biology</h3>
                  
        {!! Form::open(array('url' => 'admin/addques','role'=>'form')) !!}          
                    <div class="panel-content">
		                <div class="row">
        		            <div class="col-md-12">
                		        <div class="form-group">
                        		  <label>Chapter Name</label>
                          			<!-- <select class="form-control form-white" data-style="white" data-placeholder="Select a chapter..." name="chap_id" id="chap_id" value="{{ isset($question->id) ? $question->id : null }}" >
                          			@foreach(\App\Chapters::where('sub_id',$sub_id)->where('std',$std)->get() as $chapters)
			                            <option value="{{ $chapters->chap_id }}">{{ $chapters->chap_name }}</option>
			                        @endforeach   
			                          </select> -->
			                        </div>
			                        <h4>Question</h4>
			                        <textarea id="editor" name="ques_exp" value="{{ isset($question->ques_exp) ? $question->ques_exp : null }}" ></textarea>
									<!-- <h4>Answer1</h4>
									<textarea id="message" name="ques_ans1" value="{{ isset($question->ques_ans1) ? $question->ques_ans1 : null }}" ></textarea>
									<br />
									<h4>Answer2</h4>
									<textarea id="message" name="ques_ans2" value="{{ isset($question->ques_ans2) ? $question->ques_ans2 : null }}"></textarea>
									<br />
									<h4>Answer3</h4>
									<textarea id="message" name="ques_ans3" value="{{ isset($question->ques_ans3) ? $question->ques_ans3 : null }}" > </textarea>
									<br />
									<h4>Answer4</h4>
									<textarea id="message" name="ques_ans4" value="{{ isset($question->ques_ans4) ? $question->ques_ans4 : null }}"></textarea>
									<br />
									<div class="form-group">
									<label>Correct Anwser</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="ques_ans" id="ques_ans" value="{{ isset($question->ques_ans) ? $question->ques_ans : null }}">
			                            <option value="1">1</option>
			                            <option value="2">2</option>
			                            <option value="3">3</option>
			                            <option value="4">4</option>
			                          
			                          </select>
			                    	</div>

									<h4>Solution</h4>
									<textarea id="message" name="ques_sol" value="{{ isset($question->ques_sol) ? $question->ques_sol : null }}" ></textarea>
									<br />
									<div class="form-group">
									<label>Imp Ques</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="imp_ques" id="imp_ques" value="{{ isset($question->ques_imp) ? $question->ques_imp : null }}" required>
			                            <option value="1">Yes</option>
			                            <option value="0">No</option>
			                          
			                          </select>
			                        </div>
									<div class="form-group">
									<label>Ques Level</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="ques_level" id="ques_level" value="{{ isset($question->ques_level) ? $question->ques_level : null }}" required>
			                            <option value="1">Easy</option>
			                            <option value="2">Medium</option>
			                            <option value="3">Difficult</option>
			                          
			                          </select>
			                        </div> -->
									
									<button type="submit" name="submit" id="quessubmit" value="Submit" class="btn btn-lg btn-dark btn-rounded" data-style="expand-left">Submit</button>
									{!! Form::close() !!}



			                      
			                    
			                    
				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>
          
        <!-- END PAGE CONTENT -->
            
         
@endsection