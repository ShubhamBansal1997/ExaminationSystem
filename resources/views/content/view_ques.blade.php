@extends('content.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Enter New Question-
                @if($sub_id==1)
                	Physics
                @elseif($sub_id==2)
                	Chemistry
                @elseif($sub_id==3)
                    Biology
                    @elseif($sub_id==4)
                    Test Series NEET
                    @elseif($sub_id==5)
                   Test Series AIIMS
                    @elseif($sub_id==6)
                   Test Series JIPMER
                    @else
                   Test Series EAMCET
                @endif</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Details
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    {!! Form::open(array('url' => 'content/viewques','role'=>'form')) !!}

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
		                          			@foreach(\App\Chapters::where('sub_id',$sub_id)->where('std',$std)->get() as $chapters)
					                            <option value="{{ $chapters->chap_id }}">{{ $chapters->chap_name }}</option>
					                        @endforeach
					                          </select>
                                    	</div>

                                        <div class="form-group">
                                            <label>Imp Ques</label>
					                          <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_imp" id="imp_ques" value="" required>
					                            <!-- <option>ALL</option> -->
					                            <option value="NULL">All</option>
					                            <option value="1">Yes</option>
					                            <option value="0">No</option>
					                          </select>
                                        </div>
                                        <div class="form-group">

                                            <label>Ques Level</label>
					                          <select class="form-control" data-style="white" data-placeholder="Select a correct answer" name="ques_level" id="ques_level" value="" required>
					                            <!-- <option>All</option> -->
					                            <option value="NULL">All</option>
					                            <option value="1">Easy</option>
					                            <option value="2">Medium</option>
					                            <option value="3">Difficult</option>
					                          </select>
                                        </div>
                                        <input value="{{ $sub_id }}" name="sub_id" hidden>
									<input value="{{ $std }}" name="std" hidden>

                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" id="quessubmit" value="Submit" class="btn btn-primary">Submit</button>
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


