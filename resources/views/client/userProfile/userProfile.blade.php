@extends('client.master_layout')
@section('content')
    <div class="container-fluid border-bottom px-5 pt-5">
        <!-- User Identety Brief-->
        <div class="profile-identity row">
            <div class="profile-card--avatar shadow-sm border rounded-circle">
                <img src="../../assets/client/images/user-profile-2.png" class="profile-avatar">
                <div class="inactive-dot rounded-circle"></div>
            </div>

            <div class="user-info color-black mt-5 py-0 col-md-8">
                <div class="username color-black">

                    <h5>{{ $data->name }}</h5>
                </div>

                <div class="user-brief text-muted">
                    <p class="d-inline-block ms-3">
                        <i class="fas fa-briefcase"></i> <span class="me-1">{{ $data->specialization }}</span>
                    </p>
                    <p class="d-inline-block">
                        <i class="fa-solid fa-location-dot"></i> <span class="me-1">{{ $data->country }}</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- /User Identety Brief-->

        <!-- Profile Taps -->
        <div class="user-profile-tabs row d-flex justify-content-between align-items-center">
            <nav class="nav fw-bold col-auto">
                <p class="nav-link color-black tab tab-A is-active" id="about" data-current="tab-A">{{__('userProfile.about')}}</p>
                <p class="nav-link color-black tab tab-B" id="rates" data-current="tab-B">{{__('userProfile.ratings')}}</p>
                @if ($role == 'provider' || $role == 'both')
                    <p class="nav-link color-black tab tab-C" id="works" data-current="tab-C">{{__('userProfile.works')}}</p>
                @endif
                @if ($role == 'seeker' || $role == 'both')
                    <p class="nav-link color-black tab tab-C" id="works" data-current="tab-D">{{__('userProfile.projects')}}</p>
                @endif
            </nav>

            <div class="kalefny-btn-div">
                <button type="button" class="btn-kalefny color-gray-lighter fw-bold">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>{{__('userProfile.employ_me')}}</span>
                </button>
            </div>
        </div>
        <!-- /Profile Taps -->
    </div>

    <main class="main-section container mt-3">
        <div class="row d-flex justify-content-between" id="">

            {{-- here the main --}}
            <div class="d-flex">
                <!-- About -->
                <div class="col-sm-12 col-lg-7 color-black about-section px-3 panel  is-show subPage" id="tab-A">
                    <!-- My Brief -->
                    <div class="row">
                        <section class="card shadow-sm col-12 col-sm-12 p-3">
                            <div class="about-me">
                                <div class="section-title">
                                    <h5>{{__('userProfile.breif')}}</h5>
                                </div>
                                <div class="brief-content mt-3">
                                    <p class="">
                                        <i class="fas fa-briefcase ms-1"></i>
                                        <span class="fs-6 fw-bold">{{__('userProfile.specialization')}}:</span>
                                        @if (!empty($cate->title))
                                            <span class="me-1">{{ $cate->title }}</span>
                                        @endif
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-location-dot ms-1"></i>
                                        <span class="fs-6 fw-bold">{{__('userProfile.country')}}:</span>
                                        <span class="me-1">{{ $data->country }}</span>
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-circle-info ms-1"></i>
                                        <span class="fs-6 fw-bold">{{__('userProfile.bio')}}:</span>
                                        <span class="me-1">
                                            {{ $data->bio }}</span>
                                    </p>
                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- /My Brief -->

                    <!-- My Skills -->
                    <div class="row">
                        <section class="card shadow-sm col-12 col-sm-12 mt-3 p-3">
                            <div class="my-skills">
                                <div class="section-title">
                                    <h5>{{__('userProfile.my_skills')}}</h5>
                                </div>
                                <div class="skills mt-3">
                                    @foreach ($skills as $item)
                                        <a class="btn-tag color-gray-lighter" href="#" role="button">
                                            <i class="fa-solid fa-tags"></i>
                                            <span class="me-1">{{ $item->name }}</span>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </section>
                    </div>
                    <!-- /My Skills -->

                    <!-- Ratings -->

                    <!-- /Ratings -->
                </div>
                <!-- /About -->

                <!-- Ratings -->
                <div class="col-sm-12 col-lg-7 color-black px-3 rating-section panel tab-B subPage" id="tab-B">
                    <div class="row">
                        <section class="card shadow-sm col-12 col-sm-12">
                            <div class="my-ratings">
                                <div class="section-title">
                                    <h5>{{__('userProfile.ratings')}}</h5>
                                </div>
                                <div class="brief-content mt-3">
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">
                                            <i class="fa-solid fa-check-double ms-1"></i> {{__('userProfile.goodness')}}
                                        </p>
                                        <p class="">
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">
                                            <i class="fa-solid fa-clock-rotate-left ms-1"></i> {{__('userProfile.displane')}}
                                        </p>
                                        <p class="">
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">
                                            <i class="fa-solid fa-award ms-1"></i> {{__('userProfile.experience')}}
                                        </p>
                                        <p class="">
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">
                                            <!-- <i class="fa-solid fa-handshake-simple ms-1"></i> التعامل -->
                                            <i class="fa-solid fa-handshake ms-1"></i> {{__('userProfile.dealing')}}
                                        </p>
                                        <p class="">
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                        </p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="fs-6 fw-normal">
                                            <!-- <i class="fa-solid fa-tower-broadcast ms-1"></i> التجاوب والتواصل -->
                                            <i class="fa-solid fa-satellite-dish ms-1"></i> {{__('userProfile.communication')}}
                                        </p>
                                        <p class="">
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                            <i class="fa-solid fa-star color-orange-lighter"></i>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
                <!-- /Ratings -->


                <!-- Statistics -->
                <div class="col-sm-12 col-lg-5 color-black px-3 statistics-card " id='aside_subsection'>
                    <div class="row">
                        <section class="card shadow-sm col-12 col-sm-12 p-3">
                            <div class="statistics">
                                <div class="section-title">
                                    <h5>{{__('userProfile.statistics')}}</h5>
                                </div>
                                <div class="statistic-content mt-3">
                                    <p class="">
                                        <i class="fas fa-briefcase ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">{{__('userProfile.employign_rate')}}:</span>
                                        <span class="me-1">66%</span>
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-clipboard-check ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">{{__('userProfile.done_projects')}}:</span>
                                        <span class="me-1">2</span>
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-spinner ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">{{__('userProfile.at_work')}}:</span>
                                        <span class="me-1">0</span>
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-star ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">{{__('userProfile.ratings')}}:</span>
                                        <span class="me-1">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ((int) $data->rating > $i)
                                                    <i class="fa fa-star clr-amber rating-star" style="color: orange;"></i>
                                                @else
                                                    <i class="fa fa-star clr-amber rating-star"
                                                        style="color: gainsboro;"></i>
                                                @endif
                                            @endfor
                                        </span>
                                    </p>
                                </div>
                            </div>

                            <hr>

                            <div class="histories">
                                <div class="section-title">
                                    <h5>{{__('userProfile.hostories')}}</h5>
                                </div>
                                <div class="histories-content mt-3">
                                    <p class="">
                                        <i class="fa-solid fa-calendar-days ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">{{__('userProfile.join_at')}}:</span>
                                        <span class="me-1">{{ $data->created_at }}</span>
                                    </p>
                                </div>
                            </div>

                        </section>
                    </div>
                </div>
                <!-- /Statistics -->


            </div>

            @if ($role == 'provider' || $role == 'both')
                <!-- works -->
                <div class="col-sm-12 col-lg-7 color-black px-3 rating-section panel tab-B subPage" id="tab-C">
                    <div class="row">
                        <section class="card shadow-sm col-12 col-sm-12">
                            <div class="my-ratings">
                                <div class="section-title">
                                    <h5>{{__('userProfile.works')}}</h5>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <!-- /works -->
            @endif


            @if ($role == 'seeker' || $role == 'both')
                <!-- projects -->
                <div class="col-sm-12 col-lg-7 color-black px-3 rating-section panel tab-B subPage" id="tab-D">
                    <div Dlass="row">
                        <section class="card shadow-sm col-12 col-sm-12">
                            <div class="my-ratings">
                                <div class="section-title">
                                    <h5>{{__('userProfile.projects')}}</h5>
                                </div>

                            </div>
                        </section>
                    </div>
                </div>
                <!-- /projects -->
            @endif

        </div>
    </main>

    <script src="/assets/client/js/profile_tabNavigation.js"></script>
@endsection
