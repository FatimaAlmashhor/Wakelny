@extends('client.master_layout')
@section('content')
    <div class="d-flex justify-content-between align-item-center mt-20">
        <h3 class="mt-5 mb-2  font-xl font-bold  px-4">ابحث عن مستقلين</h3>

        <div id="filter_toggle" class="mx-4 mt-5">
            <button class="mo-btn btn-blue-rounderd" id='filter_toggle' onclick="openNav()">☰ Filter</button>
        </div>
    </div>
    <div class=" d-flex my-5">

        {{-- filter --}}
        <aside class="border-start">
            <form class="filter" id='filter' method="GET">
                {{ csrf_field() }}
                <input name="_token" type="hidden" />
                <div class="filter_container">
                    <a href="javascript:void(0)" id='filter_close' class="closebtn" onclick="closeNav()"><i
                            class="fas fa-times"></i></a>
                    <div class="container-fluid ">
                        <div class="row d-flex justify-content-start">
                            <div class="w-full">
                                <div class="">
                                    <article class="filter-group">

                                        <h6 class="title font-md color-gray-dark">{{ __('filter.search_keys') }} </h6>
                                        <div style="">
                                            <div class="card-body">
                                                <input type="text" id='search_by_name' name='search_by_keys'
                                                    class="wak_input" placeholder="Fatima" />
                                            </div>
                                        </div>
                                    </article>

                                    {{-- categories --}}
                                    <article class="filter-group">

                                        <h6 class="title font-md color-gray-dark">{{ __('filter.majers') }} </h6>


                                        {{-- <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input value='-1' name='cates[]' type="checkbox" class="cates"
                                                        id="-1" }>
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> All</p>
                                            </div>
                                        </div> --}}
                                        @foreach ($cates as $item)
                                            <div style="">
                                                <div class="card-body d-flex align-items-center ">
                                                    <label class="wak_checkbox">
                                                        <input value={{ $item->id }} name='cates[]' type="checkbox"
                                                            class="cates" id="{{ $item->id }}">
                                                        <span class=" checkmark"></span>
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

                                    {{-- <article class="filter-group">

                                        <h6 class="title">{{ __('filter.skills') }} </h6>
                                        <div style="mt-2">
                                            <select class="combobox wak_input" name="normal">
                                                @foreach ($skills as $item)
                                                    <option value=" -1 ">All</option>
                                                    <option id='skills' value="{{ $item->id }}">{{ $item->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </article> --}}

                                    <article class="filter-group">

                                        <h6 class="title font-md color-gray-dark">{{ __('filter.rating') }} </h6>
                                        <div class="stars">
                                            <form action=""> <input class="star star-5" id="star-5" type="radio"
                                                    value="1" name="star" />
                                                <label class="star star-5" for="star-5"></label> <input
                                                    class="star star-4" id="star-4" type="radio" name="star" value="2" />
                                                <label class="star star-4" for="star-4"></label> <input
                                                    class="star star-3" id="star-3" type="radio" name="star" value="3" />
                                                <label class="star star-3" for="star-3"></label> <input
                                                    class="star star-2" id="star-2" type="radio" name="star" value='4' />
                                                <label class="star star-2" for="star-2"></label> <input
                                                    class="star star-1" id="star-1" type="radio" name="star" value="5" />
                                                <label class="star star-1" for="star-1"></label>
                                            </form>
                                        </div>
                                    </article>
                                    {{-- <article class="filter-group">

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
                                    </article> --}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </aside>
        <main id='freelancers' class="container px-lg-5">
            {{-- here the freelancers data --}}
            @include('client.components.provider_data')
        </main>
    </div>
@endsection
<script>
    const toggle = document.getElementById("filter_toggle");

    function openNav() {
        document.getElementById("filter").style.width = "330px";
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
            document.getElementById("filter").style.width = "330px";
        }
    }
    var x = window.matchMedia("(min-width: 980px)")
    Media(x) // Call listener function at run time
    x.addListener(Media) // Attach listener function on state changes
</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>


<script type="text/javascript" src="/assets/client/js/filterOfProvider.js"></script>

<script>
    $(document).ready(function() {
        $('.combobox').combobox()
    });
</script>
{{-- <script src="/assets/client/js/helper/jquery-3.6.0.min.js"></script> --}}
