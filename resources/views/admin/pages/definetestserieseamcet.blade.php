@extends('admin.app')
@section('content')

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Define Test Series</h1>
       <h1 class="page-header"></h1>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            Define EAMCET Test Series For All Mock Test
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
             <form role="form" method="get" action="{{URL:: to('admin/updateeamcet')}}">
                  <div class="panel-body">
                    <div class="row">
                      
                      <div class="col-lg-12">
                        <div class="form-group col-lg-6">
                          <label>Subject</label>
                          <input class="form-control" type="text"  name="subject1" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <label>Number Of Questions</label>
                          <input class="form-control" type="number" name='number1' required>
                        </div>
                      </div>

                     
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
            
                <button type="submit" class="btn btn-primary">Save changes</button>

              </div>
              </form>


              </div>
            </div>
          </div>
        </div>





        
      </div>
    </div>





     <div class="panel-body">
                            <div id="no-more-tables" >
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                      
                                      <th>Subject Name</th>
                                        <th>Number Of Question</th>
                                      <th>Action</th>
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                   @foreach($subject as $sub)
                                    <tr  class="odd gradeX">
                                    
                                      <td>{{ $sub->subject_name}}</td>
                                      <td>{{ $sub->number_of_ques}}</td>
                                    
                                      <td>
                                        
                           <a href="{{ URL:: to('admin/editsubject')}}/{{ $sub->id }}" target="blank" class="btn btn-xs btn-success">Edit</a><br/>
                                       
                                          <a href="{{ URL:: to('admin/deletesubject')}}/{{ $sub->id }}" class="btn btn-xs btn-danger">Delete</a><br/>
                                       
                                      </td>
                                    
                                    </tr>
                               

@endforeach

                                </tbody>
                            </table>
                            </div>
                        </div>



  </div>
</div>
@endsection
