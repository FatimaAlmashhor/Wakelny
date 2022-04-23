@extends('client.master_layout')
@section('content')
    {{-- Header --}}
    @include('client.components.header')
    <!-- Page Content-->
    <section class="pt-4">
        <div class="container px-lg-5">
            <!-- Page Features-->
            <div class="row gx-lg-5 my-5 text-center">
                <h1 class="my-3 pb-4 fw-normal"> {{ __('home.distinguishes') }}</h1>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-collection"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature1') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_1') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-cloud-download"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature2') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_2') }}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-card-heading"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature3') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_3') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-bootstrap"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature4') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_4') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-code"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature5') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_5') }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-xxl-4 mb-5">
                    <div class="card bg-light border-0 h-100">
                        <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                            <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                                    class="bi bi-patch-check"></i></div>
                            <h2 class="fs-4 fw-bold">{{ __('home.feature6') }}</h2>
                            <p class="mb-0">{{ __('home.feature_des_6') }}</p>
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
                <h2 class="m-b-2 display-5 text-uppercase pb-3">{{ __('home.dont_chance') }}</h2>
                <div class="my-4">
                    <a href="{{route('create_user')}}" class="wak_btn orange  " data-toggle="modal" data-target="#signup_form_modal">سجل الان</a>
                </div>

            </div>
        </div>
    </section>
    {{-- catregrie ssection --}}
    <section class="">
        <div class="container my-5">
            <h2 class="fw-normal text-center py-3"> {{ __('home.category_kalefny') }}</h2>
            <div class="row">

                <div class="col-md-4 py-2">
                    <div class="card h-100 text-center bg-second-green-color color-black">
                        <div class="card-body ">
                            <h3 class="card-title"><i class="fas fa-briefcase"></i></h3>
                            <p class="card-text">{{ __('home.cate1') }}
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
    {{-- commeon quetion --}}
    <section class="container px-lg-5 my-5">
        <h2 class="fw-normal text-center my-4">{{ __('home.Question_major') }}</h2>
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
