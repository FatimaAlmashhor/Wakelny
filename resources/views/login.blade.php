<!doctype html>
<html lang="en">

<head>
    <title>تسجيل الدخول</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/assets/client/css/main.css">

</head>

<body style="background-color:#FFFFFF ">
    <section class="ftco-section">
        <div class="container  ">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5 border my-5">

                        <h3 class="text-center mb-4">{{ __('login.sign_in') }}</h3>
                        <p style="text-align: center"> {{ __('login.start_joriny') }}!</p>

                        <form action="{{ route('do_login') }}" method="POST" class="login-form">
                            @csrf
                            <div class="form-group mb-2">
                                <label for="text" class="form-label">{{ __('login.email') }}</label>
                                <input type="email" class="form-control rounded-left" placeholder="Enter Your Email"  name="email">
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input style="height: 38px;" type="password" class="form-control" name="user_pass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" name="password" />

                                    @error('user_pass')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button class="wak_btn d-grid w-100">{{ __('login.go_login') }}
                            </button>
                            {{ csrf_field() }}
                            <button class="wak_btn green_border w-100 mt-3">
                                {{ __('login.register') }} مع Google
                            </button>
                            
                            <a href="{{route('forget-password')}}">نسيت كلمة المرور؟</a>
                            
                            <p class="text-center mt-3">
                                <span>{{ __('login.have_account') }}</span>
                                <a href="{{route('create_user')}}">
                                    <span style="color: #0d41fd">Sign in </span>
                                </a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>
