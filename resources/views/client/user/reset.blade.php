<!doctype html>
<html lang="en">

<head>
    <title>Login</title>
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

                        <h3 class="text-center mb-4">{{ __('login.reset_password') }}</h3>
                        <p style="text-align: center"> {{ __('login.start_joriny') }}!</p>

                
                        <form method="POST" action="/reset-password" class="login-form">
                           @csrf
                           <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group row">
                            <label for="email" class="form-label" >E-Mail Address</label>
                          <div class="input-group input-group-merge">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input style="height: 38px;" type="password" class="form-control" id="password"  name="password" autocomplete="new-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />

                                    @error('user_pass')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <label class="form-label" for="password">{{ __('login.cpassword') }}</label>
                                <div class="input-group input-group-merge">
                                    <input style="height: 38px;" type="password" class="form-control"
                                    id="password-confirm"  class="form-control" name="password_confirmation" autocomplete="new-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                    @error('confirm_pass')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    {{-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> --}}
                                </div>
                            </div>

                       

                            <button  type="submit" class="wak_btn d-grid w-100">Reset Password
                            </button>
                            {{ csrf_field() }}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


</body>

</html>
