<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>NeetGurumantra | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta content="" name="description" />
        <meta content="themes-lab" name="author" />
        <link rel="shortcut icon" href="{{ s32('img/favicon.png') }}">
        <link href="{{ s32('css/style.css') }}" rel="stylesheet">
        <link href="{{ s32('css/ui.css') }}" rel="stylesheet">
        <link href="{{ s32('plugins/bootstrap-loading/lada.min.css') }}" rel="stylesheet">
    </head>
    <body class="account2" data-page="login">
        <!-- BEGIN LOGIN BOX -->
        <div class="container" id="login-block">
            <i class="user-img icons-faces-users-03"></i>
            <div class="account-info">
                <a href="dashboard.html" class="logo"></a> 
                <h3></h3>
                <ul>
                    <li><i class="icon-magic-wand"></i> New Qestions</li>
                    <li><i class="icon-layers"></i> Fast and speedy</li>
                    <li><i class="icon-arrow-right"></i> Less Server downtime</li>
                    <li><i class="icon-drop"></i> Colors options</li>
                </ul>
            </div>
            <div class="account-form">
                
                {!! Form::open(array('url' => 'login','class'=>'form-signin','id'=>'','role'=>'form')) !!}
                    <div class="message">
                         
                      @if (count($errors) > 0)
                          <div class="alert alert-danger">
                           <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span></button>
                              <ul style="list-style: none;">
                                  @foreach ($errors->all() as $error)
                                      <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                          </div>
                      @endif
                                    
              </div>
              @if(Session::has('flash_message'))

              <div class="alert alert-success fade in">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
              {{ Session::get('flash_message') }}
              </div>
              @endif
                    <h3><strong>LOGIN</strong> to your account</h3>
 
                    <div class="append-icon">
                        <input type="text" name="mobile" id="mobile"  class="form-control form-white username" placeholder="Mobile Number" required>
                        <i class="icon-user">
                    </div>
                    
                    
                    <button type="submit" class="btn btn-lg btn-dark btn-rounded ladda-button" data-style="expand-left" name="btn_login" value="Login">Log In</button>
                    
                    <div class="form-footer">
					<!--
                        <div class="social-btn">
                            <button type="button" class="btn-fb btn btn-lg btn-block btn-square"><i class="fa fa-facebook pull-left"></i>Connect with Facebook</button>
                            <button type="button" class="btn btn-lg btn-block btn-blue btn-square"><i class="fa fa-twitter pull-left"></i>Login with Twitter</button>
                        </div>
						-->
                        <div class="clearfix">
                            <p class="new-here"><a href="{{ URL::to('register') }}">New here? Register</a></p>
                        </div>
                    </div>
                {!! Form::close() !!}
                
            </div>
			<!--
            <div id="account-builder">
                <form class="form-horizontal" role="form">
                    <div class="row">
                        <div class="col-md-12">
                            <i class="fa fa-spin fa-gear"></i> 
                            <h3><strong>Customize</strong> Login Page</h3>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Social Login</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="social-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="image-cb" type="checkbox" class="switch-input" checked>
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">Background Slides</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="slide-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-xs-8 control-label">User Image</label>
                                <div class="col-xs-4">
                                    <label class="switch m-r-20">
                                    <input id="user-cb" type="checkbox" class="switch-input">
                                    <span class="switch-label" data-on="On" data-off="Off"></span>
                                    <span class="switch-handle"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div> -->
        </div>
        <!-- END LOCKSCREEN BOX -->
        <p class="account-copyright">
            
        </p>
        <script src="{{ s32('plugins/jquery/jquery-1.11.1.min.js') }}"></script>
        <script src="{{ s32('plugins/jquery/jquery-migrate-1.2.1.min.js') }}"></script>
        <script src="{{ s32('plugins/gsap/main-gsap.min.js') }}"></script>
        <script src="{{ s32('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
        <script src="{{ s32('plugins/backstretch/backstretch.min.js') }}"></script>
        <script src="{{ s32('plugins/bootstrap-loading/lada.min.js') }}"></script>
        <script src="{{ s32('js/pages/login-v2.js') }}"></script>
    </body>
</html>