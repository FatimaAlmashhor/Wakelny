@extends('client.master_layout')
@section('content')
    <div class="container">
        <h3 class="my-5"> اضف عرض جديد</h3>
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">
                    <div class="card-body">
                        <form id="contactForm" class="row g-3" action='{{ route('comment.add') }}' method="post"
                            enctype="multipart/form-data">
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
            </div>
            <div class="col-md-4 col-sm-12">
                @if (!empty($comments))
                    @foreach ($comments as $item)
                        <div class="card p-4 container my-3" style="direction: rtl;">
                            <div class="box d-flex justify-content-between">
                                <div class="image d-flex">
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

                                            <span class="color-gray-dark px-2 font-sm">{{ $item->specialization }}</span>
                                        </div>

                                    </div>

                                </div>
                                <div class="card--actions hidden-xs">
                                    <div class="dropdown btn-group">

                                        <a tabindex="-1" class="wak_btn" href="#">
                                            <i class="fa fa-fw fa-send"></i>
                                            <span class="action-text">كلفني </span>
                                        </a>

                                        <button class="dropdown-toggle wak_btn" style="border-radius: 0px"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            {{-- <i class="fa fa-caret-down"></i> --}}
                                        </button>
                                        <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu"
                                            aria-labelledby="خيارات">
                                            <li class="my-2 border-bottom text-end ">
                                                <a tabindex="-1"
                                                    href="https://mostaql.com/register?t=SO0TO7smnWJanTpKDpZ2jcSQnLT4WEeSPn3gAUNK">
                                                    <i class="fa fa-fw fa-bookmark"></i>
                                                    <span class="action-text">أضف إلى المفضلة</span>
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

                                </div>

                            </div>
                            <p class="font-sm mt-3">{{ $item->description }}</p>

                        </div>
                    @endforeach
                @else
                    <p>لايوجد عروض حاليا</p>
                @endif

            </div>
        </div>
    </div>
@endsection