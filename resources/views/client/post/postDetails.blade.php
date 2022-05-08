@extends('client.master_layout')
@section('content')
    {{--  --}}
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap">
            <h3 class="my-5"> {{ $post->title }}</h3>
            <div class="card--actions hidden-xs my-5">

                @if (Auth::check() && Auth::id() == $post->user_id)
                    {{-- edition btn --}}
                    <div class="dropdown btn-group">
                        <a tabindex="-1" class="wak_btn" data-bs-toggle="modal" data-bs-target="#deleteModel">
                            <i class="fa fa-xmark px-1"></i>
                            <span class="action-text">اغلاق المشروع </span>
                        </a>
                        <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{-- <i class="fa fa-caret-down"></i> --}}
                        </button>
                        <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu" aria-labelledby="خيارات">
                            <li class="text-end my-2 px-2">
                                <a tabindex="-1" href="{{ route('editPosts', $post_id) }}">
                                    <i class="fa fa-fw fa-gear"></i>
                                    <span class="action-text">تعديل المشروع</span>
                                </a>
                            </li>
                            <li class="text-end my-2 px-2">
                                <a tabindex="-1"
                                    href="https://mostaql.com/register?t=SO0TO7smnWJanTpKDpZ2jcSQnLT4WEeSPn3gAUNK">
                                    <i class="fa fa-fw fa-flag"></i>
                                    <span class="action-text">تبليغ عن محتوى</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endif


                <!-- confirm delete Modal -->
                <div class="modal" id="deleteModel" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModel">حذف المشروع</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                هل تريد حذف {{ $post->title }}
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('toggle_post', $post_id) }}" class="btn wak_btn">تاكيد الحذف</a>
                                <button type="button" class="btn wak_btn green_border"
                                    data-bs-dismiss="modal">الغاء</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <h5 class="card-header">تفاصيل المشروع</h5>

                    <div class="card-body">
                        <p class="card-text"> {{ $post->description }}</p>
                    </div>

                </div>
                <div class="card mt-3">
                    <h5 class="card-header">المهارات المطلوبة</h5>

                    <div class="skills mt-3">
                        @if (count($skills) == 0)
                            <p>لاتوجد مهارات مطلوبه </p>
                        @endif
                        @foreach ($skills as $item)
                            <a class="btn-tag color-gray-lighter" href="#" role="button">
                                <i class="fa-solid fa-tags"></i>
                                <span class="me-1">{{ $item->name }}</span>
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
                                <h3 class="my-5"> اضف عرض جديد</h3>
                                <div class="card shadow-sm ">
                                    <div class="card-body">

                                        <form id="contactForm" class="row g-3" action='{{ route('comment.add') }}'
                                            method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" value="{{ $post_id }}" name="post_id" />

                                            {{-- estamte cost --}}
                                            <div class="col-sm-4 col-xs-12 pt-3">
                                                <label>قيمة العرض
                                                    <em class="text--danger">*</em>
                                                </label>
                                                <div class="input-group mb-3">

                                                    <input name="cost" class='form-control' type="number"
                                                        value="{{ old('cost') }}" aria-label="Username"
                                                        aria-describedby="basic-addon1">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>

                                                <p class="text-muted font-xs">اختر ميزانية مناسبة</p>
                                                @error('cost')
                                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning"
                                                        role="alert"
                                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>


                                            {{-- estamte cost --}}
                                            <div class="col-sm-4 col-xs-12 pt-3">
                                                <label>مستحقاتك <em class="text--danger">*</em>
                                                </label>
                                                <div class="input-group mb-3">

                                                    <input disabled name="cost_after_taxs" class='form-control'
                                                        type="number" value="{{ old('cost_after_taxs') }}"
                                                        aria-label="Username" aria-describedby="basic-addon1">
                                                    <span class="input-group-text" id="basic-addon1">$</span>
                                                </div>

                                                <span class="text-muted font-xs">بعد خصم عمولة موقع مستقل</span>
                                                @error('cost_after_taxs')
                                                    <div id='alert ' class="   px-4 alert position-fixed  alert-warning"
                                                        role="alert"
                                                        style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                        {{ $message }}
                                                    </div>
                                                @enderror

                                            </div>
                                            {{-- duration --}}
                                            <div class="col-sm-4 col-xs-12 pt-3">
                                                <label>المدة المتوقعة للتسليم <em class="text--danger">*</em>
                                                </label>
                                                <div class="input-group mb-3">

                                                    <input name="duration" class='form-control' id="phone" type="number"
                                                        value="{{ old('duration') }}" aria-label="Username"
                                                        aria-describedby="basic-addon1">
                                                    <span class="input-group-text" id="basic-addon1">ايام</span>
                                                </div>

                                                <span class="text-muted font-xs">متى تحتاج لتنفيذ مشروعك</span>
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
                                                <label class="form-label" for="message">تفاصيل العرض</label>
                                                <textarea class="form-control" name='message' value="{{ old('message') }}" id="message" type="text"
                                                    style="height: 10rem;" data-sb-validations="required"
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
                                                <label class="form-label" for="message">ملفات توضيحية</label>
                                                <input class="form-control" id="dropzone" multiple name='files'
                                                    type="file" value="{{ old('files') }}"
                                                    data-sb-validations="required">


                                            </div>
                                            <div>
                                                <button class="wak_btn w-full" type="submit">انشر الان
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
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
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
                                                            <i class="fa fa-fw fa-briefcase font-xs color-gray-dark"></i>

                                                            <span
                                                                class="color-gray-dark px-2 font-sm">{{ $item->specialization }}</span>
                                                        </div>

                                                    </div>

                                                </div>
                                                {{-- تعديل الكومنتات --}}
                                                <div class="col-md-6 col-sm-12">
                                                    <div class="row ">
                                                        <div class="col-6  ">
                                                            @if (Auth::check() && $item->user_id == auth()->user()->id)
                                                                <button class="wak_btn w-full" data-bs-toggle="collapse"
                                                                    data-bs-target="#demo"
                                                                    style="width:100% ; padding: .6rem">
                                                                    <i class="fa fa-fw fa-edit"></i>
                                                                    <span class="action-text">تعديل العرض </span>
                                                                </button>
                                                            @endif
                                                        </div>
                                                        <div class="card--actions hidden-xs col-6 ">
                                                            <div class="dropdown btn-group">

                                                                <a tabindex="-1" class="wak_btn green_border" href="#"
                                                                    style="width:100% ; padding: .6rem">
                                                                    <i class="fa-solid fa-gear px-1"></i>
                                                                    <span class="action-text">خيارات </span>
                                                                </a>

                                                                <button class="dropdown-toggle wak_btn "
                                                                    style="border-radius: 0px" data-bs-toggle="dropdown"
                                                                    aria-expanded="false">
                                                                    {{-- <i class="fa fa-caret-down"></i> --}}
                                                                </button>
                                                                <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 "
                                                                    role="menu" aria-labelledby="خيارات">

                                                                    <li class="text-end my-2 px-2">
                                                                        <a tabindex="-1"
                                                                            href="{{ route('report_provider', $item->user_id) }}">

                                                                            <i class="fa fa-fw fa-flag"></i>
                                                                            <span class="action-text">تبليغ عن
                                                                                محتوى</span>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>

                                                        </div>
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
                                                                    <div class="col-sm-4 col-xs-12 pt-3">
                                                                        <label>قيمة العرض
                                                                            <em class="text--danger">*</em>
                                                                        </label>
                                                                        <div class="input-group mb-3">

                                                                            <input name="cost" class='form-control'
                                                                                type="number"
                                                                                value="{{ $item->cost ?? old('cost') }}"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon1">$</span>
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
                                                                    <div class="col-sm-4 col-xs-12 pt-3">
                                                                        <label>مستحقاتك <em class="text--danger">*</em>
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

                                                                        <span class="text-muted font-xs">بعد خصم عمولة
                                                                            موقع مستقل</span>
                                                                        @error('cost_after_taxs')
                                                                            <div id='alert '
                                                                                class="   px-4 alert position-fixed  alert-warning"
                                                                                role="alert"
                                                                                style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror

                                                                    </div>
                                                                    {{-- duration --}}
                                                                    <div class="col-sm-4 col-xs-12 pt-3">
                                                                        <label>المدة المتوقعة للتسليم <em
                                                                                class="text--danger">*</em>
                                                                        </label>
                                                                        <div class="input-group mb-3">

                                                                            <input name="duration" class='form-control'
                                                                                id="phone" type="number"
                                                                                value="{{ $item->duration ?? old('duration') }}"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1">
                                                                            <span class="input-group-text"
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
                                                                        <label class="form-label" for="message">تفاصيل
                                                                            العرض</label>
                                                                        <textarea class="form-control" name='message' id="message" type="text" style="height: 10rem;"
                                                                            data-sb-validations="required"
                                                                            required>{{ $item->description ?? old('description') }}</textarea>
                                                                        <p class="text-muted font-xs">أدخل وصفاً مفصلاً
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
                                                                        <label class="form-label" for="message">ملفات
                                                                            توضيحية</label>
                                                                        <input class="form-control" id="dropzone"
                                                                            multiple name='files' type="file"
                                                                            value="{{ $item->files ?? old('files') }}"
                                                                            data-sb-validations="required">


                                                                    </div>
                                                                    <div>
                                                                        <button class="wak_btn w-full" type="submit">حفظ
                                                                            التعديلات
                                                                        </button>
                                                                    </div>
                                                                    {{-- <button class="wak_btn" data-bs-toggle="collapse"
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
                                            @if (Auth::check() && $post->user_id == Auth::id())
                                                <div class="raw m-2">
                                                    <button tabindex="-1" class="wak_btn orange mx-2 col-sm-6 " type="button"
                                                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                        <i class="fa fa-check px-1"></i>
                                                        <span class="action-text"> قبول العرض </span>
                                                    </button>
                                                    <a tabindex="-1" class="wak_btn green_border col-sm-6 " href="#">
                                                        <i class="fa fa-send px-1"></i>
                                                        <span class="action-text"> تواصل مع المستقل </span>
                                                    </a>
                                                </div>
                                            @endif

                                        </div>


                                        <!-- Acceptance Modal -->
                                        <div class="modal" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title order-2" id="exampleModalLabel">قبول
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
                                                                        <label>المبلغ المتفق عليه <em
                                                                                class="text--danger text-danger">*</em></label>
                                                                        <div class="input-group mt-1">
                                                                            <input name="amount" class='form-control'
                                                                                id="amount" type="text"
                                                                                value="{{ old('cost') }}"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon1">$</span>
                                                                        </div>
                                                                        @error('amount')
                                                                            <p class="text-danger" role="alert">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <label>المده المتفق عليه <em
                                                                                class="text--danger text-danger">*</em></label>
                                                                        <div class="input-group mt-1">
                                                                            <input name="duration" class='form-control'
                                                                                id="duration" type="text"
                                                                                value="{{ old('duration') }}"
                                                                                aria-label="Username"
                                                                                aria-describedby="basic-addon1">
                                                                            <span class="input-group-text"
                                                                                id="basic-addon1">$</span>
                                                                        </div>
                                                                        @error('duration')
                                                                            <p class="text-danger" role="alert">
                                                                                {{ $message }}
                                                                            </p>
                                                                        @enderror
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <div class="row modal-footer  ">
                                                                <input type="submit" class="btn wak_btn"
                                                                    value="قبول العرض">
                                                                <button type="button" class="btn wak_btn green_border"
                                                                    data-bs-dismiss="modal">تراجع</button>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- /Acceptance Modal -->
                                    @endforeach
                                @endif

                        </div>
                    </div>
                    {{-- @else
                            <p>لايوجد عروض حاليا</p>
                        </div>
                        @endif --}}

                </div>






            </div>





            {{-- @if (count($errors) > 0)
                    <script>
                        $( document ).ready(function() {
                            $('#exampleModal').modal('show');
                        });
                    </script>
                @endif --}}



        </div>
        {{-- more information --}}
        <div class="col-md-4 col-sm-12">
            <div class="card">
                <h5 class="card-header">بطاقة المشروع</h5>

                <div class="card-body">
                    <div class="d-flex justify-content-between ">
                        <div>
                            <div class="my-3"> حالة المشروع</div>
                            <div class="my-3"> تاريخ النشر</div>
                            <div class="y-3"> الميزانية </div>
                            <div class="my-3"> مدة التنفيذ</div>
                            <div class="my-3"> عدد العروض</div>
                        </div>
                        <div>
                            <div class="my-3"> <span class="px-1"
                                    style="background-color: green ; color:white;">{{ $post->status }}</span></div>
                            <div class="my-3"> {{ $post->created_at }}</div>
                            <div class="my-3"> ${{ $post->cost }}</div>

                            <div class="my-3"> {{ $post->duration }}</div>

                            <div class="my-3"> {{ $post->offers }}</div>
                        </div>
                    </div>
                </div>
                <hr>
                <div>
                    <p><i class="fa fa-circle-chevron-left px-2 "></i>مرحلة تلقي العروض</p>
                    <p> <i class="fa fa-circle-dot px-2 color-gray-light"></i>مرحلة التنفيذ</p>
                    <p> <i class="fa fa-circle-dot px-2 color-gray-light"></i>مرحلة التسليم </p>

                </div>
                <hr>
                <div>
                    <p>صاحب المشروع</p>
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
        </div>
    </div>
    </div>



    </div>
    </div>
    <script src="/assets/client/js/acceptance-modalNavigation.js"></script>
@endsection
