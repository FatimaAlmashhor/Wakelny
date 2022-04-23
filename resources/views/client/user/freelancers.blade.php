@extends('client.master_layout')
@section('content')
    <h2 class="my-5 px-4">أبحث عن مستقلين</h2>

    <div id="filter_toggle" class="mx-4">
        <button class="wak_btn green_border" id='filter_toggle' onclick="openNav()">☰ Filter</button>
    </div>
    <div class=" d-flex my-5">

        {{-- filter --}}
        <aside class="border-start">
            <div class="filter" id='filter'>
                <div class="filter_container">
                    <a href="javascript:void(0)" id='filter_close' class="closebtn" onclick="closeNav()"><i
                            class="fas fa-times"></i></a>
                    <div class="container-fluid ">
                        <div class="row d-flex justify-content-start">
                            <div class="w-full">
                                <div class="">
                                    <article class="filter-group">

                                        <h6 class="title">{{ __('filter.search_keys') }} </h6>
                                        <div style="">
                                            <div class="card-body">
                                                <input type="text" name='search_by_keys' class="wak_input" />
                                            </div>
                                        </div>
                                    </article>

                                    <article class="filter-group">

                                        <h6 class="title">{{ __('filter.majers') }} </h6>

                                        @foreach ($cates as $item)
                                            <div style="">
                                                <div class="card-body d-flex align-items-center ">
                                                    <label class="wak_checkbox">
                                                        <input value={{ $item->id }} type="checkbox">
                                                        <span class="checkmark"></span>
                                                    </label>
                                                    <p class="my-auto px-2"> {{ $item->title }}</p>
                                                </div>
                                            </div>
                                        @endforeach


                                    </article>

                                    {{-- <article class="filter-group">

                                        <h6 class="title">{{ __('filter.job_name') }} </h6>
                                        <div style="mt-2">
                                            <select class="combobox wak_input" name="normal">
                                                <option value="" selected="selected">Select a State</option>
                                                <option value="AL">Alabama</option>
                                                <option value="AK">Alaska</option>
                                                <option value="AZ">Arizona</option>


                                            </select>
                                        </div>
                                    </article> --}}

                                    <article class="filter-group">

                                        <h6 class="title">{{ __('filter.skills') }} </h6>
                                        <div style="mt-2">
                                            <select class="combobox wak_input" name="normal">
                                                @foreach ($skills as $item)
                                                    <option value=" -1 ">All</option>
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </article>

                                    <article class="filter-group">

                                        <h6 class="title">{{ __('filter.rating') }} </h6>
                                        <div class="stars">
                                            <form action=""> <input class="star star-5" id="star-5" type="radio"
                                                    name="star" />
                                                <label class="star star-5" for="star-5"></label> <input
                                                    class="star star-4" id="star-4" type="radio" name="star" /> <label
                                                    class="star star-4" for="star-4"></label> <input
                                                    class="star star-3" id="star-3" type="radio" name="star" /> <label
                                                    class="star star-3" for="star-3"></label> <input
                                                    class="star star-2" id="star-2" type="radio" name="star" /> <label
                                                    class="star star-2" for="star-2"></label> <input
                                                    class="star star-1" id="star-1" type="radio" name="star" /> <label
                                                    class="star star-1" for="star-1"></label>
                                            </form>
                                        </div>
                                    </article>
                                    <article class="filter-group">

                                        <h6 class="title">{{ __('filter.freelancers') }} </h6>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> هوية موثّقة </p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> المتصلون الآن
                                                </p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> أضافوا عروضا على مشاريعي
                                                </p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> وظفتهم سابقا
                                                </p>
                                            </div>
                                        </div>
                                    </article>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        {{-- freelancers --}}
        <main id='freelancers' class="container px-lg-5">

            {{-- freelancers --}}
            @foreach ($data as $item)
                <div class="card px-3 container my-4" style="direction: rtl;">
                    <div class="box d-flex justify-content-between">
                        <div class="image d-flex">
                            <img class="rounded-circle mr-4 border" style="width:60px ; height:60px ; object-fit: cover"
                                src={{ $item->avatar ?? '/assets/client/images/user-profile-2.png' }} alt="">
                            <div class="info mx-4">
                                <h4>{{ $item->name }}</h4>

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

                                <button class="dropdown-toggle wak_btn" style="border-radius: 0px" data-bs-toggle="dropdown"
                                    aria-expanded="false">
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



        </main>

    </div>
@endsection
<script>
    const toggle = document.getElementById("filter_toggle");

    function openNav() {
        document.getElementById("filter").style.width = "350px";
        toggle.style.display = "none";
    }

    function closeNav() {
        document.getElementById("filter").style.width = "0";
        document.getElementById("freelancers").style.marginLeft = "0";
        toggle.style.display = "block";
    }

    // for solving the filter closing in the phone stats and then back to desckop
    function Media(x) {
        if (x.matches) { // If media query matches
            document.getElementById("filter").style.width = "350px";
        }
    }
    var x = window.matchMedia("(min-width: 980px)")
    Media(x) // Call listener function at run time
    x.addListener(Media) // Attach listener function on state changes
</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.combobox').combobox()
    });
</script>
