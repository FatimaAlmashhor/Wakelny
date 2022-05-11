@extends('client.master_layout')
@section('content')
    <h3 class="m-5 font-4xl"> المشاريع الخاصة بي</h3>
    @foreach ($posts as $item)
        {{-- one card --}}
        <div class="container card px-3 my-3 ">

            <div class="row ">
                <div class="col-sm-6">
                    <a href="{{ route('posts.details', $item->id) }}" class="my-5">
                        <p class="font-md"> {{ $item->title }}</p>
                    </a>
                </div>
                <div class="col-sm-6">
                    <div class="card--actions hidden-xs  flex-wrap float-start">
                        <div class="dropdown btn-group">
<div class="dropdown inline-block relative min-w-fit">
                            <a tabindex="-1" class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-xmark px-1"></i>
                                <span class="mr-1">اغلاق المشروع </span>
                                 <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path style="color:white ; stroke: white;
                                                                  fill: white;"
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>

                            </a>

                            {{-- <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{-- <i class="fa fa-caret-down"></i> --}}
                            {{-- </button> --}}
                           <ul
                                    class="dropdown-menu w-fit absolute  hidden text-dark-gray bg-light-gray rounded-sm shadow-md pt-2 ">

                                    <li class="border-b border-primary-light-pink">
                                     <a class="rounded-t bg-gray-200 hover:bg-gray-400 hover:bg-primary-light-gray hover:text-dark-gray p-2 block whitespace-no-wrap" href="{{ route('editPosts', $item->id) }}">
                                        <i class="fa fa-fw fa-gear"></i>
                                        <span class="action-text">تعديل المشروع</span>
                                    </a>
                                </li>

                            </ul>
                        </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="info mx-0">
                <div class="rate">
                    <ul class="project__meta list-meta-items d-flex justify-content-start-flex margin-right: -23px;">

                        <li class="text-muted font-sm color-gray-dark">
                            <i class="fa fa-fw fa-user"></i> {{ $item->name }}
                        </li>

                        {{-- !need to find the way of build it --}}
                        {{-- <li class="text-muted font-sm color-gray-dark px-3">
                        <time datetime="2022-04-23 12:21:47" title="" itemprop="datePublished" data-toggle="tooltip"
                            data-original-title="2022-04-23 12:21:47">
                            <i class="fa fa-clock-o"></i> منذ
                            دقيقتين
                        </time>
                         </li> --}}

                        <li class="text-muted font-sm color-gray-dark">
                            <i class="fa fa-fw fa-ticket"></i>
                            @if ($item->offer == 0)
                                أضف أول عرض
                            @else
                                @if ($item->offer == 1)
                                    عرض واحد
                                @endif
                                @if ($item->offer == 2)
                                    عرضان
                                @endif
                                عروض{{ $item->offer }}
                            @endif
                        </li>

                    </ul>
                </div>

            </div>

            <p class="font-sm mt-0">
                {{ $item->description }}
            </p>

        </div>
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
                        <a href="{{ route('toggle_post', $item->id) }}" class="mo-btn btn-pink-bg pink">تاكيد الحذف</a>
                        <button type="button" class="mo-btn btn-blue-bg" data-bs-dismiss="modal">الغاء</button>
                        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}

                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
