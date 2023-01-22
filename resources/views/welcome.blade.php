<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Absence App</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/styles/css/themes/lite-purple.min.css')}}"></head>
    <style>
      .loadscreen {
          text-align: center;
          position: fixed;
          width: 100%;
          left: 0;
          right: 0;
          margin: auto;
          top: 0;
          height: 100vh;
          background: #ffffff;
      }

      .loadscreen .loader {
          position: absolute;
          top: calc(50vh - 50px);
          left: 0;
          right: 0;
          margin: auto;
      }

      .loadscreen .logo {
          display: inline-block !important;
          width: 80px;
          height: 80px;
      }
  </style>
<body>
    <header class="main-header">
        <div class="container">
            <div class="topbar">
                <nav class="navbar navbar-expand-lg header-nav d-flex justify-content-between">
                    <div class="brand ul-landing__brand">
                        <a class="navbar-brand" href="#">
                            
                        </a>
                        
                    </div>
                  
                    
            @if (Route::has('login'))
            <div class="">
                            <ul class="navbar-nav ml-auto">
                            @auth
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
                                </li>
                            @else
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('login') }}">Login <span class="sr-only"></span></a>
                                </li>
                                @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">register</a>
                                </li>
                                @endif
                            @endif
                                
                            </ul>
                        </div>
                        @endif

                       
                </nav>
               
            </div>
        </div>
    </header>

    



    
    
    



 

     


    <!-- blog -->

    <section class="blog">
        <div class="container">
            <h2>Is it really worth it?</h2>
            <p>A powerful admin template is like a high-end car. 
              Each of its components is built carefully and keeping efficiency in mind. Once the individual parts are developed, engineers can assemble the product. 
              The quality of their individual components defines the most powerful machines. 
            </p>
            <p>Gull is just like the car in the above analogy. Yeah, it's powerful enough on its own right. But, it aims at SAVING your TIME. 
              As with every successful ERP dashboard, efficiency lies at the core of Gull - 
              and it makes sure you don't have to trade off the performance with productivity during the same time.</p>

            <p>If you are looking for a quality admin template to boost your ongoing startup application or are merely looking for pre-built chat application, 
              calendar schedule app, to-do list app, and such for your eCommerce backend or CMS solution, 
              Gull can and will be the perfect project management dashboard for you.</p>

            
        </div>
    </section>


    <!-- footer -->

    <section class="footer bg-home text-center">
        <div class="container">
            <div class="row footer-item">
                <div class="col-md-4">
                    <!-- <div class="social-media">
                        <ul>
                            <li>
                                <a class="" href="#">
                                    <i data-feather="facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="#">
                                    <i data-feather="twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a class="" href="#">
                                    <i data-feather="linkedin"></i>
                                </a>
                            </li>
                        </ul>
                    </div> -->
                </div>
                <div class="col-md-4">
                    <div class="selling-btn">
                        <a class="btn btn-raised btn-raised-primary btn-xl rounded" href="https://themeforest.net/item/gull-bootstrap-laravel-admin-dashboard-template/23101970">Buy Now</a>
                    </div>
                </div>
                <div class="col-md-4">
                    <!-- <div class="btn-arrow">
                        <button class="btn">
                            <i data-feather="arrow-up"></i>
                        </button>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="footer-bootom">
            <p>© 2019 Gull, By Team Ui Lib</p>
        </div>
    </section>

    <div class="loadscreen">
      <div class="loader">
          <img src="{{asset('assets/images/logo.png')}}" class="logo mb-3" style="display: none" alt="">
          <div class="loader-bubble loader-bubble-primary d-block"></div>
      </div>
    </div>

    <script src="{{asset('assets/js/vendor/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/vendor/feather.min.js')}}"></script>
    <script src="{{asset('assets/js/landing.script.js')}}"></script>

    <script>
      /* ----------------------------- 
      Pre Loader
      ----------------------------- */
      $(window).on('load', function () {
          'use strict';
          $('.loadscreen').delay(500).fadeOut();
          // $('#preloader').delay(800).fadeOut('slow');
      });
  </script>
</body>
</html>