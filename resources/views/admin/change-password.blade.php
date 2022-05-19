@extends('admin.master_layout')
@section('content')

 <div class="container">
        <div class="row justify-content-center my-4 ">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header "><h1 class="text-center text-primary-blue font-lg">تغيير كلمة السر</h1></div>

                    <form action="{{ route('update-password') }}"  class="m-4 " method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">كلمة السر القديمة</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="اكتب كلمة السر القديمة">
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">كلمة السر الجديدة</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder=" اكتب كلمة السر جديدة">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">تأكيد كلمة السر الجديدة</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                    placeholder=" اعد كتابة كلمة السرالجديدة">
                            </div>

                        </div>

                        <div  class=" mx-auto pt-3">
                        <button type="submit" class="mo-btn btn-blue-bg float-left">{{ __('dash.save') }}</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    @endsection
