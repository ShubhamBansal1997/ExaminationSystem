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
                          <li class="dd-item" data-id="1">
                            <a target="_blank" href="#"><div class="dd3-content">All Questions (0)</div>
                            </a>
                            <div class="progress progress-striped active">
                              <div class="progress-bar progress-bar-default" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                <span class="sr-only">100% Complete (success)</span>
                              </div>
                            </div>  
                            <ol class="dd-list">
                              <li class="dd-item"  data-id="2">
                                <a target="_blank" href="#">
                                  <div class="dd3-content">Easy (0)</div>
                                </a>
                                <div class="progress progress-striped active">
                                  <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                  <span class="sr-only">100% Complete (success)</span>
                                  </div>
                                </div>
                              </li>
                              <li class="dd-item"   data-id="3">
                                <a target="_blank" href="#"> 
                                  <div class="dd3-content">Medium (0)</div>
                                </a>
                                <div class="progress progress-striped active">
                                  <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                  <span class="sr-only">100% Complete (success)</span>
                                  </div>
                                </div>
                              </li>
                              <li class="dd-item"  data-id="4">
                                <a href= target="_blank" href="#">  
                                  <div class="dd3-content">Difficult (0)</div> 
                                </a>
                                <div class="progress progress-striped active">
                                  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 56%">
                                  <span class="sr-only">100% Complete (success)</span>
                                  </div>
                                </div>
                              </li>
                                
                            </ol>
                            <li class="dd-item dd3-item" data-id="5">
                              <a target="_blank" href="#">
                                <div class="dd3-content">Important Questions (0)</div>
                              </a>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                            </li>
                            <li class="dd-item dd3-item" data-id="6">
                              <a target="_blank" href="#"><div class="dd3-content">Correct (0)</div></a>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                            </li>
                            <li class="dd-item dd3-item" data-id="7">
                              <a target="_blank" href="#"><div class="dd3-content">Incorrect (0)</div></a>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                  <span class="sr-only">60% Complete (warning)</span>
                                </div>
                              </div>
                            </li>
                            <li class="dd-item dd3-item" data-id="8">
                              <a target="_blank" href="#"><div class="dd3-content">Unattempted (120)</div></a>
                              <div class="progress progress-striped active">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                  <span class="sr-only">20% Complete</span> 
                                </div>
                              </div>
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
        