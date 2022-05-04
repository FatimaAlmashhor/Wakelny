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

                            <a tabindex="-1" class="wak_btn" href="#">
                                <i class="fa fa-fw fa-send"></i>
                                <span class="action-text">كلفني </span>
                            </a>
    
                       
                            
                            <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{-- <i class="fa fa-caret-down"></i> --}}
                            </button>
                            <ul class="dropdown-menu dropdown-left dropdown-menu-left p-1 " role="menu"
                                aria-labelledby="خيارات">
                                <li class="my-2 border-bottom text-end ">
                                    <a tabindex="-1"
                                        href="">
                                        <i class="fa fa-fw fa-bookmark"></i>
                                        <span class="action-text">أضف إلى المفضلة</span>
                                    </a>
                                </li>
                                @foreach ($posts as $it) 
                                    <li class="text-end my-2 px-2">
                                    <a tabindex="-1"
                                        href="{{ route('report_content', $it->id)}}">
                                        <i class="fa fa-fw fa-flag"></i>
                                        <span class="action-text">تبليغ عن محتوى</span>
                                    </a>
                                </li>
                                @endforeach
                               
                                    <li class="text-end my-2 px-2">
                                    <a tabindex="-1"
                                        href="{{ route('report_provider',  $item->user_id)}}">
                                        <i class="fa fa-fw fa-flag"></i> 
                                        <span class="action-text">تبليغ عن مستخدم</span>
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
