
@extends('client.master_layout')
@section('content')
    <section class="ftco-section">
        <div class="container  ">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5 border my-5">

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                   
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="/forget-password" class="login-form">
                                        @csrf
                                  

                           <div class="form-group row">
                                <label class="form-label" for="password">عنوان الايميل </label>
                                <div class="input-group input-group-merge">
                                    <input type="email" class="form-control" id="email" type="email"  name="email" value="{{ old('email') }}" autocomplete="email" autofocus />
<br>
                                  
                                </div>
                            </div>
                            @error('email')
                                    <strong> <span class="text-danger">{{ $message }}</span></strong>
                                    @enderror
                            <button class="wak_btn my-4 d-grid w-100"> ارسال رابط التحقق للايميل
                            </button>
                            {{ csrf_field() }}

                        </form>
                              



                                
                          
                          
                        </div>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
