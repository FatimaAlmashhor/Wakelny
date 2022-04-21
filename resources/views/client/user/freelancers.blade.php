@extends('client.master_layout')
@section('content')
    <div id="filter_toggle">
        <button class="wak_btn green_border" id='filter_toggle' onclick="openNav()">☰ Filter</button>
    </div>
    <aside class="filter" id='filter'>
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
                                <div style="">
                                    <div class="card-body d-flex align-items-center ">
                                        <label class="wak_checkbox">
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <p class="my-auto px-2"> أعمال وخدمات استشارية </p>
                                    </div>
                                </div>
                                <div style="">
                                    <div class="card-body d-flex align-items-center ">
                                        <label class="wak_checkbox">
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <p class="my-auto px-2"> أعمال وخدمات استشارية </p>
                                    </div>
                                </div>
                                <div style="">
                                    <div class="card-body d-flex align-items-center ">
                                        <label class="wak_checkbox">
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <p class="my-auto px-2"> أعمال وخدمات استشارية </p>
                                    </div>
                                </div>
                                <div style="">
                                    <div class="card-body d-flex align-items-center ">
                                        <label class="wak_checkbox">
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                        </label>
                                        <p class="my-auto px-2"> أعمال وخدمات استشارية </p>
                                    </div>
                                </div>
                            </article>

                            <article class="filter-group">

                                <h6 class="title">{{ __('filter.job_name') }} </h6>
                                <div style="mt-2">
                                    <select class="combobox wak_input" name="normal">
                                        <option value="" selected="selected">Select a State</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>


                                    </select>
                                </div>
                            </article>

                            <article class="filter-group">

                                <h6 class="title">{{ __('filter.skills') }} </h6>
                                <div style="mt-2">
                                    <select class="combobox wak_input" name="normal">
                                        <option value="" selected="selected">أختر مهاره</option>
                                        <option value="AL">Alabama</option>
                                        <option value="AK">Alaska</option>
                                        <option value="AZ">Arizona</option>
                                        <option value="AR">Arkansas</option>
                                        <option value="CA">California</option>
                                    </select>
                                </div>
                            </article>

                            <article class="filter-group">

                                <h6 class="title">{{ __('filter.rating') }} </h6>
                                <div class="stars">
                                    <form action=""> <input class="star star-5" id="star-5" type="radio" name="star" />
                                        <label class="star star-5" for="star-5"></label> <input class="star star-4"
                                            id="star-4" type="radio" name="star" /> <label class="star star-4"
                                            for="star-4"></label> <input class="star star-3" id="star-3" type="radio"
                                            name="star" /> <label class="star star-3" for="star-3"></label> <input
                                            class="star star-2" id="star-2" type="radio" name="star" /> <label
                                            class="star star-2" for="star-2"></label> <input class="star star-1"
                                            id="star-1" type="radio" name="star" /> <label class="star star-1"
                                            for="star-1"></label>
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
    </aside>
@endsection
<script>
    function openNav() {
        document.getElementById("filter").style.width = "350px";
        // document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("filter_toggle").style.display = "none";
    }

    function closeNav() {
        document.getElementById("filter").style.width = "0";
        // document.getElementById("main").style.marginLeft = "0";
        document.getElementById("filter_toggle").style.display = "block";
    }
</script>
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.combobox').combobox()
    });
</script>
