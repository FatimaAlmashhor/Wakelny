<!doctype html>
<html lang="en">

<head>
    <title>Login 08</title>
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

                        <h3 class="text-center mb-4">{{ __('login.create_account') }}</h3>
                        <p style="text-align: center"> {{ __('login.start_joriny') }}!</p>
                        <form action="#" class="login-form">
                            <div class="form-group mb-2">
                                <label for="username" class="form-label">{{ __('login.name') }}</label>
                                <input type="text" class="form-control rounded-left" placeholder="Enter Your Name"
                                    required name="name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            </div>
                            <div class="form-group mb-2">
                                <label for="text" class="form-label">{{ __('login.email') }}</label>
                                <input type="password" class="form-control rounded-left" placeholder="Enter Your Email"
                                    required name="email">
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input style="height: 38px;" type="password" class="form-control" name="user_pass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" name="password" />
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.cpassword') }}</label>
                                <div class="input-group input-group-merge">
                                    <input style="height: 38px;" type="password" class="form-control"
                                        name="confirm_pass"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" name="cpassword" />
                                    <span class="text-danger">{{ $errors->first('cpassword') }}</span>
                                    {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                                </div>
                            </div>
                            <button class="wak_btn d-grid w-100">{{ __('login.register') }}
                            </button>
                            <button class="wak_btn green_border w-100 mt-3">
                                {{ __('login.register') }} مع Google
                            </button>
                            <p class="text-center mt-3">
                                <span>{{ __('login.have_account') }}?</span>
                                <a href="auth-login-basic.html">
                                    <span style="color: #0d41fd">Sign in instead</span>
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
