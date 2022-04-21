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
                    <h5>اسم المستخدم</h5>
                </div>

                <div class="user-brief text-muted">
                    <p class="d-inline-block ms-3">
                        <i class="fas fa-briefcase"></i> <span class="me-1">متخصصة في برمجة مواقع الويب Full Stack Developer</span>
                    </p>
                    <p class="d-inline-block">
                        <i class="fa-solid fa-location-dot"></i> <span class="me-1">اليمن</span>
                    </p>
                </div>
            </div>
        </div>
        <!-- /User Identety Brief-->

        <!-- Profile Taps -->
        <div class="user-profile-tabs row d-flex justify-content-between align-items-center">
            <nav class="nav fw-bold col-auto">
                <a class="nav-link activated color-black" aria-current="page" href="">حول</a>
                <a class="nav-link color-black" href="#">الأعمال</a>
                <a class="nav-link color-black" href="#">التقييمات</a>
            </nav>

            <div class="kalefny-btn-div">
                <button type="button" class="btn-kalefny color-gray-lighter fw-bold" >
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>وكلني</span>
                </button>
            </div>
        </div>
        <!-- /Profile Taps -->
    </div>

    <main class="main-section container">
        <div class="row d-flex justify-content-between">
            <div class="col-sm-12 col-lg-7 color-black p-3">
                @yield('profile_content')
            </div>

            <div class="col-sm-12 col-lg-5 color-black p-3 general-info">
                <!-- Statistics -->
                <div class="row">
                    <section class="card shadow-sm col-12 col-sm-12 p-3">
                        <div class="statistics">
                            <div class="section-title"><h5>إحصائيات</h5></div>
                            <div class="statistic-content mt-3">
                                <p class="">
                                    <i class="fas fa-briefcase ms-1"></i>
                                    <span class="fs-6 fw-bold d-inll">معدل الطلب:</span>
                                    <span class="me-1">66%</span>
                                </p>
                                <p class=""> 
                                    <i class="fa-solid fa-clipboard-check ms-1"></i>
                                    <span class="fs-6 fw-bold d-inll">المشاريع المسلمة:</span>
                                    <span class="me-1">2</span>
                                </p>
                                <p class=""> 
                                    <i class="fa-solid fa-spinner ms-1"></i>
                                    <span class="fs-6 fw-bold d-inll">المشاريع قيد العمل:</span>
                                    <span class="me-1">0</span>
                                </p>
                                <p class=""> 
                                    <i class="fa-solid fa-star ms-1"></i>
                                    <span class="fs-6 fw-bold d-inll">التقييمات:</span>
                                    <span class="me-1">
                                        <i class="fa-solid fa-star color-orange-lighter"></i>
                                        <i class="fa-solid fa-star color-orange-lighter"></i>
                                        <i class="fa-solid fa-star color-orange-lighter"></i>
                                        <i class="fa-solid fa-star color-orange-lighter"></i>
                                        <i class="fa-solid fa-star color-orange-lighter"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        
                        <hr>

                        <div class="histories">
                            <div class="section-title"><h5>تواريخ</h5></div>
                            <div class="histories-content mt-3">
                                <p class="">
                                    <i class="fa-solid fa-calendar-days ms-1"></i>
                                    <span class="fs-6 fw-bold d-inll">تاريخ الانضمام:</span>
                                    <span class="me-1">22-4-2022</span>
                                </p>
                            </div>
                        </div>
                        
                    </section>
                </div>
                <!-- /Statistics -->
            </div>
        </div>
    </main>
@endsection
