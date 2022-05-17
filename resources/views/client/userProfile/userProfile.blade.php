@extends('client.master_layout')
@section('content')
    <div class="container-fluid border-bottom px-5 pt-20">
        <!-- User Identety Brief-->
        <div class="profile-identity row align-items-center">
            <div class="profile-card--avatar shadow-sm border rounded-circle position-relative"
                style="width: 200px ; height: 200px;">
                @if ($data->avatar !== 'http://localhost:8000/images/')
                    <img src="{{ $data->avatar }}" class="profile-avatar position-absoulte"
                        style="width: 100%; height:100%; object-fit: cover">
                @else
                    <img src="/assets/client/images/user-profile-2.png" class="profile-avatar position-absoulte"
                        style="width: 100%; height:100%; object-fit: cover">
                @endif

                <div class="inactive-dot rounded-circle"></div>
            </div>

            <div class="user-info color-black mt-5 py-0 col-md-5">
                <div class="username color-black">

                    <h5 class="font-xl">{{ $data->name }}</h5>

                </div>

                <div class="user-brief text-muted">
                    @if ($data->specialization)
                        <p class="d-inline-block ms-3">
                            <i class="fas fa-briefcase"></i> <span
                                class="me-1">{{ $data->specialization }}</span>
                        </p>
                    @endif
                    @if ($data->country)
                        <p class="d-inline-block">
                            <i class="fa-solid fa-location-dot color-orange"></i> <span
                                class="me-1">{{ $data->country }}</span>
                        </p>
                    @endif

                    @if ($data->hire_me)
                        <p class="d-inline-block">
                            <i class="fas fa-user-tie color-green mx-2 "></i> <span class="me-1"> انا متاح
                                للتوظيف</span>
                        </p>
                    @endif

                </div>

            </div>

            {{-- user report --}}
            <div class="card--actions hidden-xs float-start col-4">
                <div class="dropdown btn-group">
                    @if (Auth::check() && $data->user_id == Auth::id())
                        @role('seeker')
                            <div class="dropdown inline-block relative min-w-fit">
                                <a tabindex="-1"
                                    class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center"
                                    href="{{ route('post') }}">
                                    <i class="fa fa-fw fa-send"></i>
                                    <span class="mr-1"> أضف مشروع </span>
                                    <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path style="color:white ; stroke: white;
                                                                fill: white;"
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                        @endif
                        </a>
                    @endrole
                    <ul
                        class="dropdown-menu w-fit absolute  hidden text-dark-gray bg-light-gray rounded-sm shadow-md pt-2 ">
                        <li class="border-b border-primary-light-pink">
                            <a class="rounded-t bg-gray-200 hover:bg-gray-400 hover:bg-primary-light-gray hover:text-dark-gray py-2 px-4 block whitespace-no-wrap"
                                href="{{ route('report_provider', $data->user_id) }}">
                                التبليغ عن محتوى</a>
                        </li>

                    </ul>
                </div>
            </div>

        </div>
        {{-- user report --}}

    </div>



    <!-- /User Identety Brief-->

    <!-- Profile Taps -->
    <div class="user-profile-tabs row d-flex justify-content-between align-items-center">
        <nav class="nav fw-bold col-auto">
            <p class="nav-link color-black tab tab-A is-active" id="about" data-current="tab-A">حول</p>
            <p class="nav-link color-black tab tab-B" id="rates" data-current="tab-B">التقييمات</p>
            @if ($role == 'provider' || $role == 'both')
                <p class="nav-link color-black tab tab-C" id="works" data-current="tab-C">الأعمال</p>
            @endif
            @if ($role == 'seeker' || $role == 'both')
                <p class="nav-link color-black tab tab-C" id="works" data-current="tab-D">المشاريع</p>
            @endif
        </nav>

        {{-- <div class="kalefny-btn-div">
                <button type="button" class="btn-kalefny color-gray-lighter fw-bold">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>متاح</span>
                </button>
            </div> --}}
    </div>
    <!-- /Profile Taps -->


    <main class="main-section  mt-3 align-items-center">


        {{-- here the main --}}
        <div class="d-flex justify-content-between ">
            <div class="row col-12" id="">

                <!-- About -->
                <div class=" about-section px-3  is-show subPage flex-sm-column flex-lg-row" id="tab-A">
                    <div class="row col-sm-12 col-lg-7">
                        <!-- My Brief -->
                        <div class="row ">
                            <section class="card shadow-sm  col-sm-12 col-lg-4  p-3 ">
                                <div class="about-me">
                                    <div class="section-title">
                                        <h5 class="font-md">نبذة عني</h5>
                                    </div>
                                    <div class="brief-content mt-3">
                                        <p class="p-1">
                                            <i class="fas fa-briefcase ms-1"></i>
                                            <span class="fs-6 fw-bold">التخصص:</span>
                                            @if (!empty($cate->title))
                                                <span class="me-1">{{ $cate->title }}</span>
                                            @endif
                                        </p>
                                        <p class="p-1">
                                            <i class="fa-solid fa-location-dot ms-1"></i>
                                            <span class="fs-6 fw-bold">البلد:</span>
                                            <span class="me-1">{{ $data->country }}</span>
                                        </p>
                                        <p class="p-1">
                                            <i class="fa-solid fa-circle-info ms-1"></i>
                                            <span class="fs-6 fw-bold">تفاصيل أكثر:</span>
                                            <span class="me-1">
                                                {{ $data->bio }}</span>
                                        </p>
                                    </div>
                                </div>
                            </section>

                        </div>
                        <!-- /My Brief -->

                        <!-- My Skills -->
                        <div class="row mb-3">
                            <section class="card shadow-sm col-12 col-sm-12 mt-3 p-3">
                                <div class="my-skills">
                                    <div class="section-title">
                                        <h5 class="font-md">مهاراتي</h5>
                                    </div>
                                    <div class="skills mt-3">
                                        @foreach ($skills as $item)
                                            <a class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center"
                                                href="#" role="button">
                                                <i class="fa-solid fa-tags"></i>
                                                <span class="me-1">{{ $item->name }}</span>
                                            </a>
                                        @endforeach

                                    </div>
                                </div>
                            </section>
                        </div>
                        <!-- /My Skills -->
                    </div>

                    <!-- Statistics -->
                    <div class="col-sm-12 col-lg-5  px-3 statistics-card   " id='aside_subsection'>
                        <div class="row">
                            <section class="card shadow-sm p-3">
                                <div class="statistics">
                                    <div class="section-title">
                                        <h5 class="font-md">إحصائيات</h5>
                                    </div>
                                    <div class="statistic-content mt-3">
                                        <p class="p-1">
                                            <i class="fas fa-briefcase ms-1"></i>
                                            <span class="fs-6 fw-bold d-inll">معدل الطلب:</span>
                                            <span class="me-1">66%</span>
                                        </p>
                                        <p class="p-1">
                                            <i class="fa-solid fa-clipboard-check ms-1"></i>
                                            <span class="fs-6 fw-bold d-inll">المشاريع المسلمة:</span>
                                            <span class="me-1">{{ $data->reseved }}</span>
                                        </p>
                                        <p class="p-1">
                                            <i class="fa-solid fa-spinner ms-1"></i>
                                            <span class="fs-6 fw-bold d-inll">المشاريع قيد العمل:</span>
                                            <span class="me-1">{{ 4 - $data->limit }}</span>
                                        </p>
                                        <p class="p-1 d-flex justify-between">
                                            <span>
                                                <i class="fa-solid fa-star ms-1"></i>
                                                <span class="fs-6 fw-bold d-inll">التقييمات:</span>
                                                <span class="me-1">
                                                    {{-- {{ $rating->countEvalution }} --}}
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($rating >= $i)
                                                            <i class="fa fa-star clr-amber rating-star"
                                                                style="color: orange;"></i>
                                                        @else
                                                            <i class="fa fa-star clr-amber rating-star"
                                                                style="color: gainsboro;"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                            </span>
                                            <span>
                                                [ {{$rating_count}} ]
                                            </span>
                                        </p>
                                    </div>
                                </div>

                                <hr>

                                <div class="histories">
                                    <div class="section-title">
                                        <h5 class="font-md">تواريخ</h5>
                                    </div>
                                    <div class="histories-content mt-3">
                                        <p class="p-1">
                                            <i class="fa-solid fa-calendar-days ms-1"></i>
                                            <span class="fs-6 fw-bold d-inll">تاريخ الانضمام:</span>
                                            <span class="me-1">{{ $data->created_at }}</span>
                                        </p>
                                    </div>
                                </div>

                            </section>
                        </div>
                    </div>
                    <!-- /Statistics -->

                </div>
                <!-- /About -->

                <!-- Ratings -->
                <div class="col-sm-12 col-lg-8  rating-section px-3  is-show  tab-B subPage" id="tab-B">
                    <section class="card shadow-sm col-12 col-sm-12 p-3">
                        <div class="about-me">
                            <div class="section-title">
                                <h5 class="font-md">آراء العملاء</h5>
                            </div>
                            <div class="brief-content mt-3 me-1">
                                @foreach ($evaluations as $evaluate)
                                <div class="row p-3 border-bottom">
                                    <div> <!-- class="d-flex justify-content-between" -->
                                        <div class="flex justify-between mb-2">
                                            <div class="flex justify-between">
                                                <p class="bg-primary-green text-white flex-none px-2 py-1 text-xs">
                                                    مكتمل
                                                </p>
                                                <p class="text-primary-blue font-semibold mr-2">
                                                    {{$evaluate->title}}
                                                </p>
                                            </div>
                                            <div>
                                                <span class="me-1">
                                                    {{-- {{ $rating->countEvalution }} --}}
                                                    @for ($i = 0; $i < 5; $i++)
                                                        @if ($evaluate->value > $i)
                                                            <i class="fa fa-star clr-amber rating-star"
                                                                style="color: orange;"></i>
                                                        @else
                                                            <i class="fa fa-star clr-amber rating-star"
                                                                style="color: gainsboro;"></i>
                                                        @endif
                                                    @endfor
                                                </span>
                                            </div>
                                        </div>
                                        <div class="fs-6 fw-normal d-flex justify-content-start">
                                            <div>
                                                @if ($evaluate->avatar !== null)
                                                    <img src="{{ $evaluate->avatar }}" class="border rounded-circle"
                                                        style="max-width: 50px; max-height: 50px; object-fit: cover">
                                                @else
                                                    <img src="{{ asset('assets/client/images/user-profile-2.png') }}"
                                                        class="border rounded-circle" style="max-width: 50px; height: 50px; object-fit: cover">
                                                @endif
                                            </div>
                                            <div class="me-2">
                                                <p> {{$evaluate->evaluater_name}} </p>
                                                <p class="p-1 text-xs text-primary-pink">
                                                    <i class="fa-regular fa-clock"></i>
                                                    {{$evaluate->created_at}}
                                                </p>
                                            </div>
                                        </div>
                                        <p class="p-1 px-1 me-5">
                                            {{$evaluate->message}}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </section>
                </div>
                <!-- /Ratings -->

                @if ($role == 'provider' || $role == 'both')
                    <!-- works -->

                    <div class="col-sm-12 col-lg-12 color-black px-3 rating-section  tab-B subPage mb-3" id="tab-C">
                        <div class="row row col-12">
                            <section class="card shadow-sm col-12 col-sm-12">
                                <div class="my-ratings">
                                    <div class="py-5">
                                        <div class="row">

                                            @foreach ($works as $item)
                                                <div class="col-lg-6 mb-3 mb-lg-0 my-2">
                                                    <a href="{{ route('detailsWork', $item->id) }}">
                                                        <div class="hover hover-2 text-white rounded"><img
                                                                src="/images/{{ $item->main_image }}" alt="">
                                                            <div class="hover-overlay"></div>
                                                            <div class="hover-2-content px-5 py-4">
                                                                <h3
                                                                    class="hover-2-title text-uppercase font-weight-bold mb-0">
                                                                    <span class="font-weight-light">{{ $item->title }}
                                                                    </span>
                                                                </h3>
                                                                <p class="hover-2-description text-uppercase mb-0">
                                                                    {{ $item->details }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                    <!-- /works -->
                @endif
                @if ($role == 'seeker' || $role == 'both')
                    <!-- projects -->
                    <div class="col-sm-12 col-lg-12 color-black px-3 rating-section  tab-B subPage" id="tab-D">
                        <div class="row  col-12">
                            <section class=" col-12 col-sm-12">
                                <div class="my-ratings">
                                    <!-- /projects -->
                                    <div class="row my-5">
                                        @foreach ($post as $post)
                                            <div class="col-md-12 col-sm-12 my-2">
                                                <div class="card">
                                                    <a href="{{ route('posts.details', $post->id) }}">
                                                        <h5 class="font-md"> {{ $post->title }}</h5>

                                                    </a>

                                                    <div class="line"></div>
                                                    <div class="card-body">
                                                        <p class="card-text"> {{ $post->description }}</p>
                                                    </div>

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </section>
                        </div>
                    </div>
                @endif

            </div>




        </div>
    </main>

    <script src="/assets/client/js/profile_tabNavigation.js"></script>
@endsection
