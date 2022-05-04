<div class="container">

    <h3 class="my-5"> اضف عرض جديد</h3>
    <div class="row my-5">
        <div class="col-md-8 col-sm-12">
            <div class="card shadow-sm ">
                <div class="card-body">
                    <form id="contactForm" class="row g-3" action='{{ route('update_comment', $data->id) }}' method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" value="{{ $post_id }}" name="post_id" /> --}}

                        {{-- estamte cost --}}
                        <div class="col-sm-4 col-xs-12 pt-3">
                            <label>قيمة العرض
                                <em class="text--danger">*</em>
                            </label>
                            <div class="input-group mb-3">

                                <input name="cost" class='form-control' type="number" value="{{ $data->cost ?? old('cost') }}"
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
                                    value="{{ $data->cost_after_taxs ?? old('cost_after_taxs') }}" aria-label="Username"
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
                                    value="{{ $data->duration ?? old('duration') }}" aria-label="Username"
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
                            <textarea class="form-control" name='message'  id="message" type="text"
                                style="height: 10rem;" data-sb-validations="required" required>{{ $data->description ?? old('description') }}</textarea>
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
                                value="{{ $data->files ?? old('files') }}" data-sb-validations="required">


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
    </div>
</div>
