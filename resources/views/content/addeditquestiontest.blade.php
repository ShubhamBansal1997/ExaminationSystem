@extends('content.app')
@section('content')
           <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">EDIT Question</h1>
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
                        <form method="get" role="form" action="{{URL:: to('content/updatequestiontest')}}/{{$question->id}}">
                    
                            
                        <div class="message">


          						  </div>
        				

  <div class="form-group">

                                            <label>Subject Name</label>
                                            <select class="form-control" required data-style="white" name="subject_name">
                                    <option value="{{$question->subject_name}}">{{$question->subject_name}}</option>
                                    @foreach(\App\Testseriessubject::where('test_series_id',"1")->get() as $i)

                                      <option value="{{$i->subject_name}}">{{ strtoupper($i->subject_name) }}</option>

                                  @endforeach
                                    </select>
                                    </div>
  <div class="form-group">

                                            <label>Mock Test Number</label>
                                            <select class="form-control" required data-style="white" name="mock_test_id" >
                                    <option value="{{$question->mock_test_id}}">{{$question->mock_test_id}}</option>
                                      
                                        <option value="1">1</option>

                                  <option value="2">2</option>

                                  <option value="3">3</option>

                                  <option value="4">4</option>

                                  <option value="5">5</option>

                                
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
                                

                               


                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                   </form>
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

