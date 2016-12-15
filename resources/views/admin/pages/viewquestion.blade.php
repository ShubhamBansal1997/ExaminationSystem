@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Tables</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <p>
                            @if(Session::has('flash_message'))
                            <div class="alert alert-success fade in">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>{{ Session::get('flash_message') }}

                                  </div>
                                  @endif
                          </p>
                            <!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Orders
                            </button> -->

                            <!-- Modal -->
                            
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-heading -->
                        <!-- 'order_id','cust_name', 'cust_add', 'cust_pincode','cust_state','cust_city','user_id','del_date','complete_price','is_completed' -->

                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Order</th>
                                        <th>Question</th>
                                        <th>Option1</th>
                                        <th>Answer</th>
                                        <th>Level</th>
                                        <th>Imp</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                               

                                     @foreach($questions as $question)
                                    <tr  class="odd gradeX">
                                      <td  style ="word-break:break-all;">{{ isset($question->o_id)?$question->o_id:"NULL"}}</td>
                                      <td  style ="word-break:break-all;">{!! $question->ques_exp !!}</td>
                                      <td  style ="word-break:break-all;">{!! $question->ques_ans1 !!}</td>
                                      <td  style ="word-break:break-all;">{{ $question->ques_ans }}</td>
                                      <td  style ="word-break:break-all;">@if($question->ques_level==1)
                                          {{ "E" }}
                                          @elseif($question->ques_level==2)
                                          {{ "M" }}
                                          @else
                                          {{ "D" }}
                                          @endif</td>
                                      <td style ="word-break:break-all;">@if($question->ques_imp==1)
                                            {{ "Y" }}
                                          @else
                                            {{ "N" }}
                                          @endif</td>



                                      <td  style ="word-break:break-all;" class="text-right">
                                      <a href=" {{ URL::to('admin/editques') }}/{{ $question->ques_id }}/{{ $sub_id }}/{{ $std }} "><i class="fa fa-edit"></i></a>
                                      <!-- <a class="confirmLink delete btn btn-sm btn-danger" href=" {{ URL::to('admin/deleteques') }}/{{ $question->ques_id }}/{{ $sub_id }}/{{ $std }} "><i class="icons-office-52"></i></a> -->
                                      <a target="_blank" href="{{ URL::to('admin/view_look') }}/{{ $question->ques_id }} "><i class="fa fa-edit"></i></a>
                                      <a target="_blank" href="{{ URL::to('admin/view_look1') }}/{{ $question->ques_id }} "><i class="fa fa-edit"></i></a>
                                      
                                      <a target="_blank" href="{{ URL::to('admin/view_look2') }}/{{ $question->ques_id }} "><i class="fa fa-edit"></i></a>
                                      
                              
                                       <button onclick="deleteques({{ $question->ques_id }},{{ $question->sub_id }},{{ $std }})" class="delete" href="http://asdfasda" >Delete</a>
                                      </button>
                                    </tr>
                                  @endforeach

                                                                                      
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                                    
            
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection
