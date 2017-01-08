@extends('app')
@section('content')      
      <section id="content">
        
        <!--breadcrumbs start-->
        <div id="breadcrumbs-wrapper">
            <!-- Search for small screen -->
            
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title">1 Year Packages</h5>
                
              </div>
            </div>
          </div>
        </div>
        <!--breadcrumbs end-->
        

        <!--start container-->
        <div class="container">
          <div class="section">

            
            <div class="divider"></div>
            <div class="row">
              

              <!-- <form action="" method="post"> -->
              <section class="plans-container" id="plans">
                <article class="col s12 m6 l4">
                  <div class="card hoverable">
                    <div class="card-image purple waves-effect">
                      <!-- <div class="card-title">BASIC</div> -->
                      <div class="price"><sup>₹</sup>200<sub>/year</sub></div>
                      <div class="price-desc">1 year</div>
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li class="collection-item">Complete Physics</li>
                      </ul>
                    </div>
                    <div class="card-action center-align">                      
                      <a id="buynow" class="waves-effect waves-light modal-trigger btn" data="p1" price="200" href="{{ URL::to('buypackage/p1')}}">Buy Now</a>
                    </div>
                  </div>
                </article>
                <article class="col s12 m6 l4">
                  <div class="card hoverable">
                    <div class="card-image cyan waves-effect">
                      <!-- <div class="card-title">BASIC</div> -->
                      <div class="price"><sup>₹</sup>200<sub>/year</sub></div>
                      <div class="price-desc">1 year</div>
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li class="collection-item">Complete Chemistry</li>
                      </ul>
                    </div>
                    <div class="card-action center-align">                      
                      <button id="buynow" class="waves-effect waves-light  btn" data="p2" price="200" href="{{ URL::to('buypackage/p2')}}">Buy Now</button>
                    </div>
                  </div>
                </article>
                <article class="col s12 m6 l4">
                  <div class="card hoverable">
                    <div class="card-image green waves-effect">
                      <!-- <div class="card-title">BASIC</div> -->
                      <div class="price"><sup>₹</sup>200<sub>/year</sub></div>
                      <div class="price-desc">1 year</div>
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li class="collection-item">Complete Biology</li>
                      </ul>
                    </div>
                    <div class="card-action center-align">                      
                      <button id="buynow" class="waves-effect waves-light  btn" data="p3" price="200" href="{{ URL::to('buypackage/p3')}}">Buy Now</button>
                    </div>
                  </div>
                </article>
                
              </section>

                         
              
              <section class="plans-container" id="plans">
                <article class="col s12 m6 l4">
                  <div class="card z-depth-1">
                    <div class="card-image light-blue waves-effect">
                      <!-- <div class="card-title">BASIC</div> -->
                      <div class="price"><sup>₹</sup>350<sub>/year</sub></div>
                      <div class="price-desc">1 year</div>
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li class="collection-item">Complete Physics</li>
                        <li class="collection-item">Complete Chemistry</li>
                      </ul>
                    </div>
                    <div class="card-action center-align">                      
                      <button id="buynow" class="waves-effect waves-light light-blue btn" data="p4" price="350" href="{{ URL::to('buypackage/p4')}}">Buy Now</button>
                    </div>
                  </div>
                </article>

                <article class="col s12 m6 l4">
                  <div class="card z-depth-1">
                    <div class="card-image light-blue darken-1 waves-effect">
                      <!-- <div class="card-title">BASIC</div> -->
                      <div class="price"><sup>₹</sup>350<sub>/year</sub></div>
                      <div class="price-desc">1 year</div>
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li class="collection-item">Complete Physics</li>
                        <li class="collection-item">Complete Biology</li>
                      </ul>
                    </div>
                    <div class="card-action center-align">                      
                      <button id="buynow" class="waves-effect waves-light light-blue btn" data="p5" price="350" href="{{ URL::to('buypackage/p5')}}">Buy Now</button>
                    </div>
                  </div>
                </article>
                
                <article class="col s12 m6 l4">
                  <div class="card z-depth-1">
                    <div class="card-image light-blue  darken-2 waves-effect">
                      <!-- <div class="card-title">BASIC</div> -->
                      <div class="price"><sup>₹</sup>350<sub>/year</sub></div>
                      <div class="price-desc">1 year</div>
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li class="collection-item">Complete Chemistry</li>
                        <li class="collection-item">Complete Biology</li>
                      </ul>
                    </div>
                    <div class="card-action center-align">                      
                      <button id="buynow" class="waves-effect waves-light light-blue btn" data="p6" price="350" href="{{ URL::to('buypackage/p6')}}">Buy Now</button>
                    </div>
                  </div>
                </article>
                
              </section>
              <section class="plans-container" id="plans">
                <article class="col s12 m6 l4">
                  <div class="card z-depth-1">
                    <div class="card-image purple waves-effect">
                      <!-- <div class="card-title">BASIC</div> -->
                      <div class="price"><sup>₹</sup>500<sub>/year</sub></div>
                      <div class="price-desc">1 year</div>
                    </div>
                    <div class="card-content">
                      <ul class="collection">
                        <li class="collection-item">Complete Physics</li>
                        <li class="collection-item">Complete Chemistry</li>
                        <li class="collection-item">Complete Biology</li>
                      </ul>
                    </div>
                    <div class="card-action center-align">                      
                      <button id="buynow" class="waves-effect waves-light light-blue btn" data="p7" price="500" href="{{ URL::to('buypackage/p7')}}">Buy Now</button>
                    </div>
                  </div>
                </article>

                
                
              </section>
            </div>
            
          </div>
          <!-- Floating Action Button -->
            
            <!-- Floating Action Button -->
        </div>
        <!--end container-->
      </section>
      <!-- END CONTENT -->
@endsection
@section('script')
<script>
  $(document).ready(function(){
    $(".event-box").on("click", function(e){
      $(".event-box").removeClass("selected-event");
      $(e.target).addClass("selected-event");
      $("input[name=event]").val($(e.target).attr("data"));
      console.log($(e.target).attr("data"));
      });
  });
</script>
@endsection
