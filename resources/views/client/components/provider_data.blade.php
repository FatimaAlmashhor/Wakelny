        {{-- freelancers --}}

        {{-- freelancers --}}
        @foreach ($data as $item)
            <div class="card p-4 container my-3" style="direction: rtl;">
                <div class="box d-flex justify-content-between">
                    <div class="image d-flex">
                        <a href="{{ route('userProfile', $item->user_id) }}">

                            {{-- @if ($item->avatar !== 'http://localhost:8000/images/')
                                <img class="rounded-circle mr-4 border"
                                    style="width:60px ; height:60px ; object-fit: cover" src="{{ $item->avatar }}"
                                    alt="">
                            @else --}}
                            <img class="rounded-circle mr-4 border" style="width:60px ; height:60px ; object-fit: cover"
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
                                        <i class="fa fa-star clr-amber rating-star" style="color: gainsboro;"></i>
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
                            <div class="dropdown inline-block relative min-w-fit">
                                <a tabindex="-1"
                                    class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center"
                                    href="#">
                                    <i class="fa fa-fw fa-send"></i>
                                    <span class="mr-1">انا متاح </span>
                                    <svg class="fill-current h-4 w-8" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path style="color:white ; stroke: white;
                                                                  fill: white;"
                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                    </svg>
                                </a>
                                <ul
                                    class="dropdown-menu w-fit absolute  hidden text-dark-gray bg-light-gray rounded-sm shadow-md pt-2 ">

                                    <li class="border-b border-primary-light-pink">
                                        <a class="rounded-t bg-gray-200 hover:bg-gray-400 hover:bg-primary-light-gray hover:text-dark-gray p-2 block whitespace-no-wrap"
                                            href="{{ route('report_provider', $item->user_id) }}">
                                            {{-- <i class="fa fa-fw fa-flag"></i> --}}
                                            التبليغ عن مستخدم</a>

                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
                <p class="font-sm mt-3">{{ $item->bio }}</p>

            </div>
        @endforeach

        {{-- one card --}}
