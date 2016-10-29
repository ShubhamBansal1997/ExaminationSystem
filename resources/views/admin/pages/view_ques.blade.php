@extends('admin.app')

@section('content')
<!-- BEGIN PAGE CONTENT -->
<div class="page-content">
    <div class="row">
        <div class="col-md-12 portlets">
            <div class="panel">
                <h3><i class="icon-note"></i> <strong>Enter New Question-Biology</h3>
                  
        {!! Form::open(array('url' => 'admin/viewques','role'=>'form')) !!} 
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
                          			@foreach(\App\Chapters::where('sub_id',$sub_id)->where('std',$std)->get() as $chapters)
			                            <option value="{{ $chapters->chap_id }}">{{ $chapters->chap_name }}</option>
			                        @endforeach   
			                          </select> 
			                        </div>
			                        <br />
									<div class="form-group">
									<label>Imp Ques</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="ques_imp" id="imp_ques" value="{{ isset($question->ques_imp) ? $question->ques_imp : null }}" required>
			                            <!-- <option>ALL</option> -->
			                            <option value="NULL">All</option>
			                            <option value="1">Yes</option>
			                            <option value="0">No</option>
			                          
			                          </select>
			                        </div>
									<div class="form-group">
									<label>Ques Level</label>
			                          <select class="form-control form-white" data-style="white" data-placeholder="Select a correct answer" name="ques_level" id="ques_level" value="{{ isset($question->ques_level) ? $question->ques_level : null }}" required>
			                            <!-- <option>All</option> -->
			                            <option value="NULL">All</option>
			                            <option value="1">Easy</option>
			                            <option value="2">Medium</option>
			                            <option value="3">Difficult</option>
			                          
			                          </select>
			                        </div> 
									<input value="{{ $sub_id }}" name="sub_id" hidden>
									<input value="{{ $std }}" name="std" hidden>
									<button type="submit" name="submit" id="quessubmit" value="Submit" class="btn btn-lg btn-dark btn-rounded" data-style="expand-left">Submit</button>
									{!! Form::close() !!}



			                      
			                    
			                    
				                  </div>
				                </div>
				              </div>
				            </div>
				          </div>
          
        <!-- END PAGE CONTENT -->
            
         
@endsection