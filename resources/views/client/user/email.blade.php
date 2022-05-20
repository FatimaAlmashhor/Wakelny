
@extends('client.master_layout')
@section('content')
    <section class="ftco-section">
        <div class="container  ">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-wrap p-4 p-md-5 border shadow-sm my-5">

                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-8">
                                
                                            @if (session('status'))
                                                <div class="alert alert-success" role="alert">
                                                    {{ session('status') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{route('forget-pass')}}" class="login-form">
                                        @csrf
                                

                           <div class="form-group row">
                                <label class="form-label" for="password">عنوان الايميل </label>
                                <div class="input-group input-group-merge">
                                    <input type="email"  class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                                    id="email" type="email"  name="email" value="{{ old('email') }}" autocomplete="email" autofocus />
                                    <br>
                                  
                                </div>
                            </div>
                            @error('email')
                                    <strong> <span class="text-danger ">{{ $message }}</span></strong>
                                    @enderror
                            <button class="mo-btn btn-blue-bg font-bold py-2 px-4  rounded hover:bg-gray-600 my-4 border-primary-light-blue"> ارسال رابط التحقق للايميل
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
