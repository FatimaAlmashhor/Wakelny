@extends('client.master_layout')
@section('content')
    <style>
        .bootstrap-select>.dropdown-toggle.bs-placeholder,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:hover,
        /* [type=button]:not(:disabled), */
        /* [type=reset]:not(:disabled), */
        .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled),
        .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled) {
            border: 1px solid #d5dadf;
            border-radius: 5px;
            width: 100%;
            text-align: right;

        }

        .bootstrap-select[class*=col-] .dropdown-toggle {
            width: 675px;
        }

    </style>
    <div class="container">
        <h3 class="my-5"> إضافة مشروع جديد</h3>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">
                    <div class="card-body">
                        <form id="contactForm" class="row g-3" action='{{ route('savePost') }}' method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name input -->
                            <div>
                                <label class="form-label" for="name">عنوان المشروع</label>
                                <input class="form-control" name='title' id="name" value="{{ old('name') }}" type="text"
                                    data-sb-validations="required" required />
                                <p class="text-muted font-xs">أدرج عنوانا موجزا يصف مشروعك بشكل دقيق.</p>
                                @error('title')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- category --}}
                            <div class="col-12 pt-3">
                                <div class="form-group  ">
                                    <label> القسم <em class="text--danger">*</em>
                                    </label>
                                    <select class="form-select" value="{{ old('category') }}"
                                        aria-label="Default select example" name="category" required="required">
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                                        @endforeach

                                    </select>
                                    <p class="text-muted font-xs">اختر ميزانية مناسبة لتحصل على عروض جيدة</p>
                                </div>
                                @error('category')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- skills --}}
                            <div class="col-12">
                                <label for="" class="col-md-6 col-form-label" style="">
                                    {{ __('filter.skills') }}</label>
                                <select class="selectpicker col-12 w-full " value="{{ old('skills') }}" name="skills[]"
                                    multiple style="width: 100% ; border:1px solid gray ;border-radius: 5px"
                                    aria-label="size 2 select example" data-actions-box="true">
                                    @foreach ($skills as $item)
                                        <option id='skills' value="{{ $item->id }}" autocomplete="off">
                                            {{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <p class="text-muted font-xs">اختر المهارات المطلوبه لهذا المنشور</p>
                            </div>



                            <!-- Message input -->
                            <div>
                                <label class="form-label" for="message">تفاصيل المشروع</label>
                                <textarea class="form-control" name='message' value="{{ old('message') }}" id="message" type="text"
                                    style="height: 10rem;" data-sb-validations="required" required></textarea>
                                <p class="text-muted font-xs">أدخل وصفاً مفصلاً لمشروعك وأرفق أمثلة لما تريد ان
                                    أمكن.
                                </p>
                                @error('message')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- the cost --}}
                            <div class="col-sm-6 col-xs-12 pt-3">
                                <div class="form-group  ">
                                    <label>الميزانية المتوقعة <em class="text--danger">*</em>
                                    </label>
                                    <select class="form-select" value="{{ old('cost') }}"
                                        aria-label="Default select example" name="cost" required="required">
                                        <option> </option>
                                        <option>50-25 دولار </option>
                                        <option>100-50 دولار </option>
                                        <option>250-100 دولار </option>
                                        <option>500-250 دولار </option>
                                        <option>1000-500 دولار </option>
                                        <option>2500-1000 دولار </option>
                                        <option>5000-2500 دولار </option>
                                        <option>10000-5000 دولار </option>


                                    </select>
                                    <p class="text-muted font-xs">اختر ميزانية مناسبة لتحصل على عروض جيدة
                                </div>
                                @error('cost')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- duration --}}
                            <div class="col-sm-6 col-xs-12 pt-3">
                                <label>المدة المتوقعة للتسليم <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">

                                    <input name="duration" class='form-control' id="phone" type="number"
                                        value="{{ old('duration') }}" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                    <span class="input-group-text" id="basic-addon1">ايام</span>
                                </div>

                                <span class="text-muted font-xs">متى تحتاج استلام مشروعك</span>
                                @error('duration')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-1">
                                <label class="form-label" for="message">ملفات توضيحية</label>
                                <input class="form-control" id="message" name='files' type="file"
                                    value="{{ old('files') }}" data-sb-validations="required">


                            </div>

                            <!-- Form submit button -->
                            <div>
                                <button class="wak_btn " type="submit">انشر الان
                                </button>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                {{-- <h6>أنشر مشروعك على كلفني</h6>
                <p>تساعدك منصة كلفني على الوصول إلى أفضل
                    المستقلين المحترفين لإنجاز أعمالك عن بعد
                    . بعد إضافة مشروعك على نفذلي ومراجعته ،
                    سيتقدم إليك عدد من العروض من المستقلين
                    المتخصيين يمكنك إختيار العرض
                    الأنسب لك من العروض المقدمة وإعتماده</p>

                <h6> <i class="fa-solid fa-lightbulb p-2 color-green"></i>نصائح إضافة المشروع</h6>
                <ul>
                    <li><i class="fa-duotone fa-caret-left color-green p-1"></i>أدخل تفاصيل المشروع بدقة</li>
                    <li><i class="fa-duotone fa-caret-left color-green p-1"></i>املأ جميع الحقول ووفّر أمثلة لما
                        تريد
                    </li>
                    <li><i class="fa-duotone fa-caret-left color-green p-1"></i>جزّء المشروع على عدّة مراحل صغيرة
                    </li>
                </ul> --}}
            </div>
        </div>
    </div>
@endsection
