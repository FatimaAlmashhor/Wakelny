@extends('client.master_layout')
@section('content')
    <section class="ftco-section">
        <div class="container  ">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="wak_form p-4 p-md-5 border my-5">

                        <h3 class="text-center mb-4">{{ __('login.reset_password') }}</h3>
                  
                
                        <form method="POST" action="/reset-password" class="login-form">
                           @csrf
                           <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                                    <label for="email" class="form-label" >الايميل</label>
                                                <div class="input-group input-group-merge">
                                                    <input id="email" type="email" class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" autocomplete="email" autofocus>
                                                        <br>
                                                    @error('email')
                                                        <span class="invalid-feedback w-100" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                 <div class="form-group row">
                                <label class="form-label" for="password">{{ __('login.password') }}</label>
                                <div class="input-group input-group-merge">
                                    <input  type="password" class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink @error('password') is-invalid @enderror" id="password"   name="password" autocomplete="new-password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password" />
                                        
                                   
                                        @error('password')
                                <span class="invalid-feedback w-100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="form-label" for="">{{ __('login.cpassword') }}</label>
                                <div class="input-group input-group-merge">
                                    <input  type="password" 
                                    id="password_confirmation"  class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete=""
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        aria-describedby="password_confirmation" />
                                       
                                        @error('password_confirmation')
                                <span class="invalid-feedback w-100" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <br>
                                </div>
                            </div>

                        <br>

                            <button  type="submit" class="mo-btn btn-blue-bg font-bold py-2 px-4  rounded hover:bg-gray-600 my-4 border-primary-light-blue">{{ __('login.resetPass') }}
                            </button>
                            {{ csrf_field() }}

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection