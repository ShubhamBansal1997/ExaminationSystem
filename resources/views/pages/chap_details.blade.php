@extends('app')

@section('content')
<!-- BEGIN PAGE CONTENT -->

<div class="page-content">
  <div class="row">
    <div class="col-lg-12 portlets">
      <div class="panel">
        <div class="panel-content">
          <div class="row">
            <div class="col-md-12">
              <div class="panel-group panel-accordion" id="accordion">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4>
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse">
                        <strong>  {{ \App\Chapters::chap_name($chap_id) }}</strong>
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      <div class="dd nestable">
                        <ol class="dd-list">
                          <li class="dd-item" style="font-size: 20px;" data-id="1">
                            <a target="_blank" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/allques" style="padding: 5px;"><div class="dd3-content" style=" border: 2px solid #000000;height: 35px;padding: 5px 0px 5px 5px;">All Questions ({{ \App\Questions::a_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                            </a>
                            <li class="dd-item" style="font-size: 20px;" data-id="2">
                                <a target="_blank" style="padding: 5px;" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/easy">
                                  <div class="dd3-content" style=" border: 2px solid #000000;height: 35px;padding: 5px 0px 5px 5px;">Easy ({{ \App\Questions::e_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                                </a>
                            </li>
                            <li class="dd-item" style="font-size: 20px;" data-id="3">
                                <a target="_blank" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/medium" style="padding: 5px;"> 
                                  <div class="dd3-content"  style=" border: 2px solid #000000; height: 35px; padding: 5px 0px 5px 5px;">Medium ({{ \App\Questions::m_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                                </a>
                            </li>
                            <li class="dd-item" style="font-size: 20px;" data-id="4">
                                <a href= target="_blank" href="{{ URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/difficult" style="padding: 5px;">  
                                  <div class="dd3-content" style=" border: 2px solid #000000;height: 35px;padding: 5px 0px 5px 5px;">Difficult ({{ \App\Questions::d_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div> 
                                </a>
                            </li>
                                
                            
                            <li class="dd-item"  style="font-size: 20px;"  data-id="5">
                              <a target="_blank" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/imp" style="padding: 5px;">
                                <div class="dd3-content" style=" border: 2px solid #000000;height: 35px;padding: 5px 0px 5px 5px;">Important ({{ \App\Questions::i_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                              </a>
                            </li>
                            <li class="dd-item"  style="font-size: 20px;" data-id="6">
                              <a target="_blank" href="#"  style="padding: 5px;"><div class="dd3-content" style=" border: 2px solid #000000;height: 35px;padding: 5px 0px 5px 5px;">Correct ({{ \App\Questions_attempt::correct($chap_id) }}/{{ \App\Questions_attempt::attempted($chap_id) }})</div></a>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                            </li>
                            <li class="dd-item"  style="font-size: 20px;" data-id="7">
                              <a target="_blank" href="#"  style="padding: 5px;" ><div class="dd3-content" style=" border: 2px solid #000000;height: 35px;padding: 5px 0px 5px 5px;">Incorrect ({{ \App\Questions_attempt::incorrect($chap_id) }}/{{ \App\Questions_attempt::attempted($chap_id) }})</div></a>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                            </li>
                            <li class="dd-item"  style="font-size: 20px;" data-id="8">
                              <a target="_blank" href="#"  style="padding: 5px;" ><div class="dd3-content" style=" border: 2px solid #000000;height: 35px;padding: 5px 0px 5px 5px;">Unattempted (120)</div></a>
                              
                            </li>
                          </ol>
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
        