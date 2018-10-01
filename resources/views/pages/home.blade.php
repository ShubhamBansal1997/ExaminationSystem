@extends('app')

@section('content')
<!-- BEGIN PAGE CONTENT -->
            <!-- START CONTENT -->
<section id="content">

    <!--start container-->
    <div class="container">


        <!--card stats start-->
        <div id="card-stats">
            <div class="row">
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content  green white-text">
                            <p class="card-stats-title"><i class="mdi-social-group-add"></i> New Clients</p>
                            <h4 class="card-stats-number">566</h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 15% <span class="green-text text-lighten-5">from yesterday</span>
                            </p>
                        </div>
                        <div class="card-action  green darken-2">
                            <div id="clients-bar" class="center-align"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content pink lighten-1 white-text">
                            <p class="card-stats-title"><i class="mdi-editor-insert-drive-file"></i> New Invoice</p>
                            <h4 class="card-stats-number">1806</h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-down"></i> 3% <span class="deep-purple-text text-lighten-5">from last month</span>
                            </p>
                        </div>
                        <div class="card-action  pink darken-2">
                            <div id="invoice-line" class="center-align"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content blue-grey white-text">
                            <p class="card-stats-title"><i class="mdi-action-trending-up"></i> Today Profit</p>
                            <h4 class="card-stats-number">$806.52</h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 80% <span class="blue-grey-text text-lighten-5">from yesterday</span>
                            </p>
                        </div>
                        <div class="card-action blue-grey darken-2">
                            <div id="profit-tristate" class="center-align"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l3">
                    <div class="card">
                        <div class="card-content purple white-text">
                            <p class="card-stats-title"><i class="mdi-editor-attach-money"></i>Total Sales</p>
                            <h4 class="card-stats-number">$8990.63</h4>
                            <p class="card-stats-compare"><i class="mdi-hardware-keyboard-arrow-up"></i> 70% <span class="purple-text text-lighten-5">last month</span>
                            </p>
                        </div>
                        <div class="card-action purple darken-2">
                            <div id="sales-compositebar" class="center-align"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--card stats end-->

      

        <!--card widgets start-->
        <div id="card-widgets">
            <div class="row">

                <div class="col s12 m12 l4">
                    <ul id="task-card" class="collection with-header">
                        <li class="collection-header cyan">
                            <h4 class="task-card-title">My Task</h4>
                            <p class="task-card-date">March 26, 2015</p>
                        </li>
                        <li class="collection-item dismissable">
                            <input type="checkbox" id="task1" />
                            <label for="task1">Create Mobile App UI. <a href="#" class="secondary-content"><span class="ultra-small">Today</span></a>
                            </label>
                            <span class="task-cat teal">Mobile App</span>
                        </li>
                        <li class="collection-item dismissable">
                            <input type="checkbox" id="task2" />
                            <label for="task2">Check the new API standerds. <a href="#" class="secondary-content"><span class="ultra-small">Monday</span></a>
                            </label>
                            <span class="task-cat purple">Web API</span>
                        </li>
                        <li class="collection-item dismissable">
                            <input type="checkbox" id="task3" checked="checked" />
                            <label for="task3">Check the new Mockup of ABC. <a href="#" class="secondary-content"><span class="ultra-small">Wednesday</span></a>
                            </label>
                            <span class="task-cat pink">Mockup</span>
                        </li>
                        <li class="collection-item dismissable">
                            <input type="checkbox" id="task4" checked="checked" disabled="disabled" />
                            <label for="task4">I did it !</label>
                            <span class="task-cat cyan">Mobile App</span>
                        </li>
                    </ul>
                </div>

                <div class="col s12 m6 l4">
                    <div id="flight-card" class="card">
                        <div class="card-header amber darken-2">
                            <div class="card-title">
                                <h4 class="flight-card-title">Flight</h4>
                                <p class="flight-card-date">June 18, Thu 04:50</p>
                            </div>
                        </div>
                        <div class="card-content-bg white-text">
                            <div class="card-content">
                                <div class="row flight-state-wrapper">
                                    <div class="col s5 m5 l5 center-align">
                                        <div class="flight-state">
                                            <h4 class="margin">LDN</h4>
                                            <p class="ultra-small">London</p>
                                        </div>
                                    </div>
                                    <div class="col s2 m2 l2 center-align">
                                        <i class="mdi-device-airplanemode-on flight-icon"></i>
                                    </div>
                                    <div class="col s5 m5 l5 center-align">
                                        <div class="flight-state">
                                            <h4 class="margin">SFO</h4>
                                            <p class="ultra-small">San Francisco</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s6 m6 l6 center-align">
                                        <div class="flight-info">
                                            <p class="small"><span class="grey-text text-lighten-4">Depart:</span> 04.50</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Terminal:</span> B</p>
                                        </div>
                                    </div>
                                    <div class="col s6 m6 l6 center-align flight-state-two">
                                        <div class="flight-info">
                                            <p class="small"><span class="grey-text text-lighten-4">Arrive:</span> 08.50</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Flight:</span> IB 5786</p>
                                            <p class="small"><span class="grey-text text-lighten-4">Terminal:</span> C</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l4">
                    <div id="profile-card" class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img class="activator" src="{{ asset('home_asset/images/user-bg.jpg') }}" alt="user background">
                        </div>
                        <div class="card-content">
                            <img src="{{ asset('home_asset/images/avatar.jpg') }}" alt="" class="circle responsive-img activator card-profile-image">
                            <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                                <i class="mdi-action-account-circle"></i>
                            </a>

                            <span class="card-title activator grey-text text-darken-4">Roger Waters</span>
                            <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</p>
                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>

                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4">Roger Waters <i class="mdi-navigation-close right"></i></span>
                            <p>Here is some more information about this card.</p>
                            <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Project Manager</p>
                            <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                            <p><i class="mdi-communication-email cyan-text text-darken-2"></i> mail@domain.com</p>
                            <p><i class="mdi-social-cake cyan-text text-darken-2"></i> 18th June 1990</p>
                            <p><i class="mdi-device-airplanemode-on cyan-text text-darken-2"></i> BAR - AUS</p>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">
                <!-- blog card -->
                <div class="col s12 m12 l4">
                    <div class="blog-card" >
                    <div class="card">
                        <div class="card-image waves-effect waves-block waves-light">
                            <img src="{{ asset('home_asset/images/gallary/30.jpg') }}" alt="blog-img">
                        </div>
                        <ul class="card-action-buttons">
                            <li><a class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-social-share"></i></a>
                            </li>                            
                            <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                            </li>
                        </ul>
                        <div class="card-content">
                            <p class="row">
                              <span class="left"><a href="">Web Design</a></span>
                              <span class="right">18th June, 2015</span>
                            </p>
                            <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Materialize Featured Blog Post Card</a>
                            </h4>                                        
                            <div class="row">
                              <div class="col s2">
                                <img src="{{ asset('home_asset/images/avatar.jpg') }}" alt="" class="circle responsive-img valign profile-image">
                              </div>
                              <div class="col s9"> By <a href="#">John Doe</a></div>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Apple MacBook Pro A1278 13"</span>
                            <p>Here is some more information about this blog that is only revealed once clicked on.</p>
                        </div>
                    </div>
                    </div>
                </div>

                <!-- product-card -->
                <div class="col s12 m12 l4">
                    <div class="product-card">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <a href="#" class="btn-floating btn-large btn-price waves-effect waves-light  pink accent-2">$189</a>
                                <img src="{{ asset('home_asset/images/gallary/33.jpg') }}" alt="product-img">
                            </div>
                            <ul class="card-action-buttons">
                                <li><a class="btn-floating waves-effect waves-light green accent-4"><i class="mdi-av-repeat"></i></a>
                                </li>
                                <li><a class="btn-floating waves-effect waves-light red accent-2"><i class="mdi-action-favorite"></i></a>
                                </li>
                                <li><a class="btn-floating waves-effect waves-light light-blue"><i class="mdi-action-info activator"></i></a>
                                </li>
                            </ul>
                            <div class="card-content">

                                <div class="row">
                                    <div class="col s8">
                                        <p class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Featured Product of The Month</a>
                                        </p>
                                    </div>
                                    <div class="col s4 no-padding">
                                        <a href=""></a><img src="{{ asset('home_asset/images/amazon.jpg') }}" alt="amazon" class="responsive-img">
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4"><i class="mdi-navigation-close right"></i> Apple MacBook Pro A1278 13"</span>
                                <p>Here is some more information about this product that is only revealed once clicked on.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- map-card -->
                <div class="col s12 m12 l4">
                    <div class="map-card">
                        <div class="card">
                            <div class="card-image waves-effect waves-block waves-light">
                                <div id="map-canvas" data-lat="40.747688" data-lng="-74.004142"></div>
                            </div>
                            <div class="card-content">                    
                                <a class="btn-floating activator btn-move-up waves-effect waves-light darken-2 right">
                                    <i class="mdi-maps-pin-drop"></i>
                                </a>
                                <h4 class="card-title grey-text text-darken-4"><a href="#" class="grey-text text-darken-4">Company Name LLC</a>
                                </h4>
                                <p class="blog-post-content">Some more information about this company.</p>
                            </div>
                            <div class="card-reveal">
                                <span class="card-title grey-text text-darken-4">Company Name LLC <i class="mdi-navigation-close right"></i></span>                   
                                <p>Here is some more information about this company. As a creative studio we believe no client is too big nor too small to work with us to obtain good advantage.By combining the creativity of artists with the precision of engineers we develop custom solutions that achieve results.Some more information about this company.</p>
                                <p><i class="mdi-action-perm-identity cyan-text text-darken-2"></i> Manager Name</p>
                                <p><i class="mdi-communication-business cyan-text text-darken-2"></i> 125, ABC Street, New Yourk, USA</p>
                                <p><i class="mdi-action-perm-phone-msg cyan-text text-darken-2"></i> +1 (612) 222 8989</p>
                                <p><i class="mdi-communication-email cyan-text text-darken-2"></i> support@geekslabs.com</p>                    
                            </div>
                        </div>
                    </div>
                </div>

        </div>
        <!--card widgets end-->

        <!-- //////////////////////////////////////////////////////////////////////////// -->

        <!--work collections start-->
        <div id="work-collections">
            <div class="row">
                <div class="col s12 m12 l6">
                    <ul id="projects-collection" class="collection">
                        <li class="collection-item avatar">
                            <i class="mdi-file-folder circle light-blue darken-2"></i>
                            <span class="collection-header">Projects</span>
                            <p>Your Favorites</p>
                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s6">
                                    <p class="collections-title">Web App</p>
                                    <p class="collections-content">AEC Company</p>
                                </div>
                                <div class="col s3">
                                    <span class="task-cat cyan">Development</span>
                                </div>
                                <div class="col s3">
                                    <div id="project-line-1"></div>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s6">
                                    <p class="collections-title">Mobile App for Social</p>
                                    <p class="collections-content">iSocial App</p>
                                </div>
                                <div class="col s3">
                                    <span class="task-cat grey darken-3">UI/UX</span>
                                </div>
                                <div class="col s3">
                                    <div id="project-line-2"></div>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s6">
                                    <p class="collections-title">Website</p>
                                    <p class="collections-content">MediTab</p>
                                </div>
                                <div class="col s3">
                                    <span class="task-cat teal">Marketing</span>
                                </div>
                                <div class="col s3">
                                    <div id="project-line-3"></div>
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s6">
                                    <p class="collections-title">AdWord campaign</p>
                                    <p class="collections-content">True Line</p>
                                </div>
                                <div class="col s3">
                                    <span class="task-cat green">SEO</span>
                                </div>
                                <div class="col s3">
                                    <div id="project-line-4"></div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col s12 m12 l6">
                    <ul id="issues-collection" class="collection">
                        <li class="collection-item avatar">
                            <i class="mdi-action-bug-report circle red darken-2"></i>
                            <span class="collection-header">Issues</span>
                            <p>Assigned to you</p>
                            <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s7">
                                    <p class="collections-title"><strong>#102</strong> Home Page</p>
                                    <p class="collections-content">Web Project</p>
                                </div>
                                <div class="col s2">
                                    <span class="task-cat pink accent-2">P1</span>
                                </div>
                                <div class="col s3">
                                    <div class="progress">
                                         <div class="determinate" style="width: 70%"></div>   
                                    </div>                                                
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s7">
                                    <p class="collections-title"><strong>#108</strong> API Fix</p>
                                    <p class="collections-content">API Project </p>
                                </div>
                                <div class="col s2">
                                    <span class="task-cat yellow darken-4">P2</span>
                                </div>
                                <div class="col s3">
                                    <div class="progress">
                                        <div class="determinate" style="width: 40%"></div>   
                                    </div>                                                
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s7">
                                    <p class="collections-title"><strong>#205</strong> Profile page css</p>
                                    <p class="collections-content">New Project </p>
                                </div>
                                <div class="col s2">                                                
                                    <span class="task-cat light-green darken-3">P3</span>
                                </div>
                                <div class="col s3">
                                    <div class="progress">
                                        <div class="determinate" style="width: 95%"></div>   
                                    </div>                                                
                                </div>
                            </div>
                        </li>
                        <li class="collection-item">
                            <div class="row">
                                <div class="col s7">
                                    <p class="collections-title"><strong>#188</strong> SAP Changes</p>
                                    <p class="collections-content">SAP Project</p>
                                </div>
                                <div class="col s2">
                                    <span class="task-cat pink accent-2">P1</span>
                                </div>
                                <div class="col s3">
                                    <div class="progress">
                                         <div class="determinate" style="width: 10%"></div>   
                                    </div>                                                
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--work collections end-->

        <!-- Floating Action Button -->
        <div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
            <a class="btn-floating btn-large">
              <i class="mdi-action-stars"></i>
            </a>
            <ul>
              <li><a href="css-helpers.html" class="btn-floating red"><i class="large mdi-communication-live-help"></i></a></li>
              <li><a href="app-widget.html" class="btn-floating yellow darken-1"><i class="large mdi-device-now-widgets"></i></a></li>
              <li><a href="app-calendar.html" class="btn-floating green"><i class="large mdi-editor-insert-invitation"></i></a></li>
              <li><a href="app-email.html" class="btn-floating blue"><i class="large mdi-communication-email"></i></a></li>
            </ul>
        </div>
        <!-- Floating Action Button -->

    </div>
    <!--end container-->
</section>
<!-- END CONTENT -->
@endsection