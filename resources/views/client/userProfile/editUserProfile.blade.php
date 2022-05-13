@extends('client.master_layout')
@section('content')
    @foreach ($data as $d)
        <!-- My Brief -->

        <form action="{{ route('account_save') }}" method="POST" class="login-form" enctype="multipart/form-data">
            <div class="container-fluid border-bottom  pt-20">
                   <h4 class=" font-xl font-bold"> المعلومات الشخصية</h4>

                <!-- User Identety Brief-->
                <div class="profile-identity row">

                    <div class="col-md-12  d-flex justify-content-center align-items-center">
                        <div class="col-12  d-flex justify-content-center align-items-center p-4 position-relative">
                            {{-- the image --}}
                            <div class="position-relative" style="border-radius: 50%; width:170px;height:170px">
                                @if ($d->avatar !== 'http://localhost:8000/images/' )
                                    <img src="{{ $d->avatar }}" class="" alt="avatar"
                                        style=" object-fit: cover;border-radius: 100%; width:100%;height:100%"
                                        id='avatar_show'>
                                @else
                                    <img src="{{ asset('assets/client/images/user-profile-2.png') }}"
                                        class="" alt="avatar"
                                        style=" object-fit: cover;border-radius: 100%; width:100%;height:100%"
                                        id='avatar_show'>
                                @endif


                                {{-- the icon for upload --}}
                                <div class="position-absolute" style="bottom: 4%;left: 10%;">
                                    <label for="avatar" style=" width: 30px;height: 30px;" data-bs-toggle=""
                                        data-bs-target="" href="/user-account"
                                        class=" bg-white border border-primary rounded d-flex justify-content-center align-items-lg-center rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                            class="bi bi-pencil-square " viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </label>
                                    <input hidden type="file" name="avatar" id='avatar' value="{{ $d->avater }}"
                                        accept="image/gif, image/jpeg, image/png" onchange="readURL(this);" />
                                </div>
                            </div>


                        </div>
                        @error('avatar')
                            <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <!-- /User Identety Brief-->

                    <!-- Profile Taps -->
                    <div class="user-profile-tabs row d-flex justify-content-between align-items-center">



                    </div>
                    <!-- /Profile Taps -->
                </div>

                <main class="card col-12 col-lg-4 container mt-3 pt-4 my-4" style="max-width:800px ; width: 100%">
                    <div class="row d-flex justify-content-between" id="">
                        <!-- About -->
                        <div class="col-sm-12 col-lg-12 color-black about-section px-3 panel  is-show subPage" id="tab-A">


                            @csrf
                            <div class="row">

                                <div class="col-sm-6 col-xs-12 pt-3">
                                    <div class="form-group  ">
                                        <label class="font-md">الاسم
                                        </label>
                                        <input class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" placeholder="أكتب اسمك باللغة العربية" type="text"
                                            name=" name" value="{{ $d->name }}">
                                        @error('name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6 col-xs-12 pt-3">
                                        <div class="form-group  ">
                                            {{-- <label>الصورة <em class="text--danger">*</em>
                                        </label> --}}
                                            {{-- <label for="username" class="form-label">{{ __('login.name') }}</label> --}}
                                            {{-- <input type="file" name="avatar" value="{{ $d->avater }}" required="required"> --}}
                                            {{-- <input class="form-control" type="file"
                                            value="{{ $d->avater }}" required="required"> --}}


                                        </div>

                                    </div>

                                </div>
                                <div class="col-sm-6 col-xs-12 pt-3">
                                    <div class="form-group  ">
                                        <label class="font-md"> الجنس
                                        </label>
                                        <select class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" aria-label="Default select example" name="gender"
                                            required="required">
                                            {{-- <option selected>الجنس</option> --}}
                                            <option @if ($d->gender == 1) selected @endif value="1">ذكر</option>
                                            <option @if ($d->gender == -1) selected @endif value="-1">انثى
                                            </option>

                                        </select>
                                        @error('gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                </div>
                                <div class="col-sm-6 col-xs-12 pt-3">
                                    <div class="form-group  ">
                                        <label class="font-md">الدولة
                                        </label>
                                        <select class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" aria-label="Default select example" name="country"
                                            required="required">
                                            <option @if ($d->country == 'Yemen') selected @endif value="Yemen">اليمن
                                            </option>
                                            <option @if ($d->country == 'ksa') selected @endif value="ksa">السعودية
                                            </option>
                                            <option @if ($d->country == 'Egypt') selected @endif value="Egypt">مصر
                                            </option>
                                            <option @if ($d->country == 'UAE') selected @endif value="UAE">الامارات
                                            </option>

                                        </select>
                                        @error('country')
                                            <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                                style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-sm-6 col-xs-12 pt-3">

                                    <label class="font-md">رقم الهاتف </label>
                                    <input name="mobile" class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" id="phone" type="tel"
                                        value="{{ $d->mobile }}">
                                    @error('mobile')
                                        <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                            style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                               <div>
                            <button class="mo-btn btn-blue-bg float-left font-md mt-3" type="submit">حفظ الاعدادات
                            </button>
                        </div>
                            </div>
                        </div>
                    </div>
                </main>
        </form>
    @endforeach
@endsection
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#avatar_show').attr('src', e.target.result);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
