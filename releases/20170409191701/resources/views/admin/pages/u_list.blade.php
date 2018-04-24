@extends('admin.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">List</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <!-- <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                Orders
                            </button> -->

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Order</h4>
                                        </div>
                                        @if (count($errors) > 0)
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <div class="modal-body">
                                            <form role="form" method="post" action="{{ URL::to('admin/dashboard/addcake') }}" enctype="multipart/form-data">
                                            {!! csrf_field() !!}
                                        <div class="form-group">
                                            <label>Cake id</label>
                                            <input class="form-control" name="cake_id">
                                        </div>
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control" name="cake_name">
                                        </div>

                                        <div class="form-group">
                                            <label>Flavour</label>
                                            <select class="form-control" name="cake_flavour">
                                                
                                                <option value="Chocolate">Chocolate</option>
                                                <option value="Mango">Mango</option>
                                                <option value="Blackforest">BlackForest</option>
                                                <option value="Butterscotch">Butterscotch</option>
                                                <option value="Vanilla">Vanilla</option>
                                                
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Shape</label>
                                            <select class="form-control" name="cake_shape">
                                                
                                                <option value="square">Square</option>
                                                <option value="circle">Circle</option>
                                                <option value="heart">Heart</option>                                                
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Descrption</label>
                                            <textarea class="form-control" rows="4" name="cake_descrption"></textarea>
                                        </div>
                                         <div class="form-group">
                                            <label>File input</label>
                                            <input type="file" name="cake_image">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Active</label>
                                            <select class="form-control" name="active">
                                                <option value="1">Yes</option>
                                                <option value="0">No</option>
                                        
                                            </select>
                                        </div>

                                    
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>

                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>
                        <!-- /.panel-heading -->
                        <!-- 'order_id','cust_name', 'cust_add', 'cust_pincode','cust_state','cust_city','user_id','del_date','complete_price','is_completed' -->

                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>NAME</th>
                                        <th>MOBILE</th>
                                        <th>EMAIL</th>
                                        <th>STATUS</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                     @foreach(\App\Users::all() as $user)
                                        <tr class="odd gradeX">
                                            <td>{{ isset($user->id)?$user->id:"NULL" }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}<br/>{{ $user->mobile }}</td>
                                            <td>{{ $user->mobile }}</td>
                                            <td class="center">
                                            @if($user->status==1)
                                            {{ "Verfied" }}
                                            @else
                                            {{ "Not" }}
                                            @endif
                                            </td>
                                            <td class="center">
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
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection
