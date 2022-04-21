@extends('client.userProfile.master_profile_layout')

@section('profile_content')
    <!-- My Brief -->
    <div class="row">
        <section class="card shadow-sm col-12 col-sm-12 p-3">
            <div class="about-me">
                <div class="section-title"><h5>نبذة عني</h5></div>
                <div class="brief-content mt-3">
                    <p class="">
                        <i class="fas fa-briefcase ms-1"></i>
                        <span class="fs-6 fw-bold d-inll">التخصص:</span>
                        <span class="me-1">متخصصة في برمجة مواقع الويب</span>
                    </p>
                    <p class=""> 
                        <i class="fa-solid fa-location-dot ms-1"></i>
                        <span class="fs-6 fw-bold d-inll">البلد:</span>
                        <span class="me-1">اليمن</span>
                    </p>
                    <p class=""> 
                        <i class="fa-solid fa-circle-info ms-1"></i>
                        <span class="fs-6 fw-bold d-inll">تفاصيل أكثر:</span>
                        <span class="me-1">
                            خريج حاسبات ومعلومات قسم هندسه برمجيات.
                            full time backend dev في شركه wegroup pro alex.
                            backend developer using php laravel and ai learner</span>
                    </p>
                </div>
            </div>
        </section>
    </div>
    <!-- /My Brief -->

    <!-- /My Skills -->
    <div class="row">
        <section class="card shadow-sm col-12 col-sm-12 mt-3 p-3">
            <div class="my-skills">
                <div class="section-title"><h5>مهاراتي</h5></div>
                <div class="skills mt-3">
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">الإدارة</span>
                    </a>
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">إدارة مشاريع</span>
                    </a>
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">برمجة مواقع الويب</span>
                    </a>
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">التصميم</span>
                    </a>
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">التصوير</span>
                    </a>
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">الفوتوشوب</span>
                    </a>
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">تطبيقات اوفيس</span>
                    </a>
                    <a class="btn-tag color-gray-lighter" href="#" role="button">
                        <i class="fa-solid fa-tags"></i>
                        <span class="me-1">اللغة الإنجليزية</span>
                    </a>
                </div>
            </div>
        </section>
    </div>
    <!-- /My Skills -->
@endsection
