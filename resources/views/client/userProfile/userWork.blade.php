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
        width:535px;
}
</style>
<!-- <div class="row mx-1  mt-2 col-12 d-flex justify-content-lg-between ">
                <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                    <ol class="breadcrumb ms-3">
                        <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>/&nbsp&nbsp&nbsp
                        <li class=" active fs-6 fw-bold" aria-current="page"> <a href="{{ route('account') }}">
                               أضافة عمل جديد </a></li>
                    </ol>

                </nav>
</div> -->
    <div class="container pt-20">
    @if (Route::currentRouteName() == 'edit_work')
        <h2 class="my-5 font-xl font-bold " > تعديل عمل </h2>
        <div class="row my-5 grid place-items-center ">
            <div class="col-md-8 col-sm-12">
            <div class="card shadow-sm ">



                    <div class="card-body">

                    <form action="{{ route('update_work', $data->id) }}" method="POST" class="login-form"

                            enctype="multipart/form-data">

                                @else
                                <h2 class="my-5 font-xl font-bold" > إضافة عمل </h2>
        <div class="row my-5 grid place-items-center">
                <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">



                                <div class="card-body">
                                <form action="{{ route('works.saveUserWork') }}" method="POST" class="login-form"
                            enctype="multipart/form-data">


                            @endif


                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label font-md">
                                                     عنوان العمل</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" id="" value="{{$data->title ??  old('title') }}" name="title"
                                            >
                                    </div>
                                    @error('title')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label font-md">
                                              تاريخ الإنجاز</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" id="" value="{{ $data->comple_date ?? old('comple_date') }}" name="comple_date"
                                            value="">
                                    </div>
                                    @error('comple_date')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>



                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label font-md">
                                                 صورة مصغرة</label>
                                    <div class="col-sm-10">
                                        <input type="file"  class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" id="" value="{{ $data->main_image ?? old('main_image') }}" name="main_image"
                                            value="">
                                    </div>
                                    @error('main_image')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label font-md">
                                    رابط العمل</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" id="" value="{{ $data->link ?? old('link') }}" name="link"
                                            value="">
                                    </div>
                                    @error('link')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>



                            </div>
                            <div class="col-md-11" style="margin-right:1px;">

                                <label for="" class="col-md-6 col-form-label font-md"> تفاصيل العمل</label>
                                <textarea class=" appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" placeholder=" تفاصيل العمل" id="" name="details">{{ $data->details ?? old('details') }}</textarea>
                                    @error('details')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                            <!-- <div class="row ">


                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label">
                                           صور وملفات العمل</label>
                                    <div class="col-sm-10">
                                        <input type="file"  class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink" multiple id="" name="more_file[]"
                                            value="{{ $data->more_file ?? old('more_file') }}">
                                    </div>
                                    @error('more_file')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>

                            </div>  -->
                            <div class="row ">
                                <div class="col-md-6 my-2">
                                    <label for="" class="col-md-6 col-form-label font-md"  style="" >
                                    {{ __('filter.skills') }}</label>
                                        <select class="selectpicker col-md-6 " value="بالاختيار" name="skills[]" multiple aria-label="size 2 select example"
                                                    data-actions-box="true">
                                                    @foreach ($skills as $item)

                                                        <option id='skills' value="{{ $item->id }}" autocomplete="off">{{ $item->name }}</option>
                                                    @endforeach
                                        </select>


                                </div>
                            </div>

                         <button class="mo-btn btn-blue-bg float-left font-md"type="submit">أحفظ</button>

                    {{ csrf_field() }}
                    </form>
                    </div>
                    </div>
            </div>


        </div>
    </div>
@endsection
