@extends('client.master_layout')
@section('content')
    <style>
        .bootstrap-select>.dropdown-toggle.bs-placeholder,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:hover,
        [type=button]:not(:disabled),
        [type=reset]:not(:disabled),
        .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled),
        .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled) {
            border: 1px solid #D5DADF;
            width: 257px;
            text-align: right;
        }

        .bootstrap-select[class*=col-] .dropdown-toggle {
            width: 675px;
        }

    </style>
    @foreach ($works as $item)
        <div class="row mx-1  mt-2 ">
            <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                <ol class="breadcrumb ms-3">
                    <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>&nbsp&nbsp/&nbsp
                    <li class=" fs-6 fw-bold"> تفاصيل العمل &nbsp&nbsp /</li>
                    <li class=" active fs-6 fw-bold" aria-current="page">
                        &nbsp {{ $item->title }} </li>
                    <li class=" fs-6 fw-bold"> </li>
                </ol>
            </nav>

        </div>
        <div class="container">
            <div class="row my-2">
                <div style="float:right;">
                {{-- edition btn --}}
                <div class="dropdown btn-group float-start">
                    <a tabindex="-1" class="wak_btn" data-bs-toggle="modal" data-bs-target="#deleteModel">
                        <i class="fa fa-xmark px-1"></i>
                        <span class="action-text">حذف العمل</span>
                    </a>
                    <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        {{-- <i class="fa fa-caret-down"></i> --}}
                    </button>
                    <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu" aria-labelledby="خيارات">
                        <li class="text-end my-2 px-2">
                            <a tabindex="-1" href="{{ route('edit_work', $item->id) }}">
                                <i class="fa fa-fw fa-gear"></i>
                                <span class="action-text">تعديل العمل</span>
                            </a>
                        </li>


                    </ul>
                </div>
                {{-- <a  href="{{ route('edit_work' , $item->id) }}" class="btn btn-icon btn-outline-dribbble">
                                              <i class="fas fa-edit bx bx-edit-alt me-1"></i>
                                         </a>
                                         <a  href="{{ route('toggle_work' , $item->id) }}" class="btn btn-icon btn-outline-dribbble">
                                                 @if ($item->is_active == 1)
                                                     <i class="fas fa-toggle-on bx bx-edit-alt me-1" style="color:#ff5d5d;" > </i>
                                                     @else
                                                     <i class="fas fa-toggle-off bx bx-edit-alt me-1" style="color:#84e984;" > </i>
                                                 @endif
                                         </a> --}}
            </div>
                <div class="col-md-8 col-sm-12 my-2">
                    <div class="card shadow-sm ">
                        <div class="card-body">
                            @csrf
                            <div class="row my-4  border border-1 rounded pt-2 pb-2 ">
                                <img src="/images/{{ $item->main_image }}" alt="">
                            </div>
                            <div class="row my-4  border border-1 rounded pt-2 pb-2 ">
                                <img src="/images/file2.jpg" alt="">
                            </div>
                            <div class="row my-4  border border-1 rounded pt-2 pb-2 ">
                                <img src="/images/file2.jpg" alt="">
                            </div>
                            <div class="row my-4   ">
                                <label for="" class="col-md-6 col-form-label fw-bold color-green ">
                                    تفاصيل العمل</label>
                                <p class="mx-2">{{ $item->details }}</p>
                                <a class="color-green mx-2">{{ $item->link }}</a>
                            </div>
                            {{ csrf_field() }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 my-2">
                    <div class="card shadow-sm pr-4 py-1 ">
                        <div class="pt-3 pb-2 " style="border-bottom: 1px solid var(--bg-main-bg)">
                            <h5 style="color: var(--bg-color-0);font-size: 17px"> بطاقة العمل </h5>
                        </div>
                        <div class="row p-3">
                            <div class="row" style="padding:4px 5px">
                                <div class="col-6 col-md-7 col-lg-6 col-xl-5 text-right  p-1"
                                    style="color: var(--bg-color-0);font-size: 13px;">
                                    تاريخ الانجاز
                                </div>
                                <div class="col-6 col-md-5 col-lg-6 col-xl-7 px-0 text-right p-1 font-1">
                                    {{ $item->comple_date }}
                                </div>
                            </div>
                            <div class="row" style="">
                                <div class="col-6 col-md-7 col-lg-6 col-xl-5 text-right  p-1"
                                    style="color: var(--bg-color-0);font-size: 13px;">
                                    المشاهدات
                                </div>
                                <div class="col-6 col-md-5 col-lg-6 col-xl-7 px-0 text-right p-1 font-1">
                                    6
                                </div>
                            </div>
                            <div class="p-0 my-3" style="height:1px;background: var(--bg-main-bg);"></div>
                            <div class="px-2">
                                <span class="px-1" style="padding:4px 5px;font-size:12px">المستقل</span>
                            </div>
                            <div class="px-2 row d-flex align-items-center justify-content-between text-truncate"
                                style="flex-wrap: nowrap;">
                                <div class="d-flex align-items-center">
                                    <a href="" class="d-inline-block">
                                        <img src="/images/{{ $item->avatar }}"
                                            style="width: 70px;     height: 70px; border-radius:inherit;padding: 6px;;border-radius: 50%;">
                                    </a>
                                    <div class="d-inline-block px-1" style="font-size:15px">
                                        <a href="" style="color: inherit;">
                                            {{ $item->name }}
                                        </a>
                                        <div class="d-block mt-1" style="font-size:10px;opacity: 0.7;">
                                            <span class="d-inline-block">
                                                <span class="fas fa-suitcase mb-1 pl-0 pl-md-1  "></span>
                                                {{ $item->job_title }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <!-- confirm delete Modal -->
                <div class="modal fade" id="deleteModel" tabindex="-1" aria-labelledby="deleteModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModel">حذف العمل</h5>
                                {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                            </div>
                            <div class="modal-body">
                                هل تريد حذف {{ $item->title }}
                            </div>
                            <div class="modal-footer">
                                <a href="{{ route('toggle_work' , $item->id) }}" class="btn btn-danger">تاكيد الحذف</a>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" style="width: auto">الغاء</button>
                                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                            </div>
                        </div>
                    </div>
                </div>
    @endforeach
@endsection
