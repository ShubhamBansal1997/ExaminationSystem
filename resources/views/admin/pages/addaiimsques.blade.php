@extends('admin.app')
@section('content')
           <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                  <h1 class="page-header">ENTER Question</h1>
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
                              {!! Form::open(array('url' => 'admin/addaiimsques','role'=>'form','method'=>'get')) !!}

                                      {!! csrf_field() !!}
                        <div class="message">

                  				@if (count($errors) > 0)
                      	<div class="alert alert-danger">
                       		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            						    <span aria-hidden="true">&times;</span>
                          </button>
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

                                            <label>Subject Name</label>
                                            <select class="form-control" required data-style="white" name="subject_name">
		                          			<option value="">Select Subject</option>
		                          			@foreach(\App\Testseriessubject::where('test_series_id',"2")->get() as $i)

					                            <option value="{{$i->subject_name}}">{{ strtoupper($i->subject_name) }}</option>

					                        @endforeach
					                          </select>
                                    </div>


  <div class="form-group">

                                            <label>Select Mock Test Number</label>
                                            <select class="form-control" required data-style="white" name="mock_test_id" >
                                    <option value="">Mock Test Number</option>
                                        <option value="1">1</option>

                                  <option value="2">2</option>

                                  <option value="3">3</option>

                                  <option value="4">4</option>

                                  <option value="5">5</option>

                                
                                    </select>
                                    </div>





                                        <div class="form-group">
                                            <label>Question</label>
                                            <textarea class="form-control" id="editor" name="ques_exp"  required></textarea>

                                        </div>
                                        <div class="form-group">
                                            <label>Answer1</label>
                                            <textarea id="editor1" class="form-control" name="ques_ans1"  required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer2</label>
                                            <textarea id="editor2" class="form-control" name="ques_ans2"  required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer3</label>
                                            <textarea id="editor3" class="form-control" name="ques_ans3" required ></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Answer4</label>
                                            <textarea id="editor4" class="form-control" name="ques_ans4" required ></textarea>
                                        </div>
                                        <div class="form-group">
                                        	<label>Correct Answer</label>
					                          <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_ans" id="ques_ans" required>
					                           <option value="">Select Answer</option>
		                               			<option value="1">1</option>
					                            <option value="2">2</option>
					                            <option value="3">3</option>
					                            <option value="4">4</option>

					                          </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Solution</label>
                                            <textarea id="editor5" class="form-control" name="ques_sol"></textarea>

                                        </div>

                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" class="btn btn-success">Submit</button>
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

