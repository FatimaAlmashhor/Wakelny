        {{-- freelancers --}}


            {{-- freelancers --}}
            @foreach ($data as $item)
                <div class="card px-3 container my-4" style="direction: rtl;">
                    <div class="box d-flex justify-content-between">
                        <div class="image d-flex">
                            <a href="{{ route('userProfile') }}">
                                <img class="rounded-circle mr-4 border"
                                    style="width:60px ; height:60px ; object-fit: cover"
                                    src={{ $item->avatar ?? '/assets/client/images/user-profile-2.png' }} alt="">
                            </a>
                            <div class="info mx-4">
                                <h4><a href="{{ route('userProfile') }}">{{ $item->name }}</a></h4>

                                <div class="rate">
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ((int) $item->rating > $i)
                                            <i class="fa fa-star clr-amber rating-star" style="color: orange;"></i>
                                        @else
                                            <i class="fa fa-star clr-amber rating-star" style="color: gainsboro;"></i>
                                        @endif
                                    @endfor

                                    <span class="px-2 font-md">%{{ $item->rating * 20 }}</span>
                                    <i class="fa fa-fw fa-briefcase"></i>

                                    <span class="color-gray-dark px-2 font-md">{{ $item->specialization }}</span>
                                </div>

                            </div>

                        </div>
                        <div class="card--actions hidden-xs">
                            <div class="dropdown btn-group">

                                <a tabindex="-1" class="wak_btn" href="#">
                                    <i class="fa fa-fw fa-send"></i>
                                    <span class="action-text">وظفني </span>
                                </a>

                                <button class="dropdown-toggle wak_btn" style="border-radius: 0px"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    {{-- <i class="fa fa-caret-down"></i> --}}
                                </button>
                                <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu"
                                    aria-labelledby="خيارات">
                                    <li class="my-2 border-bottom text-end ">
                                        <a tabindex="-1"
                                            href="https://mostaql.com/register?t=SO0TO7smnWJanTpKDpZ2jcSQnLT4WEeSPn3gAUNK">
                                            <i class="fa fa-fw fa-bookmark"></i>
                                            <span class="action-text">أضف إلى المفضلة</span>
                                        </a>
                                    </li>
                                    <li class="text-end my-2 px-2">
                                        <a tabindex="-1"
                                            href="https://mostaql.com/register?t=SO0TO7smnWJanTpKDpZ2jcSQnLT4WEeSPn3gAUNK">
                                            <i class="fa fa-fw fa-flag"></i>
                                            <span class="action-text">تبليغ عن محتوى</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                    </div>
                    <p class="font-sm mt-3">{{ $item->bio }}</p>

                </div>
            @endforeach
            {{-- one card --}}

