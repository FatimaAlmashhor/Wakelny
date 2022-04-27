@extends('client.master_layout')
@section('content')
    <section class="ftco-section">
        <div class="container  ">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="wak_form p-4 p-md-5 border shadow-sm my-5">

                        <h3 class="text-center mb-4">{{ __('login.sign_in') }}</h3>
                        <p style="text-align: center"> {{ __('login.start_joriny') }}!</p>

                        <form action="{{ route('do_login') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="text" class="form-label">{{ __('login.email') }}</label>

                                <input type="email" class="form-control rounded-left"
                                    placeholder="ادخل البريد الاكتروني الخاص يك" name="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="text-danger w-100">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input style="height: 38px;" type="password" class="form-control" name="user_pass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" name="password" />

                                    @error('user_pass')
                                        <div class="text-danger  w-100">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <button class="wak_btn d-grid w-100">{{ __('login.go_login') }}
                            </button>
                            {{ csrf_field() }}
                            <div class="d-flex mt-4  colot-black  w-100 mt-3">
                                <a href="{{ route('loginWithGoogle') }} " class="text-center wak_btn green_border ">
                                    {{ __('login.register') }} مع Google
                                    <i class="fab fa-google fa-fw"></i>
                                </a>
                            </div>
                            {{-- <button class="">
                                {{ __('login.register') }} مع Google
                            </button> --}}

                            <p class="text-center font-sm mt-3">
                                <span>{{ __('login.reset_password') }}</span>
                                <a href="/forget-password">
                                    <span style="color: #0d41fd"> نسيت كلمة السر! </span>
                                </a>
                            </p>
                            <p class="text-center font-sm mt-3">
                                <span>{{ __('login.have_account') }}</span>

                                <a href="{{ route('create_user') }}">
                                    <span style="color: #0d41fd">انشاء حساب </span>

                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
