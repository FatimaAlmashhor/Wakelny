@extends('client.master_layout')
@section('content')

@foreach ($projects as $item)
    <div class="container">
            <div class="d-flex justify-content-between flex-wrap">
                <!-- <h3 class="my-5"> تصميم شعار لموقع بيع ملابس</h3> -->
                <h3 class="my-5">{{ $item->title }}</h3>
            </div>
    </div>

    <div class="container">
        <div class="row my-5">
            <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">
                    <div class="card-body">
                        <form id="confirm-data" action="" method="post" enctype="multipart/form-data">
                            @csrf
                            <!-- <input type="hidden" value="" name="post_id" /> -->

                            {{-- estamte cost --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المبلغ المطروح من قبل طالب الخدمة
                                    <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">
                                    <input name="cost" class='form-control' type="number" value="{{ $item->cost }}"
                                        aria-label="Username" aria-describedby="basic-addon1" readonly>
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                            </div>

                            {{-- estamte cost --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المستحقات المحددة من قبلك <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">

                                    <input disabled name="cost_after_taxs" class='form-control' type="number"
                                        value="{{ $item->cost }}" aria-label="Username"
                                        aria-describedby="basic-addon1" readonly>
                                    <span class="input-group-text" id="basic-addon1">$</span>
                                </div>
                            </div>
                            {{-- duration --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المدة المطلوبة للتسليم <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">

                                    <input name="duration" class='form-control' id="phone" type="number"
                                        value="{{ $item->duration }}" aria-label="Username"
                                        aria-describedby="basic-addon1" readonly>
                                    <span class="input-group-text" id="basic-addon1">ايام</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="post_description">وصف المشروع</label>
                                <textarea class="form-control" name='post_description' id="post_description" type="text"
                                    style="height: 10rem;" data-sb-validations="required" readonly>{{ $item->post_description }}</textarea>
                            </div>
                            
                            <div class="mt-4">
                                <label class="form-label" for="comment_description">تفاصيل عرضك</label>
                                <textarea class="form-control" name='comment_description' id="comment_description" type="text"
                                    style="height: 10rem;" data-sb-validations="required" readonly>{{ $item->comment_description }}</textarea>
                            </div>
                            <div class="mt-4">
                                <button class="wak_btn" type="submit" name="confirm">تأكيد الموافقة</button>
                                <button class="wak_btn" type="submit" name="reject">رفض</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@endsection
