@extends('client.master_layout')
@section('content')
    <style>
        .rating {
            display: flex;
            width: 100%;
            justify-content: center;
            overflow: hidden;
            flex-direction: row-reverse;
            height: 40px;
            position: relative;
        }

        .rating-0 {
            filter: grayscale(100%);
        }

        .rating>input {
            display: none;
        }

        .rating>label {
            cursor: pointer;
            width: 40px;
            height: 40px;
            margin-top: auto;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23e3e3e3' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: center;
            background-size: 76%;
            transition: .3s;
        }

        .rating>input:checked~label,
        .rating>input:checked~label~label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23fcd93a' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        }

        .rating>input:not(:checked)~label:hover,
        .rating>input:not(:checked)~label:hover~label {
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' width='126.729' height='126.73'%3e%3cpath fill='%23d8b11e' d='M121.215 44.212l-34.899-3.3c-2.2-.2-4.101-1.6-5-3.7l-12.5-30.3c-2-5-9.101-5-11.101 0l-12.4 30.3c-.8 2.1-2.8 3.5-5 3.7l-34.9 3.3c-5.2.5-7.3 7-3.4 10.5l26.3 23.1c1.7 1.5 2.4 3.7 1.9 5.9l-7.9 32.399c-1.2 5.101 4.3 9.3 8.9 6.601l29.1-17.101c1.9-1.1 4.2-1.1 6.1 0l29.101 17.101c4.6 2.699 10.1-1.4 8.899-6.601l-7.8-32.399c-.5-2.2.2-4.4 1.9-5.9l26.3-23.1c3.8-3.5 1.6-10-3.6-10.5z'/%3e%3c/svg%3e");
        }

        .feedback {
            max-width: 360px;
            background-color: #fff;
            width: 100%;
            padding: 30px;
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
            align-items: center;
            box-shadow: 0 4px 30px rgba(0, 0, 0, .05);
        }

    </style>
    {{-- @foreach ($projects as $project) --}}
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap mt-20">
            <h3 class="my-5 font-xl font-bold">{{ $project->title }}</h3>
        </div>
    </div>

    <div class="container">
        <div class="row my-5">

            {{-- project information --}}
            <div class="col-md-8 col-sm-12">
                <div class="card shadow-sm ">
                    <div class="card-body">
                        <form id="confirm-data" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $project->id }}" name="offer_id" />


                            {{-- estamte cost --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المبلغ المتفق عليه
                                    <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">
                                    <input name="cost" class='form-control' type="number" value="{{ $project->amount }}"
                                        aria-label="Username" aria-describedby="basic-addon1" readonly></span>
                                </div>
                            </div>

                            {{-- estamte cost --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المبلغ بعد خصم الضريبه الموقع <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">
                                    <div class="input-group mb-3">
                                        <input name="cost" class='form-control' type="number"
                                            value="{{ $project->amount - $project->amount * 0.05 }}" aria-label="Username"
                                            aria-describedby="basic-addon1" readonly></span>
                                    </div>
                                </div>
                            </div>
                            {{-- duration --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المدة المطلوبة للتسليم <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">

                                    <input name="duration" class='form-control' id="phone" type="number"
                                        value="{{ $project->duration }}" aria-label="Username"
                                        aria-describedby="basic-addon1" readonly>
                                    <span class="input-group-text" id="basic-addon1">ايام</span>
                                </div>
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="post_description">وصف المشروع</label>
                                <textarea class="form-control" name='post_description' id="post_description" type="text" style="height: 10rem;"
                                    data-sb-validations="required"
                                    readonly>{{ $project->post_description }}</textarea>
                            </div>

                            <div class="mt-4">
                                <label class="form-label" for="comment_description">تفاصيل عرضك</label>
                                <textarea class="form-control" name='comment_description' id="comment_description" type="text" style="height: 10rem;"
                                    data-sb-validations="required"
                                    readonly>{{ $project->comment_description }}</textarea>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

            {{-- receiving information --}}
            <div class=" col-md-4 col-sm-12">
                <div class="card shadow-sm ">
                    <h4>التسليم</h4>
                    <a href="{{ $project->file }}">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        ملفات المشروع قيم بتحميلها
                    </a>

                    <div class=" col-12 col-xs-12 pt-3">
                        <label> الرباط التشغبي <em class="text--danger">*</em>
                        </label>
                        <div class="input-group mb-3">

                            <input name="duration" class='form-control' id="phone" type="number"
                                value=" {{ $project->url }}" aria-label="Username" aria-describedby="basic-addon1"
                                readonly>
                            <span class="input-group-text" id="basic-addon1">Url</span>
                        </div>
                    </div>
                    <div class=" col-12 col-xs-12 pt-3">
                        <label> الرباط التشغبي <em class="text--danger">*</em>
                        </label>
                        <div class=" mb-3">

                            <input name="duration" class=' checkbox' id="checkbox" type="checkbox"
                                checked={{ $project->other_way_send_files }} aria-label="Username"
                                aria-describedby="basic-addon1" readonly onclick="return false;">
                            <span class="" id="basic-addon1">تم ارسالها بطريقه أخرى</span>
                        </div>
                    </div>

                    <div class="mt-4">
                        <a class="mo-btn btn-blue-bg" type="submit" name="reject" data-bs-toggle="modal"
                            data-bs-target="#evaluationModel"> تأكيد التسليم</a>
                        <a class="mo-btn btn-blue-rounderd  " type="submit" name="reject" data-bs-toggle="modal"
                            data-bs-target="#deleteModel"> رفض التسليم </a>

                        {{-- <a tabindex="-1" class="mo-btn" data-bs-toggle="modal" data-bs-target="#deleteModel">
                            <i class="fa fa-xmark px-1"></i>
                            <span class="action-text">اغلاق المشروع </span>
                        </a> --}}
                    </div>
                </div>




                <!-- confirm rejected Modal -->
                <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header ">
                                <h5 class="modal-title " id="deleteModel">لماذا تريد رفض قبول المشروع</h5>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>

                            <div class="model-body px-2">
                                <form method='POST' action='{{ route('markAsReject') }}'>
                                    @csrf
                                    <input hidden type='text' name="provider_id" value='{{ $project->provider_id }}' />
                                    <input hidden type='text' name="project_id" value='{{ $project->project_id }}' />
                                    <div class="pt-3">
                                        <label class="my-2">اكتب السبب الذي يمنعك من قبول المشروع <em
                                                class="text--danger">*</em>
                                        </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group mb-3">
                                                <textarea name="massege" class='form-control' type="text" aria-label="Username" aria-describedby="basic-addon1"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="mo-btn btn-pink-bg pink">تاكيد الرفض</button>
                                        <button type="button" class="mo-btn btn-blue-bg"
                                            data-bs-dismiss="modal">الغاء</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                                    </div>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>


                <!-- confirm rejected Modal -->
                <div class="modal fade" id="evaluationModel" tabindex="-1" aria-labelledby="evaluationModel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="evaluationModel">تاكيد تسليم المشروع</h5>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>

                            <div class="model-body px-2">
                                <form method='POST' action='{{ route('markAsAccept') }}'>
                                    @csrf
                                    <input hidden type='text' name="provider_id" value='{{ $project->provider_id }}' />
                                    <input hidden type='text' name="project_id" value='{{ $project->project_id }}' />
                                    <div class="pt-3">
                                        <label class="my-2">قم بتقيد اداء المشروع رجاء<em
                                                class="text--danger">*</em>
                                        </label>
                                        <div class="container">
                                            <div class="feedback">
                                                <div class="rating d-flex justify-content-center ">
                                                    <input type="radio" name="rating" id="rating-5" value="5">
                                                    <label for="rating-5"></label>

                                                    <input type="radio" name="rating" id="rating-4" value="4">
                                                    <label for="rating-4"></label>

                                                    <input type="radio" name="rating" id="rating-3" value="3">
                                                    <label for="rating-3"></label>

                                                    <input type="radio" name="rating" id="rating-2" value="2">
                                                    <label for="rating-2"></label>

                                                    <input type="radio" name="rating" id="rating-1" value="1">
                                                    <label for="rating-1"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pt-3">
                                        <label class="my-2">قم بدعم صاحب العمل برساله <em
                                                class="text--danger">*</em>
                                        </label>
                                        <div class="input-group mb-3">
                                            <div class="input-group mb-3">
                                                <textarea name="massege" class='form-control' type="text" aria-label="Username" aria-describedby="basic-addon1"
                                                    required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="mo-btn btn-pink-bg pink">تاكيد التسليم</button>
                                        <button type="button" class="mo-btn btn-blue-rounderd"
                                            data-bs-dismiss="modal">الغاء</button>
                                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                                    </div>
                                </form>
                            </div>



                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@endsection
