@extends('admin.app')

@section('content')
<div class="row">
            <div class="col-lg-12 portlets">
              <div class="panel">
                <div class="panel-header panel-controls">
                  <h3><i class="fa fa-table"></i> <strong>Editable</strong> Tables</h3>
                </div>
                <div class="panel-content">
                  <p>
        @if(Session::has('flash_message'))
        <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_message') }}
      
              </div>
              @endif
      </p>
                  <div class="m-b-20">
                    <!-- <div class="btn-group">
                      <button id="table-edit_new" class="btn btn-sm btn-dark"><i class="fa fa-plus"></i> Add New Line</button>
                    </div> -->
                  </div>
                  <table class="table table-hover dataTable" id="table-editable">
                    <thead>
                      <tr>
                        <th>Order</th>
                        <th>Question</th>
                        <th>Option1</th>
                        <th>Answer</th>
                        <th>Level</th>
                        <th>Imp</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($questions as $question)
                      <tr>
                        <td>{{ isset($question->o_id)?$question->o_id:"NULL"}}</td>
                        <td>{{ $question->ques_exp }}</td>
                        <td>{{ $question->ques_ans1 }}</td>
                        <td>{{ $question->ques_ans }}</td>
                        <td>{{ $question->ques_level }}</td>
                        <td>{{ $question->ques_imp }}</td>
                        <td class="text-right"><a class="edit btn btn-sm btn-default" href=" {{ URL::to('admin/editques') }}/{{ $question->ques_id }}/{{ $sub_id }}/{{ $std }} "><i class="icon-note"></i></a>  <a class="delete btn btn-sm btn-danger" href="{{ URL::to('admin/deleteques') }}/{{ $question->ques_id }} "><i class="icons-office-52"></i></a>
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