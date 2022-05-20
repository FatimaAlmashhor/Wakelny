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

    <div class="container pt-20">
        <h3 class="my-5 font-xl font-bold">تعديل مشروع</h3>
        {{-- @foreach ($data as $item) --}}
        <div class="row my-5 grid place-items-center">
            <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">
                    <div class="card-body">
                    <form id="contactForm" class="row g-3" action="{{ route('update_post', $data->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- Name input -->
                            <div class="col-12 pt-3">
                                <label class="form-label font-md" for="name">عنوان المشروع</label>
                                <input
                                    class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                                    name='title' id="name" value="{{ $data->title ?? old('title') }}" type="text"
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
                                    <label class="font-md"> القسم <em class="text--danger">*</em>
                                    </label>
                                    <select class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"  aria-label="Default select example" name="category"
                                        required="required">
                                        @foreach ($categories as $cate)
                                         @if ($data->category_id == $cate->id )
                                                <option value="{{ $cate->id }}" selected>{{ $cate->title }}</option>
                                            @else
                                            <option value="{{ $cate->id }}">{{ $cate->title }}</option>
                                            @endif
                                        @endforeach

                                    </select>
                                    <p class="text-muted font-xs">اختر القسم المناسب للمشروع </p>
                                </div>
                                {{-- @error('category')
                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                        {{ $message }}
                                    </div>
                                @enderror --}}
                            </div>

                            {{-- skills --}}
                            <div class="col-12">
                                <label for="" class="col-md-6 col-form-label" style="">
                                    {{ __('filter.skills') }}</label>
                                <select class="selectpicker col-12 w-full " name="skills[]" multiple
                                    style="width: 100% ; border:1px solid gray ;border-radius: 5px"
                                    aria-label="size 2 select example" data-actions-box="true"  value="{{ old('skills[]') }}">
                                    @foreach ($skills as $item)

                                        @if ($data->id == $item->id )
                                                <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
                                            @else
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endif
                                    @endforeach
                                </select>
                                <p class="text-muted font-xs">اختر المهارات المطلوبه لهذا المنشور</p>
                            </div>



                            <!-- Message input -->
                            <div>
                                <label class="form-label font-md" for="message">تفاصيل المشروع</label>
                                <textarea class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                                 name='message' id="message" type="text" style="height: 10rem;"
                                    data-sb-validations="required"
                                    required>{{ $data->description ?? old('description') }}</textarea>
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
                                    <label class="font-md">الميزانية المتوقعة <em class="text--danger">*</em>
                                    </label>
                                    {{-- {{ $price = array( '0-25', '50-25 ','250-100') }} --}}
                                   <?php $price = ['0-25', '50-25 ','50-100','250-100','500-250','1000-500','2500-5000','5000-10000'] ;?>
                                    <select class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"  aria-label="Default select example" name="cost"
                                        required="required">
                                        @foreach ($price as $value)
                                            @if ($data->cost == $value)
                                                <option value="{{ $value }}"  selected> {{ $value }}دولار</option>
                                            @else
                                            <option value="{{ $value }}"  > {{ $value }} دولار</option>
                                            @endif
                                        @endforeach
                                         </select>
                                    <p class="text-muted font-xs">اختر ميزانية مناسبة لتحصل على عروض جيدة</p>
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
                                <label class="font-md" >المدة المتوقعة للتسليم <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">

                                    <input name="duration"  class='appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink' id="phone" type="number"
                                        value="{{ $data->duration ?? old('duration') }}" aria-label="Username"
                                        aria-describedby="basic-addon1">
                                    <span class="flex items-center justify-center appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-8 bg-primary-light-pink" style="height: 46px;" id="basic-addon1">ايام</span>
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
                                <label class="form-label font-md" for="message">ملفات توضيحية</label>
                                <input class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"  id="dropzone" multiple name='files' type="file"
                                    value="{{ $data->files ?? old('files') }}" data-sb-validations="required">


                            </div>
                            <div>
                            <button class="mo-btn btn-blue-bg float-left font-md" type="submit">حفظ التعديلات
                                </button>

                            </div>
                            <!-- Form submit button -->
                            {{-- <div class="row">
                                <div class="col-md-8">
                                    <button class="wak_btn " type="submit">انشر الان
                                    </button>
                                </div>
                                <div class="col-md-4">
                                    <button class="wak_btn " type="submit"> حفظ كمسوده
                                    </button>
                                </div>
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                {{-- <h6>أنشر مشروعك على متاح</h6>
                <p>تساعدك منصة متاح على الوصول إلى أفضل
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
        {{-- @endforeach --}}
    </div>
@endsection
