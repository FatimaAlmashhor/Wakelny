@extends('client.master_layout')
@section('content')
    <div class="d-flex justify-content-between align-item-center">
        <h3 class="mt-5 mb-2 font-lg px-4"> المشاريع المتاحه </h3>

        <div id="filter_toggle" class="mx-4 mt-5">
            <button class="wak_btn green_border" id='filter_toggle' onclick="openNav()">☰ Filter</button>
        </div>
    </div>
    <div class=" d-flex my-5">
        <aside class="border-start">
            <div class="filter" id='filter'>
                <div class="filter_container">
                    <a href="javascript:void(0)" id='filter_close' class="closebtn" onclick="closeNav()"><i
                            class="fas fa-times"></i></a>
                    <div class="container-fluid ">
                        <div class="row d-flex justify-content-start">
                            <div class="">
                                <div class="">
                                    <article class="filter-group">

                                        <h6 class="title font-sm color-gray-dark">{{ __('filter.search_keys') }} </h6>
                                        <div style="">
                                            <div class="card-body">
                                                <input type="text" name='search_by_keys' class="wak_input" />
                                            </div>
                                        </div>
                                    </article>

                                                 {{-- categories --}}
                                    <article class="filter-group">

                                        <h6 class="title font-sm color-gray-dark">{{ __('filter.majers') }} </h6>
                                        @foreach ($categories as $item)
                                            <div style="">
                                                <div class="card-body d-flex align-items-center ">
                                                    <label class="wak_checkbox">
                                                        <input value="{{ $item->id }}" name='categories[]' type="checkbox"
                                                            class="categories" id="{{ $item->id }}">
                                                        <span class=" checkmark"></span>
                                                    </label>
                                                    <p class="my-auto px-2"> {{ $item->title }}</p>
                                                </div>
                                            </div>
                                        @endforeach


                                    </article>

                                    <article class="filter-group">

                                        <h6 class="title font-sm color-gray-dark">{{ __('filter.skill') }} </h6>
                                        <div style="mt-2">
                                            <select class="combobox wak_input" name="normal">
                                                <option value="" selected="selected">اختر المهارة </option>
                                                <option value="AL">فتشوب</option>
                                                <option value="AK">تصميم الجرافيك</option>
                                                <option value="AZ">illustrator</option>


                                            </select>
                                        </div>
                                    </article>




                                    <article class="filter-group">

                                        <h6 class="title font-sm color-gray-dark">{{ __('filter.time') }} </h6>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> أقل من أسبوع واحد</p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> من 1 إلى 2 أسابيع
                                                </p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> أمن 2 أسابيع إلى شهر
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> أكثر من 3 أشهر
                                                </p>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="filter-group">

                                        <h6 class="title font-sm color-gray-dark">{{ __('filter.balance') }} </h6>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> أقل من أسبوع واحد</p>
                                            </div>
                                        </div>
                                        <form>
                                            <label for="formControlRange">Example Range input</label>

                                            <div class="form-group">
                                                <input type="range" class="form-control-range" id="formControlRange">
                                            </div>
                                        </form>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <main id='posts' class="container px-lg-5">
            @include('client.components.posts_data')
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
