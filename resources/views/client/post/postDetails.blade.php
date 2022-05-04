@extends('client.master_layout')
@section('content')
    {{--  --}}
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap">
            <h3 class="my-5"> تصميم شعار لموقع بيع ملابس</h3>
            <div class="card--actions hidden-xs my-5">
                <div class="dropdown btn-group">

                    <a tabindex="-1" class="wak_btn" href="#">
                        <i class="fa fa-xmark px-1"></i>
                        <span class="action-text">اغلاق المشروع </span>
                    </a>

                    <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{-- <i class="fa fa-caret-down"></i> --}}
                    </button>
                    <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu" aria-labelledby="خيارات">
                        <li class="text-end my-2 px-2">
                            <a tabindex="-1" href="{{ route('posts.details', $post_id) }}">
                                <i class="fa fa-fw fa-gear"></i>
                                <span class="action-text">تعديل المشروع</span>
                            </a>
                        </li>
                        <li class="text-end my-2 px-2">
                            <a tabindex="-1" href="https://mostaql.com/register?t=SO0TO7smnWJanTpKDpZ2jcSQnLT4WEeSPn3gAUNK">
                                <i class="fa fa-fw fa-flag"></i>
                                <span class="action-text">تبليغ عن محتوى</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                <div class="card">
                    <h5 class="card-header">تفاصيل المشروع</h5>

                    <div class="card-body">
                        <p class="card-text">اريد مصمم لتصميم شعار موقع بيع ملابس</p>
                    </div>

                </div>
                <div class="card mt-3">
                    <h5 class="card-header">المهارات المطلوبة</h5>

                    <div class="skills mt-3">

                        <a class="btn-tag color-gray-lighter" href="#" role="button">
                            <i class="fa-solid fa-tags"></i>
                            <span class="me-1">فوتوشوب</span>
                        </a>
                        <a class="btn-tag color-gray-lighter" href="#" role="button">
                            <i class="fa-solid fa-tags"></i>

                            <span class="me-1">تصميم</span>
                        </a>
                    </div>
                </div>
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

                                <div class="card p-4  my-3" style="direction: rtl;">
                                    <div class="box d-flex justify-content-between flex-wrap">
                                        <div class="image d-flex flex-wrap">



                                            <img class="rounded-circle mr-4 border"
                                                style="width:60px ; height:60px ; object-fit: cover"
                                                src="{{ asset('assets/client/images/user-profile-2.png') }}" alt="">



                                            <div class="info mx-4">
                                                <h4 class="font-md">
                                                    <a href="#">داوود بسليمان</a>
                                                </h4>

                                                <div class="rate">

                                                    <i class="fa fa-star clr-amber rating-star" style="color: orange;"></i>

                                                    <i class="fa fa-star clr-amber rating-star"
                                                        style="color: gainsboro;"></i>



                                                    <span class="px-1 font-sm color-gray-dark "></span>
                                                    <i class="fa fa-fw fa-briefcase font-xs color-gray-dark"></i>

                                                    <span class="color-gray-dark px-1 font-sm">مصمم جرافيك</span>

                                                    <span class="px-1 font-sm color-gray-dark "></span>
                                                    <i class="fa fa-clock font-xs color-gray-dark"></i>

                                                    <span class="color-gray-dark px-2 font-sm">منذ 18 ساعة</span>
                                                </div>

                                            </div>

                                        </div>

                                        <div class="card--actions hidden-xs">
                                            <div class="dropdown btn-group">

                                                <a tabindex="-1" class="wak_btn" href="#">
                                                    <i class="fa-solid fa-gear px-1"></i>
                                                    <span class="action-text">خيارات </span>
                                                </a>

                                                <button class="dropdown-toggle wak_btn" style="border-radius: 0px"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    {{-- <i class="fa fa-caret-down"></i> --}}
                                                </button>
                                                <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu"
                                                    aria-labelledby="خيارات">

                                                    <li class="text-end my-2 px-2">
                                                        <a tabindex="-1"
                                                            href="https://mostaql.com/register?t=SO0TO7smnWJanTpKDpZ2jcSQnLT4WEeSPn3gAUNK">
                                                            <i class="fa fa-fw fa-flag"></i>
                                                            <span class="action-text">تبليغ عن محتوى</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-around m-3 bg-lighter-gray p-3">
                                        <div>
                                            <div>المبلغ</div>
                                            <div>35.00$</div>
                                        </div>
                                        <div>
                                            <div>مدة التنفيذ</div>
                                            <div>3 أيام</div>
                                        </div>
                                        <div>
                                            <div>معرض الأعمال</div>
                                            <div>9 أعمال</div>
                                        </div>
                                        <div>
                                            <div>تقييم العرض</div>
                                            <div><i class="fa-thin fa-circle"></i></div>
                                        </div>
                                    </div>

                                    <p class="font-sm mt-3">مرحبا أخي

                                        نحن في الخدمة سوف نقدم لك شعار حسب وصفك للمشروع حيث نعرض عليك أكثر من نموذج و
                                        أنت
                                        تختار أفضل و بصيغ متعددة مفتوحة المصدر لكي تعدل عليها متى تشاء و التعديل حتى نصل
                                        إلى
                                        ما يعجبك .

                                        هدفنا هو تقديم الإضافة لهذه المنصة و مساعدة اصحاب المشاريع مثلك

                                        و في الأخير نتمنى العمل معك .</p>

                                    <div class="m-2">
                                        <button tabindex="-1" class="wak_btn mx-2" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-check px-1"></i>
                                            <span class="action-text"> قبول العرض </span>
                                        </button>
                                        <a tabindex="-1" class="wak_btn green_border" href="#">
                                            <i class="fa fa-send px-1"></i>
                                            <span class="action-text"> تواصل مع المستقل </span>
                                        </a>
                                    </div>

                                </div>

                                
                            </div>
                        </div>




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
                                <div class="my-3"> متوسط العروض </div>
                                <div class="my-3"> عدد العروض</div>
                            </div>
                            <div>
                                <div class="my-3"> <span class="px-1"
                                        style="background-color: green ; color:white;">مفتوح</span></div>
                                <div class="my-3"> منذ 17 دقيقة</div>
                                <div class="my-3"> $250.00 - $500.00</div>

                                <div class="my-3"> $500.00</div>

                                <div class="my-3"> 60 يوما</div>
                                <div class="my-3"> 2</div>
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
                                    <a href="#">داوود بسليمان</a>
                                </h4>

                                <div class="rate">
                                    <span class="px-1 font-sm color-gray-dark "></span>
                                    <i class="fa fa-fw fa-briefcase font-xs color-gray-dark"></i>
                                    <span class="color-gray-dark px-1 font-sm">مصمم جرافيك</span>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="card mt-3">
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
                </div>
            </div>


        </div>


    </div>



    {{--  --}}
    <div class="container">
        <h3 class="my-5"> اضف عرض جديد</h3>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                {{-- comment post condition --}}
                @if (!$hasComment)
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

                                        <input name="cost" class='form-control' type="number" value="{{ old('cost') }}"
                                            aria-label="Username" aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>

                                    <p class="text-muted font-xs">اختر ميزانية مناسبة</p>
                                    @error('cost')
                                        <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
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

                                        <input disabled name="cost_after_taxs" class='form-control' type="number"
                                            value="{{ old('cost_after_taxs') }}" aria-label="Username"
                                            aria-describedby="basic-addon1">
                                        <span class="input-group-text" id="basic-addon1">$</span>
                                    </div>

                                    <span class="text-muted font-xs">بعد خصم عمولة موقع مستقل</span>
                                    @error('cost_after_taxs')
                                        <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
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
                                        <div id='alert ' class="   px-4 alert position-fixed  alert-warning" role="alert"
                                            style="width: fit-content; position: fixed; top: 20% ; right: 0px ; z-index: 9999999">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                </div>

                                <!-- Message input -->
                                <div>
                                    <label class="form-label" for="message">تفاصيل العرض</label>
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


                                <div class="mb-1">
                                    <label class="form-label" for="message">ملفات توضيحية</label>
                                    <input class="form-control" id="dropzone" multiple name='files' type="file"
                                        value="{{ old('files') }}" data-sb-validations="required">


                                </div>
                                <div>
                                    <button class="wak_btn w-full" type="submit">انشر الان
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
                @endif
            </div>
            <div class="col-md-8 col-sm-12">
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
                                            src="{{ asset('assets/client/images/user-profile-2.png') }}" alt="">
                                        {{-- @endif --}}

                                    </a>
                                    <div class="info mx-4">
                                        <h4 class="font-md"><a
                                                href="{{ route('userProfile', $item->user_id) }}">{{ $item->name }}</a>
                                        </h4>

                                        <div class="rate">
                                            @for ($i = 0; $i < 5; $i++)
                                                @if ((int) $item->rating > $i)
                                                    <i class="fa fa-star clr-amber rating-star" style="color: orange;"></i>
                                                @else
                                                    <i class="fa fa-star clr-amber rating-star"
                                                        style="color: gainsboro;"></i>
                                                @endif
                                            @endfor

                                            <span class="px-2 font-sm color-gray-dark ">%{{ $item->rating * 20 }}</span>
                                            <i class="fa fa-fw fa-briefcase font-xs color-gray-dark"></i>

                                            <span
                                                class="color-gray-dark px-2 font-sm">{{ $item->specialization }}</span>
                                        </div>

                                    </div>

                                </div>
                                {{-- تعديل الكومنتات --}}
                                <div class="col-6 ">
                                    @if ($item->user_id == auth()->user()->id)
                                        <button class="wak_btn" data-bs-toggle="collapse" data-bs-target="#demo">
                                            <i class="fa fa-fw fa-edit"></i>
                                            <span class="action-text">تعديل العرض </span>
                                        </button>
                                    @endif
                                </div>
                                <p class=" col-12 font-sm mt-3">{{ $item->description }}</p>
                                {{-- فورم التعديل --}}
                                @if ($item->user_id == auth()->user()->id)
                                    <div class="col-12 collapse" id="demo">

                                        <div class="card shadow-sm ">
                                            <div class="card-body">
                                                <form id="contactForm" class="row g-3"
                                                    action='{{ route('update_comment', $item->offer_id) }}' method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    {{-- <input type="hidden" value="{{ $post_id }}" name="post_id" /> --}}

                                                    {{-- estamte cost --}}
                                                    <div class="col-sm-4 col-xs-12 pt-3">
                                                        <label>قيمة العرض
                                                            <em class="text--danger">*</em>
                                                        </label>
                                                        <div class="input-group mb-3">

                                                            <input name="cost" class='form-control' type="number"
                                                                value="{{ $item->cost ?? old('cost') }}"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                            <span class="input-group-text" id="basic-addon1">$</span>
                                                        </div>

                                                        <p class="text-muted font-xs">اختر ميزانية مناسبة</p>
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

                                                            <input disabled name="cost_after_taxs" class='form-control'
                                                                type="number"
                                                                value="{{ $item->cost_after_taxs ?? old('cost_after_taxs') }}"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                            <span class="input-group-text" id="basic-addon1">$</span>
                                                        </div>

                                                        <span class="text-muted font-xs">بعد خصم عمولة موقع مستقل</span>
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
                                                        <label>المدة المتوقعة للتسليم <em class="text--danger">*</em>
                                                        </label>
                                                        <div class="input-group mb-3">

                                                            <input name="duration" class='form-control' id="phone"
                                                                type="number"
                                                                value="{{ $item->duration ?? old('duration') }}"
                                                                aria-label="Username" aria-describedby="basic-addon1">
                                                            <span class="input-group-text" id="basic-addon1">ايام</span>
                                                        </div>

                                                        <span class="text-muted font-xs">متى تحتاج لتنفيذ مشروعك</span>
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
                                                        <label class="form-label" for="message">تفاصيل العرض</label>
                                                        <textarea class="form-control" name='message' id="message" type="text" style="height: 10rem;"
                                                            data-sb-validations="required"
                                                            required>{{ $item->description ?? old('description') }}</textarea>
                                                        <p class="text-muted font-xs">أدخل وصفاً مفصلاً لمشروعك وأرفق أمثلة
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
                                                        <label class="form-label" for="message">ملفات توضيحية</label>
                                                        <input class="form-control" id="dropzone" multiple name='files'
                                                            type="file" value="{{ $item->files ?? old('files') }}"
                                                            data-sb-validations="required">


                                                    </div>
                                                    <div>
                                                        <button class="wak_btn w-full" type="submit">حفظ التعديلات
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


                        </div>


                        <!-- Acceptance Modal -->
                        <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title order-2" id="exampleModalLabel">قبول العرض</h5>
                                        <button type="button" class="btn-close order-2" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <!-- Modal Taps -->
                                    <div class="modal-tabs">
                                        <nav class="nav col-auto d-flex align-items-center">
                                            <p class="nav-link color-black modal-tab tab-A is-active" id="credit_card" data-current="tab-A"><i class="fa-solid fa-credit-card ms-2"></i>بطاقة ائتمانية</p>
                                            <p class="nav-link color-black modal-tab tab-B" id="payPal" data-current="tab-B"><i class="fa-brands fa-paypal ms-2"></i>Pay Pal</p>
                                            <!-- <p class="nav-link color-black modal-tab tab-C" id="coupon" data-current="tab-C"><i class="fa-solid fa-tags ms-2"></i>قسيمة</p> -->
                                        </nav>
                                    </div>
                                    <!-- /Moda Taps -->

                                    <form action="{{ route('accept-offer') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <input type="hidden" value="{{ $item->provider_id }}" name="provider_id">
                                        <input type="hidden" value="{{ $item->offer_id }}" name="offer_id">
                                        <div class="modal-body d-flex">
                                            <!-- credit card -->
                                            <div class="color-black px-3 modal-panel is-show supSection" id="tab-A">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <label>المبلغ المتفق عليه <em class="text--danger text-danger">*</em></label>
                                                        <div class="input-group mt-1">
                                                            <input name="amount" class='form-control' id="amount" type="text"
                                                                value="{{ old('cost') }}" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                            <span class="input-group-text" id="basic-addon1">$</span>
                                                        </div>
                                                        @error('amount')
                                                            <p class="text-danger" role="alert">
                                                                {{ $message }}
                                                            </p>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <!-- <div class="row mt-3 d-flex justify-content-between">
                                                    <div class="col-6">
                                                        <label>الاسم على البطاقة <em class="text--danger text-danger">*</em> </label>
                                                        <div class="input-group mt-1">
                                                            <input name="amount" class='form-control' id="name" type="text"
                                                                value="{{ old('amount') }}" aria-label="Username"
                                                                aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <label>رقم البطاقة <em class="text--danger text-danger">*</em> </label>
                                                        <div class="input-group mt-1">
                                                            <input name="amount" class='form-control' id="credit_NO" type="number"
                                                                value="{{ old('amount') }}" aria-label="Username"
                                                                aria-describedby="basic-addon1" placeholder=".Card NO">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mt-3">
                                                    <input type="checkbox" class="ms-1" id="remember-card" checked>
                                                    <label for="#remember-card">احفظ البطاقة لتسهيل الدفع في المستقبل</label>
                                                </div> -->

                                                <div class="row border-top mt-4 py-3">
                                                    <p>المبلغ النهائي بعد اضافة رسوم إجرائية بنسبة 3% على عملية الدفع: <span class="color-orange font-lg">3082.50$</span> </p>
                                                    <p class="text-muted font-xs"><em class="text--danger text-danger">*</em> رسوم عملية الدفع تقتطعها بوابات الدفع الالكترونية مثل PayPal والبطاقات الائتمانية. </p>
                                                </div>
                                            </div>
                                            <!-- /credit card -->

                                            <!-- Pay Pal -->
                                            <div class="col-12 color-black px-3 modal-panel tab-B supSection" id="tab-B">
                                                <div class="row">
                                                    <section class="card shadow-sm col-12 col-sm-12">
                                                        <div>
                                                            
                                                        </div>
                                                    </section>
                                                </div>
                                            </div>
                                            <!-- /Pay Pal -->

                                            <!-- coupon -->
                                            
                                            <!-- /coupon -->
                                        </div>
                                        <div class="modal-footer d-flex ">
                                            <input type="submit" class="btn wak_btn" value="قبول العرض">
                                            <button type="button" class="btn wak_btn green_border" data-bs-dismiss="modal">تراجع</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- /Acceptance Modal -->

                    @endforeach
                @else
                    <p>لايوجد عروض حاليا</p>
                @endif

            </div>

        </div>
    </div>

    <script src="/assets/client/js/acceptance-modalNavigation.js"></script>
@endsection
