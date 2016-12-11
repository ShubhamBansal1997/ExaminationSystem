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
                          <li class="dd-item" style="font-size: 25px;" data-id="1">
                            <a target="_blank" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/allques" style="padding: 0px;"><div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">All Questions ({{ \App\Questions::a_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                            </a>
                            <!-- e/1/1/allques" style="padding: 0px;"><div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">All Questions (0/0)</div>
                            </a> -->
                            <li class="dd-item" style="font-size: 25px;" data-id="2">
                                <a target="_blank" style="padding: 0px;" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/easy">
                                  <div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">Easy ({{ \App\Questions::e_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                                </a>
                            </li>
                            <li class="dd-item" style="font-size: 25px;" data-id="3">
                                <a target="_blank" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/medium" style="padding: 0px;">
                                  <div class="dd3-content"  style=" border: 2px solid #000000; height: 60px;padding: 15px 0px 5px 15px;">Medium ({{ \App\Questions::m_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                                </a>
                            </li>
                            <li class="dd-item" style="font-size: 25px;" data-id="4">
                                <a href= target="_blank" href="{{ URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/difficult" style="padding: 0px;">
                                  <div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">Difficult ({{ \App\Questions::d_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                                </a>
                            </li>


                            <li class="dd-item"  style="font-size: 25px;"  data-id="5">
                              <a target="_blank" href="{{URL::to('qpage')}}/{{ $sub_id }}/{{ $chap_id }}/imp" style="padding: 0px;">
                                <div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">Important ({{ \App\Questions::i_ques($chap_id) }}/{{ \App\Questions::a_ques($chap_id) }})</div>
                              </a>
                            </li>
                            <li class="dd-item"  style="font-size: 25px;" data-id="6">
                              <a target="_blank" href="#"  style="padding: 0px;"><div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">Correct ({{ \App\Questions_attempt::correct($chap_id) }}/{{ \App\Questions_attempt::attempted($chap_id) }})</div></a>

                            </li>
                            <li class="dd-item"  style="font-size: 25px;" data-id="7">
                              <a target="_blank" href="#"  style="padding: 0px;" ><div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">Incorrect ({{ \App\Questions_attempt::incorrect($chap_id) }}/{{ \App\Questions_attempt::attempted($chap_id) }})</div></a>

                            </li>
                            <li class="dd-item"  style="font-size: 25px;" data-id="8">
                              <a target="_blank" href="#"  style="padding: 0px;" ><div class="dd3-content" style=" border: 2px solid #000000;height: 60px;padding: 15px 0px 5px 15px;">Unattempted (120)</div></a>

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
