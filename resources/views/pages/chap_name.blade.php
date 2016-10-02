@extends('app')
<!-- BEGIN PAGE CONTENT -->
@section('content')
<div class="page-content">
  <div class="row">
    <div class="col-lg-12 portlets">
      <div class="panel">
        <div class="panel-content">
          <div class="row">
            <div class="col-md-12">
              <div class="panel-group panel-accordion" id="accordion">
              @foreach(\App\Chapters::where('sub_id',$sub_id)->where('std',$std)->get() as $chapters)
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4>
                      <a class="collapsed" href="{{ URL::to('home') }}/{{ $sub_id }}/{{ $std }}/{{ $chapters->chap_id }}">
                      <strong> {{ $chapters->chap_name }} </strong>
                      <button type="button" class="btn btn-success btn-rounded" style="margin-bottom: 10px;  float: right;">Start</button></a>
                    </h4>
                  </div>
                         
                </div>
              @endforeach
                
              </div>
            </div>
        
          </div>
        </div>
      </div>
    </div>
  </div>
          
        <!-- END PAGE CONTENT -->
@endsection        