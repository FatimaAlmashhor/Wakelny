@extends('client.master_layout')
@section('content')
    {{-- Header --}}
    @include('client.components.header')
    <!-- Page Content-->
    <section class="pt-4">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <div class="row gx-lg-5 my-5 text-center">
                <h1 class="my-3 pb-4 fw-normal"style="color:#4dd4ac;"> {{ __('home.distinguishes') }}</h1>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-collection"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature11') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_11') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-cloud-download"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature22') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_22') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-card-heading"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature33') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_33') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-bootstrap"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature44') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_44') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-code"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature55') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_55') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-patch-check"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature66') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_66') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- small section --}}
    <section>
        <div id="locations" class="banner signup p-y-3">
            <div class="wrapper">
                <h2 class="m-b-2 display-5 text-uppercase pb-3"style="color:#4dd4ac;">{{ __('home.dont_chance') }}</h2>
                <div class="my-4">
                    <a href="{{route('create_user')}}" class="wak_btn orange  " data-toggle="modal" data-target="#signup_form_modal">سجل الان</a>
                </div>

            </div>
        </div>
    </section>






    <section>

        <!-- Start Landing -->
        <div class="landing">

           <div class="container">

               <div class="text">
                   <h1 style="color:#4dd4ac;">نعمل معا </h1>
                   <p style="color:#4dd4ac;"> لتحقيق تطلعاتك على اكمل وجه ...</p>
                 </div>
                 <div class="image">
                   <img src="../../assets/client/images/motion.png" alt="" />
                 </div>
               </div>
               <a href="#articles" class="go-down">
                 <i class="fas fa-angle-double-down fa-2x"></i>
               </a>
       </div>
   <!-- End Landing -->
       </section>


    {{-- catregrie ssection --}}
    <section class="">
        <div class="container my-5">
            <h2 class="fw-normal text-center py-3 my-3 pb-4 fw-normal" style="color:#4dd4ac;"> {{ __('home.category_kalefny') }}</h2>
            <div class="row">

<!------Slider Bootstrap----->


                <div class="col-md-4 py-2">
                    <div class="card h-100 text-center bg-second-green-color color-black">
                        <div class="card-body ">
                            <h3 class="card-title"><i class="fas fa-briefcase"></i></h3>
                            <p class="card-text" >{{ __('home.cate1') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 py-2">
                    <div class="card h-100 text-center bg-second-oringe-color color-black">
                        <div class="card-body ">
                            <h3 class="card-title"><i class="fas fa-code"></i></h3>
                            <p class="card-text">{{ __('home.cate2') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 py-2">
                    <div class="card h-100 text-center bg-second-green-color color-black">
                        <div class="card-body ">
                            <h3 class="card-title"><i class="fas fa-video"></i></h3>
                            <p class="card-text">{{ __('home.cate3') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>


<!-- Carousel  Bootstrab-->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
      <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
    </div>

    <!-- The slideshow/carousel -->
    <div class="carousel-inner"style="width: 80%; height:80%;
    transform: translate(50%, -50%);
    top: 185px;
    left: 0;
    right: 50%;
    bottom: 30%;">
      <div class="carousel-item active">
        <img src="../../assets/client/images/suq.jpg"  width="250px" height="350px; alt="Los Angeles" class="d-block" style="width:100%">
        <div class="carousel-caption d-none d-md-block">
            <h4>تسويق الكتروني</h4>
          </div>
      </div>
      <div class="carousel-item">
        <img src="../../assets/client/images/grafic.jpg" width="150px" height="350px;" alt="Chicago" class="d-block" style="width:100%">
        <div class="carousel-caption d-none d-md-block">
            <h4 ">خدمات استشارية وادارية</h4>
          </div>
      </div>
      <div class="carousel-item">
        <img src="../../assets/client/images/web5.jpg"  width="150px" height="350px;" alt="New York" class="d-block" style="width:100%">
        <div class="carousel-caption d-none d-md-block">
            <h4>  تطوير مواقع الويب</h4>
          </div>
      </div>
    </div>

    <!-- Left and right controls/icons -->
    <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
      <span class="carousel-control-next-icon"></span>
    </button>
  </div>




    </section>

    <!--------------------------------SEction>---------->


 {{-- commeon Services --}}

    <section>

    </section>

    {{-- commeon quetion --}}
    <section class="container px-lg-5 my-5">
        <h2 class="fw-normal text-center my-4" style="color:#4dd4ac;">{{ __('home.Question_major') }}</h2>
        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        {{ __('home.q1') }}
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{ __('home.kalefny') }}
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        {{ __('home.q2') }}
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{ __('home.benefints') }}

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        {{ __('home.feature_des_7') }}
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{ __('home.cate7') }}

                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        {{ __('home.q3') }}
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        {{ __('home.service') }}

                    </div>
                </div>
            </div>
        </div>
        </div>

    </section>




@endsection
