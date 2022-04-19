@extends('client.master_layout')
@section('content')
    <!-- Page Content-->
    <div class="container-fluid border-bottom p-5">
        <div class="profile-identity d-flex justify-content-start">
            <div class="profile-card--avatar shadow-sm rounded-circle">
                <img src="../../assets/client/images/user-profile-2.png" class="rounded-circle profile-avatar">
                <div class="is_active-dot rounded-circle"></div>
            </div>

            <div class="user-info color-black d-flex flex-column justify-content-center mt-5 py-0">
                <div class="username">
                    <!-- <h5>اسم المستخدم</h5> -->
                    <h5>ضحى الخراساني</h5>
                </div>

                <div class="user-brief text-muted">
                    <p class="d-inline-block ms-3">
                        <!-- <i class="fas fa-briefcase"></i> <span class="me-1">التخصص</span> -->
                        <i class="fas fa-briefcase"></i> <span class="me-1">متخصصة في برمجة مواقع الويب Full Stack Developer</span>
                    </p>
                    <p class="d-inline-block">
                        <!-- <i class="fa-solid fa-location-dot"></i> <span class="me-1">البلد</span> -->
                        <i class="fa-solid fa-location-dot"></i> <span class="me-1">اليمن</span>
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
