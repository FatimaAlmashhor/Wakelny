@foreach ($posts as $item)
    {{-- one card --}}
    <div class="card px-3 container my-4" style="direction: rtl;">
        <div class="box d-flex justify-content-between">
            <a href="{{ route('posts.details', $item->id) }}" class="image d-flex">
                <p style="font-size: 18px;"> {{ $item->title }}</p>
            </a>
            <div class="card--actions hidden-xs">
                @if (Auth::check() && Auth::user()->hasRole('provider'))
                    <div class="dropdown btn-group">

                        <a tabindex="-1" class="wak_btn" href="{{ route('posts.details', $item->id) }}">
                            {{-- <i class="fa fa-fw fa-send"></i> --}}
                            <span class="action-text"> أضف عرضك </span>
                        </a>
                    </div>
                @endif
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
@endforeach
