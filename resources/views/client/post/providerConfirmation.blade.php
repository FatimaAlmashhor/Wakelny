@extends('client.master_layout')
@section('content')
    {{-- @foreach ($projects as $project) --}}
    <div class="container pt-20">
        <div class="d-flex justify-content-between flex-wrap">
            <h3 class="my-5 font-xl font-bold">{{ $project->title }}</h3>
        </div>
    </div>

    <div class="container ">
        <div class="row my-5 grid place-items-center">
            <div class="col-lg-8 col-sm-12">
                <div class="card shadow-sm ">
                    <div class="card-body">
                        <form id="confirm-data" action="{{ route('provider-confirm', $project->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" value="{{ $project->id }}" name="offer_id" />


                            {{-- estamte cost --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المبلغ المطروح من قبل طالب الخدمة
                                    <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">
                                    <input name="cost" class='form-control' type="number" value="{{ $amount }}"
                                        aria-label="Username" aria-describedby="basic-addon1" readonly></span>
                                </div>
                            </div>

                            {{-- estamte cost --}}
                            <div class="col-lg-6 col-sm-12 col-xs-12 pt-3">
                                <label>المستحقات المحددة من قبلك <em class="text--danger">*</em>
                                </label>
                                <div class="input-group mb-3">

                                    <input disabled name="cost_after_taxs" class='form-control' type="number"
                                        value="{{ $project->cost }}" aria-label="Username" aria-describedby="basic-addon1"
                                        readonly>
                                    <span class="input-group-text" id="basic-addon1">$</span>
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
                            <div class="mt-4 float-left">
                                <a href='{{ route('AcceptProject', [$project->project_id, $project->seeker_id]) }}'
                                    class="mo-btn " type="submit" name="confirm"> تأكيد الموافقة</a>
                                <a href='{{ route('rejectProject', [$project->project_id, $project->seeker_id]) }}'
                                    class="mo-btn btn-blue-rounderd " type="submit" name="reject"> رفض</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- @endforeach --}}
@endsection
