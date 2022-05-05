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
<div class="row mx-1  mt-2 col-12 d-flex justify-content-lg-between ">
                <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                    <ol class="breadcrumb ms-3">
                        <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>/&nbsp&nbsp&nbsp
                        <li class=" active fs-6 fw-bold" aria-current="page"> <a href="{{ route('account') }}">
                               أضافة عمل جديد </a></li>
                    </ol>

                </nav>
</div>
    <div class="container">
        <h3 class="my-5"> إضافة عمل جديد</h3>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
            <div class="card shadow-sm ">



                    <div class="card-body">
                    @if (Route::currentRouteName() == 'edit_work')
                    <form action="{{ route('update_work', $data->id) }}" method="POST" class="login-form"

                            enctype="multipart/form-data">

                                @else
                                <form action="{{ route('works.saveUserWork') }}" method="POST" class="login-form"
                            enctype="multipart/form-data">


                            @endif


                            @csrf


                            <div class="row">
                                <div class="col-md-6">
                                    <label for="" class="col-md-6 col-form-label">
                                                     عنوان العمل</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" value="{{$data->title ??  old('title') }}" name="title"
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
                                    <label for="" class="col-md-6 col-form-label">
                                              تاريخ الإنجاز</label>
                                    <div class="col-sm-10">
                                        <input type="date" class="form-control" id="" value="{{ $data->comple_date ?? old('comple_date') }}" name="comple_date"
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
                                    <label for="" class="col-md-6 col-form-label">
                                                 صورة مصغرة</label>
                                    <div class="col-sm-10">
                                        <input type="file"  class="form-control" id="" value="{{ $data->main_image ?? old('main_image') }}" name="main_image"
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
                                    <label for="" class="col-md-6 col-form-label">
                                    رابط العمل</label>
                                    <div class="col-sm-10">
                                        <input type="url" class="form-control" id="" value="{{ $data->link ?? old('link') }}" name="link"
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
                            <div class="row" style="margin-right:1px;">

                                <label for="" class="col-md-6 col-form-label"> تفاصيل العمل</label>
                                <textarea class="form-control" placeholder=" تفاصيل العمل" id="" name="details">{{ $data->details ?? old('details') }}</textarea>
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
                                        <input type="file"  class="form-control" multiple id="" name="more_file[]"
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
                                    <label for="" class="col-md-6 col-form-label"  style="" >
                                    {{ __('filter.skills') }}</label>
                                        <select class="selectpicker col-md-6 " value="بالاختيار" name="skills[]" multiple aria-label="size 2 select example"
                                                    data-actions-box="true">
                                                    @foreach ($skills as $item)

                                                        <option id='skills' value="{{ $item->id }}" autocomplete="off">{{ $item->name }}</option>
                                                    @endforeach
                                        </select>


                                </div>
                            </div>

                            <div class="row w-full  ">

                                <button class="wak_btn w-full my-4" style="margin-right: 10px;"  type="submit">أحفظ</button>

                            </div>

                    {{ csrf_field() }}
                    </form>
                    </div>
                    </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <h6> <i class="fa-solid fa-lightbulb p-2" class="postCplor"></i>ابدأ ببناء معرض أعمالك   </h6>
            <p>
أضف أعمالك السابقة التي قمت بتنفيذها، إضافة الاعمال للملف الشخصي يساعد أصحاب المشاريع على معرفة مهاراتك ويزيد من فرص توظيفك.</p>

            </div>

        </div>
    </div>
@endsection
