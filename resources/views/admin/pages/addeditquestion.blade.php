@extends('admin.app')

@section('content')
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="row">
        <div class="col-md-12 portlets">
            <div class="panel">
                <h3><i class="icon-note"></i> <strong>{{ isset($question->ques_exp) ? "EDIT" : "ENTER" }} Question</h3>
                  
        {!! Form::open(array('url' => 'admin/addques','role'=>'form')) !!} 
               <div class="message">
                         
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                              <ul style="list-style: none;">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                                    
              </div>
              @if(Session::has('flash_message'))

              <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              {{ Session::get('flash_message') }}
              </div>
              @endif         
                    <div class="panel-content">
		                <div class="row">
        		            <div class="col-md-12">
                		        <div class="form-group">
                        		  <label>Chapter Name</label>
                          			<select class="form-control form-white" data-style="white" data-placeholder="Select a chapter..." name="chap_id" id="chap_id" value="{{ isset($question->id) ? $question->id : null }}" >
                          			@if(isset($chap_id))  
                              		<option value="{{$chap_id}}" selected >{{$chap_name}}</option>
                              		@endif
                          			@foreach(\App\Chapters::where('sub_id',$sub_id)->where('std',$std)->get() as $i=>$chapters)
                          				
			                            <option value="{{ $chapters->chap_id }}">{{ $chapters->chap_name }}</option>
			  
			                        @endforeach   
			                          </select> 
			                        </div>
			                        <h4>Question</h4>
			                        <textarea id="editor" name="ques_exp" value="" >{{ isset($question->ques_exp) ? $question->ques_exp : null }}</textarea>
			                        <br/>
									<h4>Answer1</h4>
									<textarea id="editor1" name="ques_ans1" value="" >{{ isset($question->ques_ans1) ? $question->ques_ans1 : null }}</textarea>
									<br />
									<h4>Answer2</h4>
									<textarea id="editor2" name="ques_ans2" value="">{{ isset($question->ques_ans2) ? $question->ques_ans2 : null }}</textarea>
									<br />
									<h4>Answer3</h4>
									<textarea id="editor3" name="ques_ans3" value="" >{{ isset($question->ques_ans3) ? $question->ques_ans3 : null }}</textarea>
									<br />
									<h4>Answer4</h4>
									<textarea id="editor4" name="ques_ans4" value="">{{ isset($question->ques_ans4) ? $question->ques_ans4 : null }}</textarea>
									<br />
									<div class="form-group">
									<label>Correct Anwser</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="ques_ans" id="ques_ans" value="">
			                            @if(isset($question->ques_ans))  
                              		<option value="{{$question->ques_ans}}" selected >{{$question->ques_ans}}</option>
                               			
                               			@endif
                               			<option value="1">1</option>
			                            <option value="2">2</option>
			                            <option value="3">3</option>
			                            <option value="4">4</option>
                            			 
			                          </select>
			                    	</div>

									<h4>Solution</h4>
									<textarea id="editor5" name="ques_sol" value="" >{{ isset($question->ques_sol) ? $question->ques_sol : null }}</textarea>
									<br />
									<div class="form-group">
									<label>Imp Ques</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="ques_imp" id="imp_ques" value="" required>
			                          @if(isset($question->ques_imp))  
                              		<option value="{{$question->ques_imp}}" selected >{{isset($question->ques_imp)==1?"YES":"NO"}}</option>
                              		@endif
                              		<option value="1">Yes</option>
			                            <option value="0">No</option>
                               
                            			
			                            
			                          </select>
			                        </div>
									<div class="form-group">
									<label>Ques Level</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="ques_level" id="ques_level" value="" required>
			                            @if(isset($question->ques_level))  
                              		<option value="{{$question->ques_level}}" selected >{{isset($question->ques_level)==1?"Easy":(isset($question->ques_level)?"Medium":"Difficult")}}</option>
                               			@endif
                               			<option value="1">Easy</option>
			                            <option value="2">Medium</option>
			                            <option value="3">Difficult</option>
                            			
			                          </select>
			                        </div> 
									<input value="{{ $sub_id }}" name="sub_id" hidden>
									<input value="{{ isset($question->ques_id) ? $question->ques_id:null }}" name="ques_id" hidden>
									<button type="submit" name="submit" id="quessubmit" value="Submit" class="btn btn-lg btn-dark btn-rounded" data-style="expand-left">{{ isset($question->ques_id) ? "Edit":"Submit" }}</button>
									{!! Form::close() !!}



			                      
			                    
			                    
				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>
          
        <!-- END PAGE CONTENT -->
            
         
@endsection