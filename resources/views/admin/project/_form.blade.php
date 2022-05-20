@extends('client.master_layout')
@section('content')
<style>
    .bootstrap-select>.dropdown-toggle.bs-placeholder,
.bootstrap-select>.dropdown-toggle.bs-placeholder:active,
 .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
  .bootstrap-select>.dropdown-toggle.bs-placeholder:hover,
   [type=button]:not(:disabled), [type=reset]:not(:disabled),
   .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled),
    .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled)
                            {
                                border: 1px solid #d5dadf;
                                width: 257px;
                                text-align: right;
                            }
    .bootstrap-select[class*=col-] .dropdown-toggle {
        width:675px;
}
</style>
<!-- <div class="row mx-1  mt-2 col-12 d-flex justify-content-lg-between ">
                <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                    <ol class="breadcrumb ms-3">
                        <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>/&nbsp&nbsp&nbsp
                        <li class=" active fs-6 fw-bold" aria-current="page"> <a href="{{ route('account') }}">
                               عمل بلاغ </a></li>
                    </ol>

                </nav>
</div> -->
    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">
                        <form action="{{ route('saveReport') }}" method="POST" class="login-form"
                                enctype="multipart/form-data">

                                  @if (Route::currentRouteName() == 'report_content')
                                        <input type="hidden" value="{{ $post_id }}" name="post_id" />
                                @else
                                <input type="hidden" value="{{ $provider_id }}" name="provider_id" />

                            @endif


           @csrf
                                <div class="row">
                                    <div class="col-md-12 my-2">

                                        <label for="" class="col-md-6 col-form-label">
                                                        نوع الشكوى</label>
                                            <div class=" form-group mx-4">
                                            @if (Route::currentRouteName() == 'report_content')
                                            <div class="radio">
                                                <label><input value=" هذا المحتوى لم  يعجبني" type="radio" name="type_report">  هذا المحتوى لم  يعجبني</label></div>
                                            <div class="radio">
                                                <label><input value="هذا المحتوى مزعج , متكرر" type="radio" name="type_report"> هذا المحتوى مزعج , متكرر</label></div>

                                            <div class="radio">
                                                <label><input value=" هذا المحتوى يخالف شروط استخدام الموقع" type="radio" name="type_report"> هذا المحتوى يخالف شروط استخدام الموقع</label></div>

                                            @else
                                            <div class="radio">
                                                <label><input value="هذا المسخدم   يزعجني" type="radio" name="type_report"> هذا المسخدم يزعجني</label></div>

                                            <div class="radio ">
                                                <label ><input value="هذا المسخدم يخالف شروط استخدام الموقع" type="radio" name="type_report"> هذا المسخدم يخالف شروط استخدام الموقع</label></div>
                                            </div>
                                            @endif
                                        @error('type_report')
                                        <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                            style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    </div>
                                </div>
                                
                                <div class="row col-md-12" >

                                    <label for="" class="col-md-4 col-form-label font-w">  الشكوى</label>
                                    <textarea class="form-control mx-4" placeholder="  الشكوى" id=""
                                    value="" name="massege"
                                    ></textarea>
                                        @error('massege')
                                        <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                            style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>


                                   <button class="mo-btn btn-blue-bg float-left font-md my-4"  type="submit">أرسال</button>


                        {{ csrf_field() }}
                        </form>

                </div>
            </div>
            <div class="col-md-4 col-sm-12">

            </div>

        </div>
    </div>
@endsection
