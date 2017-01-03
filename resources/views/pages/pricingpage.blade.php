@extends('app')
@section('content')
      <section id="content">

        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h2 class="breadcrumbs-title">Packages</h2>
                <!-- <ol class="breadcrumbs">
                  <li><a href="index.html">Dashboard</a>
                  </li>
                  <li><a href="#">UI Elements</a>
                  </li>
                  <li class="active">Waves</li>
                </ol> -->
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->


        <!--start container-->
        <div class="container">
          


          <div class="divider"></div>
          <!--Applying Waves-->
          


          

            <div class="row">
              <div class="col s12 m12 l12">
                
                <div class="collection waves-color-demo">
                  
                  <div class="collection-item" style="font-size: 20px;">1 Year Packages<a href="{{ URL::to('package/1year') }}" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Buy Now</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">2 Year Packages<a href="{{ URL::to('package/2year') }}" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Buy Now</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">Test Series (2 Years)<a href="{{ URL::to('package/2test') }}" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Buy Now</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">Advance Packages(1 Yr)<a href="{{ URL::to('package/1adv') }}" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Buy Now</a>
                  </div>
                  <div class="collection-item" style="font-size: 20px;">Advance Packages(2 Yr)<a href="{{ URL::to('package/2adv') }}" class="waves-effect waves-light btn secondary-content" style="font-size: 15px;">Buy Now</a>
                  </div>
                                
                  
                  
                </div>
              </div>
            </div>
            
            
          </div>

          <div class="divider"></div>
          <!--  Circle  -->
          
          <!-- Floating Action Button -->
            
            <!-- Floating Action Button -->
        </div>
        <!--end container-->

      </section>
      <!-- END CONTENT -->
@endsection