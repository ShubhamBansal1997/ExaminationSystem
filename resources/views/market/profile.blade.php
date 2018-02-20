@extends('market.app')
@section('content')
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-header">Profile</h1>

                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div class="panel panel-default">
                      <div class="panel-heading">
                        Profile
                      </div>
                      <div class="panel-body">
                        <div class="row">
                          <div class="col-lg-12">
                            <form role=role>
                              <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" value="{{ $user->fname }}" disabled="disabled">
                              </div>
                              <div class="form-group">
                                <label>Last Name</label>
                                <input class="form-control" value="{{ $user->lname }}" disabled="disabled">
                              </div>
                              <div class="form-group">
                                <label>First Name</label>
                                <input class="form-control" value="{{ $user->fname }}" disabled="disabled">
                              </div>
                              <div class="form-group">
                                <label>Phone No</label>
                                <input class="form-control" value="{{ $user->phoneno }}" disabled="disabled">
                              </div>
                              <div class="form-group">
                                <label>Email Id</label>
                                <input class="form-control" value="{{ $user->email }}" disabled="disabled">
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->
@endsection
@section('script')

@endsection


