@extends('client.master_layout')
@section('content')
    <section class="ftco-section">
        <div class="container  ">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="wak_form p-4 p-md-5 border shadow-sm my-5 ">

                        <h3 class="text-center mb-4">{{ __('login.create_account') }}</h3>
                        <p style="text-align: center"> {{ __('login.start_joriny') }}!</p>

                        <form action="{{ route('save_user') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="username" class="form-label">{{ __('login.name') }}</label>

                                <input type="text" class="form-control rounded-left" placeholder="ادخل اسمك" name="name"
                                    value="{{ old('name') }}">

                                @error('name')
                                    <span class="text-danger w-100">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-2">
                                <label for="text" class="form-label">{{ __('login.email') }}</label>
                                <input type="email" class="form-control rounded-left"
                                    placeholder="ادخل البريد الالكتروني الخاص بك" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="text-danger w-100">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.password') }}</label>
                                <div class="input-group input-group-merge  w-100">
                                    <input style="height: 38px;" type="password" class="form-control" name="user_pass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" name="password" />


                                    {{-- @error('user_pass')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            @error('user_pass')
                                <div class="text-danger  w-100">{{ $message }}</div>
                            @enderror
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.cpassword') }}</label>
                                <div class="input-group input-group-merge">
                                    <input style="height: 38px;" type="password" class="form-control" name="confirm_pass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />

                                    @error('confirm_pass')
                                        <div class="text-danger  w-100">{{ $message }}</div>
                                    @enderror
                                    {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                                </div>
                            </div>

                            <button class="wak_btn d-grid w-100">
                                {{ __('login.register') }}
                            </button>
                            {{ csrf_field() }}
                            <div class="d-flex mt-4  colot-black  w-100 mt-3">
                                <a href="{{ route('loginWithGoogle') }} " class="text-center wak_btn green_border ">
                                    {{ __('login.register') }} مع Google
                                    <i class="fab fa-google fa-fw"></i>
                                </a>
                            </div>
                            <p class="text-center font-sm mt-3">
                                <span>{{ __('login.have_account') }}</span>
                                <a href="{{ route('login') }}">
                                    <span style="color: #0d41fd">تسجيل الدخول</span>
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection
