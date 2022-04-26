@extends('client.master_layout')
@section('content')
    @foreach ($data as $d)
        <!-- My Brief -->
        <form action="{{ route('account_save') }}" method="POST" class="login-form" enctype="multipart/form-data">
            <div class="container-fluid border-bottom px-5 pt-5">
                <!-- User Identety Brief-->
                <div class="profile-identity row">
                    <h4> المعلومات الشخصية</h4>

                <div class="col-md-12  d-flex justify-content-center align-items-center">
                    <div class="col-12  d-flex justify-content-center align-items-center p-4 position-relative">
                        <img src="{{ $d->avatar }}" class="avatar img-circle img-thumbnail" alt="avatar"
                            style="border-radius: 50%; width:150px;height:150px">

                        <label for="avatar" data-bs-toggle="" data-bs-target="" href="/user-account"
                            class="position-absolute bg-white border border-primary rounded d-flex justify-content-center align-items-lg-center rounded-circle"
                            style="bottom: 10%;left: 40%; width: 30px;height: 30px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-pencil-square " viewBox="0 0 16 16">
                                <path
                                    d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd"
                                    d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                            </svg>
                        </label>
                        @error('avatar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


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
                                    <label>الاسم <em class="text--danger">*</em>
                                    </label>
                                    <input class="form-control" placeholder="أكتب اسمك باللغة العربية" type="text"
                                        name=" name" value="{{ $d->name }}">
                                    @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-sm-6 col-xs-12 pt-3">
                                    <div class="form-group  ">
                                        <label>الصورة <em class="text--danger">*</em>
                                        </label>
                                        {{-- <label for="username" class="form-label">{{ __('login.name') }}</label> --}}
                                        {{-- <input type="file" name="avatar" value="{{ $d->avater }}" required="required"> --}}
                                        {{-- <input class="form-control" type="file"
                                            value="{{ $d->avater }}" required="required"> --}}
                                        <input type="file" name="avatar" value="{{ $d->avater }}" required="required"
                                            id='avatar' hidden />

                                    </div>

                                </div>
                                {{-- <div class="col-sm-6 col-xs-12 pt-3">
                            <div class="form-group  ">
                                <label>اسم العائلة  <em class="text--danger">*</em>
                                </label>
                                <input class="form-control" placeholder="أكتب اسمك باللغة العربية" type="text" name="first_name" value="Mohammed">
                            </div> --}}


                            </div>
                            <div class="col-sm-6 col-xs-12 pt-3">
                                <div class="form-group  ">
                                    <label> الجنس <em class="text--danger">*</em>
                                    </label>
                                    <select class="form-select" aria-label="Default select example" name="gender"
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
                                    <label>الدولة <em class="text--danger">*</em>
                                    </label>
                                    <select class="form-select" aria-label="Default select example" name="country"
                                        required="required">
                                        <option @if ($d->country == 'yem') selected @endif value="yem">اليمن
                                        </option>
                                        <option @if ($d->country == 'ksa') selected @endif value="ksa">السعودية
                                        </option>
                                        <option @if ($d->country == 'egy') selected @endif value="egy">مصر
                                        </option>
                                        <option @if ($d->country == 'UAE') selected @endif value="UAE">الامارات
                                        </option>

                                    </select>
                                    @error('country')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>

                            <div class="col-sm-6 col-xs-12 pt-3">
 <input name="mobile" id="phone" type="tel" value="{{ $d->mobile }}">
                                <span id="valid-msg" class="hide">رقم صحيح</span>
                                <span id="error-msg" class="hide">رقم غير صحيح</span>
                                @error('mobile')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="col-sm-6 col-xs-12 pt-3">
                            <div class="form-group  ">
                                <label>اللغة  <em class="text--danger">*</em>
                                </label>
                            </div>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>العربية</option>
                                <option value="">English</option>

                              </select>

                        </div> --}}

                            <div class=" mx-auto pt-3">
                                <button class="wak_btn w-full" type="submit">حفظ
                                    الاعدادت</button>

                            </div>



                        </div>

                    </div>

                </div>

            </main>
        </form>
    @endforeach
@endsection
