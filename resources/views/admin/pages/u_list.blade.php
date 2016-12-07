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
        <!-- @if(Session::has('flash_message'))
        <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_message') }}
      
              </div>
              @endif -->
      </p>

                  <table class="table table-hover dataTable" id="table-editable">
                    <thead>
                      <tr>
                        <th>S.No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Status</th>
                        <th class="text-right">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Users::all() as $user)
                      <tr>
                        <td>{{ isset($user->id)?$user->id:"NULL"}}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->mobile }}</td>
                        <td>@if($user->status==1)
                            {{ "Verfied" }}
                            @else
                            {{ "Not" }}
                            @endif</td>
                        
                        <td class="text-right">
                        <a class="edit btn btn-sm btn-default" href="#"><i class="icon-note"></i></a> 
                        
                        <a target="_blank" class="edit btn btn-sm btn-default" href="#"><i class="icon-note"></i></a>
                        <a target="_blank" class="edit btn btn-sm btn-default" href="#"><i class="icon-note"></i></a>
                        <a target="_blank" class="edit btn btn-sm btn-default" href="#"><i class="icon-note"></i></a>
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