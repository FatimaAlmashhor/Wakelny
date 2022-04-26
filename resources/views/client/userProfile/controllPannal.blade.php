@extends('client.master_layout')
@section('content')

    <main class="container">
        <!-- top nav start -->
        <div class="row mx-1  my-3 col-12 d-flex justify-content-lg-between ">
            <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                <ol class="breadcrumb ms-3">
                    <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>/&nbsp&nbsp&nbsp
                    <li class=" active fs-6 fw-bold" aria-current="page"> <a href="{{ route('account') }}"> تغيير
                            إعدادات الحساب </a></li>
                </ol>

            </nav>
        </div>
        <!-- top nav end -->

        <!-- side sec -->
        <div class="row">


            <!-- Dashboard Nav Section -->

            @include('client.components.dash_nav')

            <!-- info Section -->
            <section class="col-lg-8 col-md-8 col-12" id="perso">

                <div class="card shadow-sm ">


                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                        <h3 class="fs-5" style="color:rgba(77, 212, 172, 1);">{{ __('profile.Personal_Info') }}
                        </h3>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('profile_save') }}" method="POST" class="login-form"
                            enctype="multipart/form-data">
                            @csrf
                            @foreach ($data as $item)
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">{{ __('profile.type') }}</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <div class="mx-2 my-2 px-2">

                                            <input class="form-check-input mx-2" type="checkbox"
                                                {{ $role == 'seeker' || $role == 'both' ? 'checked' : '' }} name="seeker"
                                                id="">

                                            <strong> {{ __('profile.person1') }}</strong>
                                            (أبحث عن مستقلين لتنفيذ مشاريعي)
                                        </div>
                                        <div class="mx-2 my-2 px-2">

                                            <input class="form-check-input mx-2" type="checkbox"
                                                {{ $role == 'provider' || $role == 'both' ? 'checked' : '' }}
                                                name="provider" id="">

                                            <strong> {{ __('profile.person2') }}</strong>
                                            (أبحث عن مشاريع لتنفيذها)
                                            <div class="mx-2 my-2 px-2">

                                                <input class="form-check-input mx-2" type="checkbox" name="hire_me"
                                                    {{ $item->hire_me ? 'checked' : '' }}>

                                                <strong> {{ __('profile.person21') }}</strong>
                                                (ازالة هذه الاشارة سيخفي حسابك بشكل مؤقت من نتائج البحث)
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-md-6">
                                        <label for="" class="col-md-6 col-form-label">
                                            {{ __('profile.person3') }}</label>
                                        <select class="form-control" name="category_id" data-actions-box="true">
                                            @foreach ($categories as $cate)
                                                <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="col-md-6 col-form-label">
                                            {{ __('profile.person4') }}</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="" name="specialization"
                                                value="{{ $item->specialization }}">
                                        </div>
                                        @error('job_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row">

                                    <label for="" class="col-md-6 col-form-label"> {{ __('profile.person5') }}</label>
                                    <textarea class="form-control" placeholder=" {{ __('profile.person5') }}" id=""
                                        name="bio">{{ $item->bio }}</textarea>
                                    @error('bio')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="block border-top mt-5 w-full"></div>

                                <div class="row mt-4">

                                    <label for="" class="col-md-12 col-form-label"> {{ __('profile.person6') }}</label>
                                    <input type="url" class="form-control" id="" name="video"
                                        value="{{ $item->video }}">

                                </div> @error('video')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror

                    </div>

                    <div class="row w-full  ">

                        <button class="wak_btn w-full" type="submit">أحفظ</button>

                    </div>
                    @endforeach
                    {{ csrf_field() }}
                    </form>
                </div>

            </section>
        </div>
    </main>
@endsection
