@extends('client.master_layout')
@section('content')
    <div class="container-fluid border-bottom px-5 pt-5">
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

            <div class="user-info color-black mt-5 py-0 col-md-6">
                <div class="username color-black">

                    <h5>{{ $data->name }}</h5>

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
            <div class="card--actions hidden-xs float-start col-2">
                <div class="dropdown btn-group">

                    <a tabindex="-1" class="wak_btn" href="#">
                        <i class="fa fa-fw fa-send"></i>
                        <span class="action-text">كلفني </span>
                    </a>



                    <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{-- <i class="fa fa-caret-down"></i> --}}
                    </button>
                    <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu" aria-labelledby="خيارات">
                        <li class="my-2 border-bottom text-end ">
                            <a tabindex="-1" href="">
                                <i class="fa fa-fw fa-bookmark"></i>
                                <span class="action-text">أضف إلى المفضلة</span>
                            </a>
                        </li>




                        <li class="text-end my-2 px-2">
                            <a tabindex="-1" href="{{ route('report_provider', $data->user_id) }}">
                                <i class="fa fa-fw fa-flag"></i>
                                <span class="action-text">تبليغ عن مستخدم</span>
                            </a>
                        </li>

                    </ul>
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
                    <span>كلفني</span>
                </button>
            </div> --}}
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
                                    <h5>نبذة عني</h5>
                                </div>
                                <div class="brief-content mt-3">
                                    <p class="">
                                        <i class="fas fa-briefcase ms-1"></i>
                                        <span class="fs-6 fw-bold">التخصص:</span>
                                        @if (!empty($cate->title))
                                            <span class="me-1">{{ $cate->title }}</span>
                                        @endif
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-location-dot ms-1"></i>
                                        <span class="fs-6 fw-bold">البلد:</span>
                                        <span class="me-1">{{ $data->country }}</span>
                                    </p>
                                    <p class="">
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
                    <div class="row">
                        <section class="card shadow-sm col-12 col-sm-12 mt-3 p-3">
                            <div class="my-skills">
                                <div class="section-title">
                                    <h5>مهاراتي</h5>
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
                                    <h5>آراء العملاء</h5>
                                </div>
                                <div class="brief-content mt-3">
                                    @foreach ($evaluates as $evaluate)
                                        
                                    @endforeach
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
                                    <h5>إحصائيات</h5>
                                </div>
                                <div class="statistic-content mt-3">
                                    <p class="">
                                        <i class="fas fa-briefcase ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">معدل الطلب:</span>
                                        <span class="me-1">66%</span>
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-clipboard-check ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">المشاريع المسلمة:</span>
                                        <span class="me-1">{{ $data->reseved }}</span>
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-spinner ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">المشاريع قيد العمل:</span>
                                        <span class="me-1">{{ 4 - $data->limit }}</span>
                                    </p>
                                    <p class="">
                                        <i class="fa-solid fa-star ms-1"></i>
                                        <span class="fs-6 fw-bold d-inll">التقييمات:</span>
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
                                    <h5>تواريخ</h5>
                                </div>
                                <div class="histories-content mt-3">
                                    <p class="">
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

            @if ($role == 'provider' || $role == 'both')
                <!-- works -->
                <div class="col-sm-12 col-lg-7 color-black px-3 rating-section panel tab-B subPage" id="tab-C">
                    <div class="row">
                        <section class="card shadow-sm col-12 col-sm-12">
                            <div class="my-ratings">
                                <div class="section-title">
                                    <h5>الاعمال</h5>
                                </div>
                                <div class="row">
                                    @foreach ($works as $item)
                                        <div class="col-sm-6">
                                            <div class="card">
                                                <img src="/images/{{ $item->main_image }}" class="card-img-top"
                                                    alt="...">
                                                <div class="card-body">
                                                    <p class="card-text">{{ $item->title }}.</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
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
                                    <h5>المشاريع</h5>
                                </div>
                                <!-- /projects -->
                                <div class="row my-5">
                                    @foreach ($post as $post)
                                        <div class="col-md-12 col-sm-12">
                                            <div class="card">
                                                <a href="{{ route('posts.details', $post->id) }}">
                                                <h5 class="card-header"> {{ $post->title }}</h5>
                                                </a>

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
    </main>

    <script src="/assets/client/js/profile_tabNavigation.js"></script>
@endsection
