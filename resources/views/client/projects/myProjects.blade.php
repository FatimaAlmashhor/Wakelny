@extends('client.master_layout')
@section('content')
    <h3 class="m-5"> المشاريع اللتي اعمل عليها حاليه </h3>
    @foreach ($data as $item)
        {{-- one card --}}
        <div class="container card px-3 my-3 ">

            <div class="row ">
                <div class="col-sm-6">
                    <a href="{{ route('posts.details', $item->post_id) }}" class="my-5">
                        <p class="font-md"> {{ $item->title }}</p>
                    </a>
                </div>
                <div class="col-sm-6">
                    <div class="card--actions hidden-xs  flex-wrap float-start">
                        <div class="dropdown btn-group">

                            <a tabindex="-1" class="wak_btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fa fa-xmark px-1"></i>
                                <span class="action-text">انهاء المشروع </span>

                            </a>

                            <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{-- <i class="fa fa-caret-down"></i> --}}
                            </button>
                            {{-- <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu"
                                aria-labelledby="خيارات">
                                <li class="text-end my-2 px-2">
                                    <a tabindex="-1" href="{{ route('markAsDone', $item->project_id) }}">
                                        <i class="fa fa-fw fa-gear"></i>
                                        <span class="action-text"> تسليم المشروع</span>
                                    </a>
                                </li>

                            </ul> --}}
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
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form class="modal-content" method="POST"
                    action="{{ route('markAsDone', [$item->project_id, $item->seeker_id]) }}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">تسليم المشروع</h5>
                        {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
                    </div>
                    <div class="modal-body">
                        هل تريد تسليم {{ $item->title }}
                        <div>
                            <input type="file" name="upload" id="" />
                            <label for="upload">ارفع المشروع</label>
                        </div>
                        <div>
                            <input type="url" name="url" id="" />
                            <label for="url">رابط المشروع</label>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">سلم الان</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">الغاء</button>

                    </div>
                </form>
            </div>
        </div>
    @endforeach
@endsection
