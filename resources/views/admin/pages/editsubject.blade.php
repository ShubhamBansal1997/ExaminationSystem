@extends('admin.app')
@section('content')

<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1 class="page-header">Update Subject With Subject ID: {{$subject->sub_id}}</h1>
       <h1 class="page-header"></h1>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
             <form role="form" method="get" action="{{URL:: to('admin/updatesubject')}}/{{$subject->id}}">
                  <div class="panel-body">
                    <div class="row">
                     
                      <div class="col-lg-12">
                        <div class="form-group col-lg-6">
                          <label>Subject</label>
                          <input class="form-control" type="text" value="{{$subject->subject_name}}"  name="subject1" required>
                        </div>
                        <div class="form-group col-lg-6">
                          <label>Number Of Questions</label>
                          <input class="form-control" type="number" value="{{$subject->number_of_ques}}" name='number1' required>
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




  </div>
</div>
@endsection
