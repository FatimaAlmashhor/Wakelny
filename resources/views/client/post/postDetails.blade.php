@extends('client.master_layout')
@section('content')
    {{--  --}}
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap mt-20">
            <h3 class="my-5  font-xl font-bold "> {{ $post->title }}</h3>
            <div class="card--actions hidden-xs my-5">

                @if (Auth::check() && Auth::id() == $post->user_id)
                    {{-- edition btn --}}
                    <div class="dropdown btn-group">

                        <div class="dropdown inline-block relative min-w-fit">
                            <button tabindex="-1" data-bs-toggle="modal" data-bs-target="#deleteModel"
                                class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center">
                                <span class="mr-1 font-md">اغلاق المشروع</span>
                                <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path style="color:white ; stroke: white;
                                                                     fill: white;"
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>
                            <ul
                                class="dropdown-menu w-fit absolute  hidden text-dark-gray bg-light-gray rounded-sm shadow-md pt-2 ">
                                <li class="border-b border-primary-light-pink"><a
                                        class="rounded-t bg-gray-200 hover:bg-gray-400 hover:bg-primary-light-gray hover:text-dark-gray py-2 px-4 block whitespace-no-wrap"
                                        href="{{ route('editPosts', $post_id) }}">تعديل المشروع</a>
                                </li>


                            </ul>
                        </div>


                    </div>
                @endif


                <!-- confirm delete Modal -->
                <div class="modal" id="deleteModel" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title font-lg" id="deleteModel">حذف المشروع</h5>
                                <a type="button" class="fa fa-xmark font-md" data-bs-dismiss="modal" aria-label="Close"></a>
                            </div>
                            <div class="modal-body">
                                هل تريد حذف {{ $post->title }}
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('toggle_post', $post_id) }}"
                                    class="mo-btn btn-pink-bg pink font-md">تاكيد الحذف</a>
                                <button type="button" class="mo-btn btn-blue-bg font-md"
                                    data-bs-dismiss="modal">الغاء</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <h5 class="card-header font-md">تفاصيل المشروع</h5>

                    <div class="card-body">
                        <p class="card-text font-sm"> {{ $post->description }}</p>
                    </div>

                </div>
                <div class="card mt-3">
                    <h5 class="card-header font-md">المهارات المطلوبة</h5>

                    <div class="skills mt-3 font-sm">
                        @if (count($skills) == 0)
                            <p>لاتوجد مهارات مطلوبه </p>
                        @endif
                        @foreach ($skills as $item)
                            <a class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center"
                                href="#" role="button">
                                <i class="fa-solid fa-tags"></i>
                                <span class="me-1 font-sm">{{ $item->name }}</span>
                            </a>
                        @endforeach

                    </div>
                </div>





                {{-- add comments --}}
                @if (Auth::check() && Auth::id() != $post->user_id && Auth::user()->hasRole('provider'))
                    <div class="row my-2">
                        <div class="">
                            {{-- comment post condition --}}
                            @if (!$hasComment)
                                <h3 class="my-5 font-md"> اضف عرض </h3>
                                <div class="card shadow-sm ">
                                    <div class="card-body">

                                        <form id="contactForm" class="row g-3" action='{{ route('comment.add') }}'
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $post_id }}" name="post_id" />

                                            {{-- estamte cost --}}
                                            <div class="col-sm-4 col-md-10  col-xs-12 col-lg-6  pt-3">
                                                <label class="font-sm">قيمة العرض
                                                </label>
                                                <div class="input-group">

                                                    <input name="cost" min="1"
                                                        class='appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-60'
                                                        type="number" value="{{ old('cost') }}" aria-label="Username"
                                                        aria-describedby="basic-addon1">
                                                    <div
                                                        class=" flex items-center justify-center appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-8 bg-primary-light-pink">
                                                        $</div>
                                                </div>

                                                <p class="text-muted font-xs ">اختر ميزانية مناسبة</p>
                                                @error('cost')
                                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning"
                                                        role="alert"
                                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>


                                            {{-- estamte cost --}}
                                            {{-- <div class="col-sm-4 col-xs-12 pt-3">
                                                <label class="font-sm">مستحقاتك
                                                </label>
                                                <div class="input-group">

                                                    <input disabled name="cost_after_taxs"
                                                        class='appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink'
                                                        type="number" value="{{ old('cost_after_taxs') }}"
                                                        aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-text" style="height: 46px;"
                                                        id="basic-addon1">$</span>
                                                </div>

                                                <span class="text-muted font-xs">بعد خصم عمولة موقع متاح</span>
                                                @error('cost_after_taxs')
                                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning"
                                                        role="alert"
                                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div> --}}
                                            {{-- duration --}}
                                            <div class="col-sm-4 col-md-10  col-xs-12 col-lg-6 pt-3">
                                                <label class="font-sm">المدة المتوقعة للتسليم

                                                </label>
                                                <div class="input-group">

                                                    <input name="duration" min="1"
                                                        class='appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-60'
                                                        id="phone" type="number" value="{{ old('duration') }}"
                                                        aria-label="Username" aria-describedby="basic-addon1">
                                                    <span
                                                        class="flex items-center justify-center appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-8 bg-primary-light-pink"
                                                        style="height: 46px;" id="basic-addon1">ايام</span>
                                                </div>

                                                <span class="text-muted font-xs ">متى تحتاج لتنفيذ مشروعك</span>
                                                @error('duration')
                                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning"
                                                        role="alert"
                                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>

                                            <!-- Message input -->
                                            <div>
                                                <label class="font-sm" for="message">تفاصيل العرض</label>
                                                <textarea class="شppearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                                                    name='message' value="{{ old('message') }}" id="message"
                                                    type="text" style="height: 10rem;" data-sb-validations="required"
                                                    required></textarea>
                                                <p class="text-muted font-xs">أدخل وصفاً مفصلاً لمشروعك وأرفق أمثلة لما تريد
                                                    ان
                                                    أمكن.
                                                </p>
                                                @error('message')
                                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning"
                                                        role="alert"
                                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>


                                            <div class="mb-1">
                                                <label class="font-sm" for="message">ملفات توضيحية</label>
                                                <input
                                                    class="appearance-none block w-full bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                                                    id="dropzone" multiple name='files' type="file"
                                                    value="{{ old('files') }}" data-sb-validations="required">


                                            </div>
                                            <div>
                                                <button class="mo-btn btn-blue-bg float-left font-md" type="submit">انشر
                                                    الان
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- all comments --}}
                    </div>
                @endif








                <div class="accordion mt-3" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button font-md" type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                                aria-controls="panelsStayOpen-collapseOne">
                                العروض المقدمة
                            </button>
                        </h2>

                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                            aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body">

                                {{-- accordion body / collabes --}}


                                @if (!empty($comments))
                                    @foreach ($comments as $item)
                                        <div>
                                            <div class="card p-4 container my-3" style="direction: rtl;">
                                                <div class="row">
                                                    <div class="col-6 image d-flex">
                                                        <a href="{{ route('userProfile', $item->user_id) }}">

                                                            {{-- @if ($item->avatar !== 'http://localhost:8000/images/')
                                                                    <img class="rounded-circle mr-4 border"
                                                                        style="width:60px ; height:60px ; object-fit: cover" src="{{ $item->avatar }}"
                                                                        alt="">
                                                                @else --}}
                                                            <img class="rounded-circle mr-4 border"
                                                                style="width:60px ; height:60px ; object-fit: cover"
                                                                src="{{ asset('assets/client/images/user-profile-2.png') }}"
                                                                alt="">
                                                            {{-- @endif --}}

                                                        </a>
                                                        <div class="info mx-4">
                                                            <h4 class="font-md"><a
                                                                    href="{{ route('userProfile', $item->user_id) }}">{{ $item->name }}</a>
                                                            </h4>

                                                            <div class="rate">
                                                                @for ($i = 0; $i < 5; $i++)
                                                                    @if ((int) $item->rating > $i)
                                                                        <i class="fa fa-star clr-amber rating-star"
                                                                            style="color: orange;"></i>
                                                                    @else
                                                                        <i class="fa fa-star clr-amber rating-star"
                                                                            style="color: gainsboro;"></i>
                                                                    @endif
                                                                @endfor

                                                                <span
                                                                    class="px-2 font-sm color-gray-dark ">%{{ $item->rating * 20 }}</span>
                                                                <i
                                                                    class="fa fa-fw fa-briefcase font-xs color-gray-dark"></i>

                                                                <span
                                                                    class="color-gray-dark px-2 font-sm">{{ $item->specialization }}</span>
                                                            </div>

                                                        </div>

                                                    </div>
                                                    {{-- تعديل الكومنتات --}}
                                                    <div class="col-md-6 col-sm-12">
                                                        <div class="row ">
                                                            <div class="col-md-6 col-sm-6  ">
                                                                @if (Auth::check() && $item->user_id == auth()->user()->id)
                                                                    <button class="mo-btn w-full" data-bs-toggle="collapse"
                                                                        data-bs-target="#demo"
                                                                        style="width:100% ; padding: .6rem">
                                                                        <i class="fa fa-fw fa-edit"></i>
                                                                        <span class="action-text">تعديل العرض </span>
                                                                    </button>
                                                                @endif
                                                            </div>
                                                            @if (Auth::check() && $item->user_id != auth()->user()->id)
                                                                <div class="card--actions hidden-xs col-6 ">
                                                                    <div class="dropdown btn-group">

                                                                        {{-- option dropdown --}}
                                                                        <div
                                                                            class="dropdown inline-block relative min-w-fit">
                                                                            <button
                                                                                class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center">
                                                                                <span class="mr-1">خيارات</span>
                                                                                <svg class="fill-current h-4 w-8"
                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                    viewBox="0 0 20 20">
                                                                                    <path style="color:white ; stroke: white;
                                                                                                        fill: white;"
                                                                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                                </svg>
                                                                            </button>
                                                                            <ul
                                                                                class="dropdown-menu w-fit absolute  hidden text-dark-gray bg-light-gray rounded-sm shadow-md pt-2 ">
                                                                                <li
                                                                                    class="border-b border-primary-light-pink">
                                                                                    <a class="rounded-t bg-gray-200 hover:bg-gray-400 hover:bg-primary-light-gray hover:text-dark-gray p-2  block whitespace-no-wrap"
                                                                                        href="{{ route('report_provider', $item->user_id) }}">
                                                                                        التبليغ عن مستخدم</a>
                                                                                </li>


                                                                            </ul>
                                                                        </div>
                                                                        {{-- end dropdown --}}
                                                                    </div>

                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    {{-- more info --}}
                                                    <div>
                                                        <div class="d-flex justify-content-around m-3 bg-lighter-gray p-3">
                                                            <div>
                                                                <div>المبلغ</div>
                                                                <div>${{ $item->cost }}</div>
                                                            </div>
                                                            <div>
                                                                <div>مدة التنفيذ</div>
                                                                <div>{{ $item->duration }} أيام</div>
                                                            </div>
                                                            {{-- <div>
                                                                        <div>معرض الأعمال</div>
                                                                        <div>{{ $post->workcount }} أعمال</div>
                                                                    </div> --}}
                                                            {{-- <div>
                                                                        <div>تقييم العرض</div>
                                                                        <div><i class="fa-thin fa-circle"></i></div>
                                                                    </div> --}}
                                                        </div>
                                                    </div>
                                                    <p class=" col-12 font-sm mt-3">{{ $item->description }}</p>
                                                    {{-- فورم التعديل --}}
                                                    @if (Auth::check() && $item->user_id == auth()->user()->id)
                                                        <div class="col-12 collapse" id="demo">

                                                            <div class="card shadow-sm ">
                                                                <div class="card-body">
                                                                    <form id="contactForm" class="row g-3"
                                                                        action='{{ route('update_comment', $item->offer_id) }}'
                                                                        method="post" enctype="multipart/form-data">
                                                                        @csrf
                                                                        {{-- <input type="hidden" value="{{ $post_id }}" name="post_id" /> --}}

                                                                        {{-- estamte cost --}}
                                                                        <div
                                                                            class="col-sm-4 col-md-10  col-xs-12 col-lg-6 pt-3">
                                                                            <label>قيمة العرض
                                                                                <em class="text--danger">*</em>
                                                                            </label>
                                                                            <div class="input-group mb-3 flex">

                                                                                <input name="cost" min="1"
                                                                                    class='appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-60 '
                                                                                    type="number"
                                                                                    value="{{ $item->cost ?? old('cost') }}"
                                                                                    aria-label="Username"
                                                                                    aria-describedby="basic-addon1">
                                                                                <div
                                                                                    class=" flex items-center justify-center appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-8 bg-primary-light-pink">
                                                                                    $</div>
                                                                            </div>

                                                                            <p class="text-muted font-xs">اختر ميزانية
                                                                                مناسبة</p>
                                                                            @error('cost')
                                                                                <div id='alert '
                                                                                    class="   px-4 alert position-fixed  alert-warning"
                                                                                    role="alert"
                                                                                    style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror

                                                                        </div>


                                                                        {{-- estamte cost --}}
                                                                        {{-- <div class="col-sm-4 col-xs-12 pt-3">
                                                                            <label>مستحقاتك <em
                                                                                    class="text--danger">*</em>
                                                                            </label>
                                                                            <div class="input-group mb-3">

                                                                                <input disabled name="cost_after_taxs"
                                                                                    class='form-control' type="number"
                                                                                    value="{{ $item->cost_after_taxs ?? old('cost_after_taxs') }}"
                                                                                    aria-label="Username"
                                                                                    aria-describedby="basic-addon1">
                                                                                <span class="input-group-text"
                                                                                    id="basic-addon1">$</span>
                                                                            </div>

                                                                            <span class="text-muted font-xs">بعد خصم
                                                                                عمولة
                                                                                موقع مستقل</span>
                                                                            @error('cost_after_taxs')
                                                                                <div id='alert '
                                                                                    class="   px-4 alert position-fixed  alert-warning"
                                                                                    role="alert"
                                                                                    style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror

                                                                        </div> --}}
                                                                        {{-- duration --}}
                                                                        <div
                                                                            class="col-sm-4 col-md-10 col-xs-12  col-lg-6 pt-3">
                                                                            <label class="font-md">المدة المتوقعة
                                                                                للتسليم <em class="text--danger">*</em>
                                                                            </label>
                                                                            <div class="input-group mb-3 flex">

                                                                                <input name="duration" min="1"
                                                                                    class='appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-60'
                                                                                    id="phone" type="number"
                                                                                    value="{{ $item->duration ?? old('duration') }}"
                                                                                    aria-label="Username"
                                                                                    aria-describedby="basic-addon1">
                                                                                <span
                                                                                    class="flex items-center justify-center appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-8 bg-primary-light-pink"
                                                                                    id="basic-addon1">ايام</span>
                                                                            </div>

                                                                            <span class="text-muted font-xs">متى تحتاج
                                                                                لتنفيذ مشروعك</span>
                                                                            @error('duration')
                                                                                <div id='alert '
                                                                                    class="   px-4 alert position-fixed  alert-warning"
                                                                                    role="alert"
                                                                                    style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror

                                                                        </div>

                                                                        <!-- Message input -->
                                                                        <div>
                                                                            <label class="font-md"
                                                                                for="message">تفاصيل
                                                                                العرض</label>
                                                                            <textarea class="form-control" name='message' id="message" type="text" style="height: 10rem;"
                                                                                data-sb-validations="required"
                                                                                required>{{ $item->description ?? old('description') }}</textarea>
                                                                            <p class="text-muted font-xs">أدخل وصفاً
                                                                                مفصلاً
                                                                                لمشروعك وأرفق أمثلة
                                                                                لما تريد ان
                                                                                أمكن.
                                                                            </p>
                                                                            @error('message')
                                                                                <div id='alert '
                                                                                    class="   px-4 alert position-fixed  alert-warning"
                                                                                    role="alert"
                                                                                    style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>


                                                                        <div class="mb-1">
                                                                            <label class="font-md"
                                                                                for="message">ملفات
                                                                                توضيحية</label>
                                                                            <input class="form-control" id="dropzone"
                                                                                multiple name='files' type="file"
                                                                                value="{{ $item->files ?? old('files') }}"
                                                                                data-sb-validations="required">


                                                                        </div>
                                                                        <div>
                                                                            <button
                                                                                class="mo-btn btn-blue-bg float-left font-md"
                                                                                type="submit">حفظ
                                                                                التعديلات
                                                                            </button>
                                                                        </div>
                                                                        {{-- <button class="mo-btn" data-bs-toggle="collapse"
                                                                                    data-bs-target="#demo">
                                                                                    <i class="fa fa-fw fa-edit"></i>
                                                                                    <span class="action-text">تعديل العرض </span>
                                                                                </button> --}}
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            @if (Auth::check() && $post->user_id == Auth::id())
                                                <div class=" m-2 flex justify-start items-start">
                                                    @if (!$checkHasProject)
                                                        <button tabindex="-1" class="mo-btn  mx-1  " type="button"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="fa fa-check px-1"></i>
                                                            <span class=""> قبول العرض </span>
                                                        </button>
                                                        <a tabindex="-1" class="mo-btn btn-blue-rounderd"
                                                            href="{{ route('inbox.show', $item->user_id) }}">
                                                            <i class="fa fa-send px-1"></i>
                                                            <span class="action-text"> تواصل مع متاح </span>
                                                        </a>
                                                    @endif
                                                </div>
                                            @endif

                                        </div>


                                        <!-- Acceptance Modal -->
                                        <div class="modal" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title order-2 font-lg" id="exampleModalLabel">قبول
                                                            العرض</h5>
                                                        <button type="button" class="btn-close order-2"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>


                                                    {{-- model for acceptence --}}
                                                    <form action="{{ route('accept-offer') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" value="{{ $item->provider_id }}"
                                                            name="provider_id">
                                                        <input type="hidden" value="{{ $item->offer_id }}"
                                                            name="offer_id">
                                                        <input type="hidden" value="{{ $post_id }}" name="post_id">
                                                        <div class="modal-body ">
                                                            <!-- credit card -->
                                                            <div class=" row color-black px-3 modal-panel is-show supSection"
                                                                id="tab-A">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <label class="font-md">المبلغ المتفق عليه
                                                                        </label>
                                                                        <div class="input-group mt-1">
                                                                            <input name="amount" min="1"
                                                                                class="appearance-none block w-75 bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                                                                                id="amount" type="number"
                                                                                value="{{ old('cost') }}"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1">
                                                                            <span
                                                                                class="flex items-center justify-center appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-8 bg-primary-light-pink"
                                                                                id="basic-addon1">$</span>
                                                                        </div>
                                                                        @error('amount')
                                                                            <p class="text-danger" role="alert">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label class="font-md">المده المتفق عليه
                                                                        </label>
                                                                        <div class="input-group mt-1">
                                                                            <input name="duration" min="1"
                                                                                class="appearance-none block w-75 bg-sacondary-light-white-pinky border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink"
                                                                                id="duration" type="number"
                                                                                value="{{ old('duration') }}"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1">
                                                                            <span
                                                                                class="flex items-center justify-center appearance-none  border-primary-light-pink border-sm text-gray-700 border border-red-500 rounded py-3  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-primary-pink w-8 bg-primary-light-pink"
                                                                                id="basic-addon1">ايام</span>
                                                                        </div>
                                                                        @error('duration')
                                                                            <p class="text-danger" role="alert">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class=" modal-footer flex ">
                                                                <input type="submit" class=" mo-btn font-md"
                                                                    value="قبول العرض">
                                                                <button type="button"
                                                                    class=" mo-btn btn-blue-rounderd font-md"
                                                                    data-bs-dismiss="modal">تراجع</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /Acceptance Modal -->
                            </div>
                            @endforeach
                            @endif

                        </div>
                    </div>

                </div>

            </div>

        </div>
        {{-- more information --}}
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <h5 class="card-header font-md">بطاقة المشروع</h5>

                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <div>
                            <div class="my-3 font-sm"> حالة المشروع</div>
                            <div class="my-3 font-sm"> تاريخ النشر</div>
                            <div class="y-3 font-sm"> الميزانية </div>
                            <div class="my-3 font-sm"> مدة التنفيذ</div>
                            <div class="my-3 font-sm"> عدد العروض</div>
                        </div>
                        <div>
                            <div class="my-3 font-sm"> <span class="px-1"
                                    style="background-color: green ; color:white;">@if($post->status=="open") مفتوح
