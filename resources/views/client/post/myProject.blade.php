@extends('client.master_layout')
@section('content')
    <h3 class="m-5 font-xl font-bold pt-20 flex flex-col justify-start items-start"> المشاريع الخاصة بي</h3>
    {{-- updating --}}
    @foreach ($projects as $item)
        {{-- one card --}}
        <div class="  w-12/12 lg:w-9/12 card mt-5 sm:px-16 lg:px-10 " id='{{ $item->project_id }}'>

            <div class="row ">
                <div class="col-sm-6">
                    <a href="{{ route('posts.details', $item->post_id) }}" class="my-5">
                        <p class="font-md"> {{ $item->title }}</p>
                    </a>
                </div>

                <div class="col-sm-6 ">
                    <span class="badge bg-primary-light-pink text-md-center text-black font-md float-start">حالة
                        المشروع:
                        @if ($item->status == 'pending')
                            إنتظار العروض
                        @elseif ($item->status == 'at_work' && $item->payment_status == 'unpaid')
                            في انتظار الدفع
                        @elseif ($item->status == 'at_work')
                            قيد العمل
                        @elseif ($item->status == 'done')
                            تم التسليم
                        @elseif ($item->status == 'nonrecevied')
                            لم يتم قبول التسليم
                        @elseif ($item->status == 'received')
                            تم قبول التسليم
                        @endif
                    </span>
                </div>
            </div>
            <div class="info my-3">
                <div class="rate">
                    <ul class="project__meta list-meta-items d-flex justify-content-start-flex margin-right: -23px;">

                        <li class="text-muted font-sm color-gray-dark">
                            <i class="fa-solid fa-calendar-days ms-1"></i> {{ $item->created_at }}
                        </li>

                        {{-- !need to find the way of build it --}}
                        {{-- <li class="text-muted font-sm color-gray-dark px-3">
                        <time datetime="2022-04-23 12:21:47" title="" itemprop="datePublished" data-toggle="tooltip"
                            data-original-title="2022-04-23 12:21:47">
                            <i class="fa fa-clock-o"></i> منذ
                            دقيقتين
                        </time>
                         </li> --}}

                        <li class="text-muted font-sm color-gray-dark mx-5">
                            <i class="fa-regular fa-clock  ms-1"></i>المدة المحتمله: {{ $item->duration }} يوم
                        </li>

                    </ul>

                </div>

            </div>
            <div class="flex justify-between">
                <div> التكلفه
                    : <span class="text-primary-pink font-bold mx-1"> ${{ $item->amount }}</span>

                </div>
                <div class="flex justify-content-end gap-1 margin-right: -23px;">

                    @if ($item->payment_status == 'unpaid' && $item->status == 'at_work')
                        <a href="{{ route('payment.do', [$item->project_id, $item->seeker_id]) }}"
                            class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center">
                            <p class="font-md"> لم يتم الدفع</p>
                        </a>
                    @endif
                    @if ($item->status == 'done')
                        <a href="{{ route('markAsRecive', [$item->project_id, $item->provider_id]) }}"
                            class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center">
                            <p class="font-md">تم تسليم مشروعك</p>
                        </a>
                    @endif
                    {{-- <div class="card--actions hidden-xs   flex justify-content-end gap-1">
                        <a class=" border-2 hover:bg-primary-green flex justify-center items-center border-primary-green p-1 w-10 rounded-md bg-transparent "
                            href="{{ route('editPosts', $item->post_id) }}">
                            <i class="fa-solid fa-pen   text-black text-center"></i>

                        </a>
                        {{-- <a class="border-2 hover:bg-primary-pink
            flex justify-center items-center border-primary-pink p-1 w-10 rounded-md bg-transparent"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-xmark text-center "></i>



                        </a> --}}

                    {{-- </div> --}}
                </div>
            </div>


        </div>
        {{-- end --}}






        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">حذف المشروع</h5>
                        <a class="fa fa-xmark" data-bs-dismiss="modal" aria-label="Close"></a>
                    </div>
                    <div class="modal-body">
                        هل تريد حذف {{ $item->title }}
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('toggle_post', $item->post_id) }}" class="mo-btn btn-pink-bg pink">تاكيد
                            الحذف</a>
                        <button type="button" class="mo-btn btn-blue-bg" data-bs-dismiss="modal">الغاء</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
