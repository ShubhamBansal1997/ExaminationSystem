@extends('content.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">View Question-
                @if($id==1)
                	NEET
                @elseif($id==2)
                	AIIMS
                @else
                	EAMCET
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
<form method="get" role="form" action="{{URL:: to('content/viewquestest')}}/{{$id}}">
                                   
                                    <div class="message">

                      			                        		
                                  		
                              			</ul>
                          			</div>
                      				

              						</div>
              						
						          
						             

                                        <div class="form-group">

                                            <label>Subject Name</label>
                                            <select class="form-control" data-style="white" name="subject_name" required >
                                                <option value="">Select Subject Name</option>
                                            @foreach(\App\Testseriessubject::where('test_series_id',$id)->get() as $chapters)
                                                <option value="{{ $chapters->subject_name }}">{{ $chapters->subject_name }}</option>
                                            @endforeach
                                              </select>
                                        </div>
                                           <div class="form-group">

                                            <label>Mock Test Number</label>
                                            <select class="form-control" data-style="white"name="mock_test_id" required>
                                           
                                                <option value="">Select Mock Test</option>
                                           <option value="1">1</option>
                                           <option value="2">2</option>
                                           <option value="3">3</option>
                                           <option value="4">4</option>
                                           <option value="5">5</option>
                                           
                                              </select>
                                        </div>

                                        
                                      
                                        </div>
                                        <div class="modal-footer">

                                            <button type="submit" id="quessubmit" value="Submit" class="btn btn-primary">Submit</button>
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


