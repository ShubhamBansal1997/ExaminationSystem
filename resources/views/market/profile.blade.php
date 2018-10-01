@extends('market.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<div id="page-wrapper">
            <div class="row">
                <div class="col-md-4">
                    <h1 class="">Profile</h1>

                </div>

                
                <div class="col-md-6">
                  </br></br> 
            <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
             Change Password
            </button>
               <!-- Modal -->

               <!-- /.modal -->                       


            </div>
                <div class="col-md-2">
               
                 <img src="{{ asset('home_asset/images/avatar.jpg') }}" alt="" class="img-circle">
           
                           


            </div>
                </div>
                
                <!-- /.col-lg-12 -->
            
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
                                <label>Phone No</label>
                                <input class="form-control" value="{{ $user->phoneno }}">
                              </div>
                              <div class="form-group">
                                <label>Email Id</label>
                                <input class="form-control" value="{{ $user->email }}" >
                              </div>
                              
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
<!-- <button class="btn btn-primary">Update Info</button> -->
              </div>
              <div class="col-md-4"></div>

            </div>
            <!-- /.row -->
        </div>




<div class="container">

 

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Change Password</h4>
        </div>
        <div class="modal-body">
         <form role="form" method="get" action="{{ URL::to('marketing/changePWD') }}" >
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="form-group">
                          <label>Old Password</label>
                          <input class="form-control" type="password" name="oldpwd" required>
                        </div>
                        <div class="form-group">
                          <label>New Password</label>
                          <input class="form-control" type="password" name='newpwd' required>
                        </div>
                      
                       
                      </div>
                    </div>
                  </div>
                </div>
              
             
       
        <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update Password</button>

        </div>
         </form>
      </div>
      
    </div>
  </div>
  
</div>

        <!-- /#page-wrapper -->
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
 /** function to call a modal on add user */
    $('#changePasswordForMarketer').click(function(e){
      //e.preventDefault();

      console.log("esdas");
      $('#useraddmodal').;
    });
  }
  </script>
@endsection