@elseif ($post->status=="closed") مغلق
                                    @endif</span></div>
                            <div class="my-3 font-sm"> {{ $post->created_at }}</div>
                            <div class="my-3 font-sm"> ${{ $post->cost }}</div>

                            <div class="my-3 font-sm"> {{ $post->duration }}</div>

                            <div class="my-3 font-sm"> {{ $post->offers }}</div>
                        </div>
                    </div>
                </div>
                <!-- <hr>
                                                            <div>
                                                                <p><i class="fa fa-circle-chevron-left px-2 "></i>مرحلة تلقي العروض</p>
                                                                <p> <i class="fa fa-circle-dot px-2 color-gray-light"></i>مرحلة التنفيذ</p>
                                                                <p> <i class="fa fa-circle-dot px-2 color-gray-light"></i>مرحلة التسليم </p>

                                                            </div> -->
                <hr>
                <div>
                    <p class="font-md my-4">صاحب المشروع</p>
                    <div class="image d-flex">



                        <img class="rounded-circle mr-4 border" style="width:60px ; height:60px ; object-fit: cover"
                            src="{{ asset('assets/client/images/user-profile-2.png') }}" alt="">



                        <div class="info mx-4">
                            <h4 class="font-md">
                                <a
                                    href="{{ route('userProfile', $post->post_user_id) }}">{{ $post->post_user_name }}</a>
                            </h4>

                            <div class="rate">
                                <span class="px-1 font-sm color-gray-dark "></span>
                                <i class="fa fa-fw fa-briefcase font-xs color-gray-dark"></i>
                                <span class="color-gray-dark px-1 font-sm">{{ $post->post_user_specialization }}</span>
                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
    </div>
    <script src="/assets/client/js/acceptance-modalNavigation.js"></script>
@endsection
{{-- <div class="card mt-3">
            <h5 class="card-header">شارك المشروع</h5>

            <div class=" mt-3">
                <form class=" m-3">
                    <input type="text">
                </form>

                <!-- Facebook -->
                <a class="btn btn-primary" style="background-color: #3b5998;" href="#!" role="button"><i
                        class="fab fa-facebook-f"></i></a>

                <!-- Twitter -->
                <a class="btn btn-primary" style="background-color: #55acee;" href="#!" role="button"><i
                        class="fab fa-twitter"></i></a>


                </a>
                <!-- Linkedin -->
                <a class="btn btn-primary" style="background-color: #0082ca;" href="#!" role="button"><i
                        class="fab fa-linkedin-in"></i></a>
            </div>
        </div> --}}
