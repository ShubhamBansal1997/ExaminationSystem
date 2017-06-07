@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">{{ isset($question->ques_exp) ? "EDIT" : "ENTER" }} Question</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Question Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! Form::open(array('url' => 'admin/addques','role'=>'form')) !!}

                                            {!! csrf_field() !!}
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

                                    <div class="form-group">

                                            <label>Chapter Name</label>
                                            <select class="form-control" data-style="white" data-placeholder="Select a chapter..." name="chap_id" id="chap_id" value="{{ isset($question->id) ? $question->id : null }}" >
		                          			@if(isset($chap_id))
		                              		<option value="{{$chap_id}}" selected >{{$chap_name}}</option>
		                              		@endif
		                          			@foreach(\App\Chapters::where('sub_id',$sub_id)->where('std',$std)->get() as $i=>$chapters)

					                            <option value="{{ $chapters->chap_id }}">{{ $chapters->chap_name }}</option>

					                        @endforeach
					                          </select>
                                    </div>

                                        <div class="form-group">
                                            <label>Question</label>
                                            <textarea class="form-control" id="editor" name="ques_exp" value="" >{{ isset($question->ques_exp) ? $question->ques_exp : null }}</textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Answer1</label>
                                            <textarea id="editor1" class="form-control" name="ques_ans1" value="" >{{ isset($question->ques_ans1) ? $question->ques_ans1 : null }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer2</label>
                                            <textarea id="editor2" class="form-control" name="ques_ans2" value="" >{{ isset($question->ques_ans2) ? $question->ques_ans2 : null }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer3</label>
                                            <textarea id="editor3" class="form-control" name="ques_ans3" value="" >{{ isset($question->ques_ans3) ? $question->ques_ans3 : null }}</textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer4</label>
                                            <textarea id="editor4" class="form-control" name="ques_ans4" value="" >{{ isset($question->ques_ans4) ? $question->ques_ans4 : null }}</textarea>
                                        </div>
                                        <div class="form-group">
                                        	<label>Correct Answer</label>
					                          <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_ans" id="ques_ans" value="">
					                            @if(isset($question->ques_ans))
		                              		<option value="{{$question->ques_ans}}" selected >{{$question->ques_ans}}</option>

		                               			@endif
		                               			<option value="1">1</option>
					                            <option value="2">2</option>
					                            <option value="3">3</option>
					                            <option value="4">4</option>

					                          </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Solution</label>
                                            <textarea id="editor5" class="form-control" name="ques_sol" value="" >{{ isset($question->ques_sol) ? $question->ques_sol : null }}</textarea>

                                        </div>
                                  <div class="form-group">
                                    <label>Imp Ques</label>
					                          <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_imp" id="imp_ques" value="" required>
					                          @if(isset($question->ques_imp))
		                              		<option value="{{$question->ques_imp}}" selected >@if($question->ques_imp==1)
		                              					{{ "Yes" }}
		                            				@else
		                              					{{ "No" }}
		                            				@endif</option>
		                              		@endif
		                              		<option value="1">Yes</option>
					                            <option value="0">No</option>
					                          </select>
                                  </div>

                                  <div class="form-group">
                                    <label>Assertion and Reason</label>
                                    <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_ar" id="ques_ar" value="" required>
                                    @if(isset($question->ques_ar))
                                      <option value="{{$question->ques_ar}}" selected >@if($question->ques_ar==1)
                                            {{ "Yes" }}
                                        @else
                                            {{ "No" }}
                                        @endif
                                        </option>
                                      @endif
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Imp Ques</label>
                                    <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_imp" id="imp_ques" value="" required>
                                    @if(isset($question->ques_imp))
                                      <option value="{{$question->ques_imp}}" selected >@if($question->ques_imp==1)
                                            {{ "Yes" }}
                                        @else
                                            {{ "No" }}
                                        @endif</option>
                                      @endif
                                      <option value="1">Yes</option>
                                      <option value="0">No</option>
                                    </select>
                                  </div>

                                        <div class="form-group">
                                        	<label>Ques Level</label>
					                          <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_level" id="ques_level" value="" required>
					                            @if(isset($question->ques_level))
		                              		<option value="{{$question->ques_level}}" selected >@if($question->ques_level==1)
		                            				{{ "Easy" }}
		                            				@elseif($question->ques_level==2)
		                            				{{ "Medium" }}
		                            				@else
		                            				{{ "Difficult" }}
		                            				@endif</option>
		                               			@endif
		                               			<option value="1">Easy</option>
					                            <option value="2">Medium</option>
					                            <option value="3">Difficult</option>

			                          			</select>

                                        </div>

                                        <input value="{{ $sub_id }}" name="sub_id" hidden>
										<input value="{{ isset($question->ques_id) ? $question->ques_id:null }}" name="ques_id" hidden>

                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary">{{ isset($question->ques_id) ? "Edit":"Submit" }}</button>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                                <!-- /.col-lg-6 (nested) -->

                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection

@section('script')
<script type="text/javascript">
     CKEDITOR.replace( 'editor' );
</script>
<script type="text/javascript">
     CKEDITOR.replace( 'editor1' );
</script>
<script type="text/javascript">
     CKEDITOR.replace( 'editor2' );
</script>
<script type="text/javascript">
     CKEDITOR.replace( 'editor3' );
</script>
<script type="text/javascript">
     CKEDITOR.replace( 'editor4' );
</script>
<script type="text/javascript">
     CKEDITOR.replace( 'editor5' );
</script>
@endsection

