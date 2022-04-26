@extends('client.master_layout')
@section('content')
    <h2 class="my-5 px-4"> المشاريع المفتوحة</h2>


    <div id="filter_toggle" class="mx-4">
        <button class="wak_btn green_border" id='filter_toggle' onclick="openNav()">☰ Filter</button>
    </div>
    <div class=" d-flex my-5">
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

                                        <h6 class="title">{{ __('filter.category') }} </h6>
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
                                                <p class="my-auto px-2">
                                                    برمجة، تطوير المواقع والتطبيقات </p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> هندسة، عمارة وتصميم داخلي </p>
                                            </div>
                                        </div>
                                        <div style="">
                                            <div class="card-body d-flex align-items-center ">
                                                <label class="wak_checkbox">
                                                    <input type="checkbox" checked="checked">
                                                    <span class="checkmark"></span>
                                                </label>
                                                <p class="my-auto px-2"> تصميم، فيديو وصوتيات </p>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="filter-group">

                                        <h6 class="title">{{ __('filter.skill') }} </h6>
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

                                        <h6 class="title">{{ __('filter.time') }} </h6>
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

                                        <h6 class="title">{{ __('filter.balance') }} </h6>
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
        <main id='freelancers' class="container px-lg-5">
            {{-- one card --}}
            <div class="card px-3 container my-4" style="direction: rtl;">
                <div class="box d-flex justify-content-between">
                    <div class="image d-flex">
                        <p style="font-size: 18px;"> تعديل موقع الكتروني برمجة خاص,</p>

                    </div>
                    <div class="card--actions hidden-xs">
                        <div class="dropdown btn-group">

                            <a tabindex="-1" class="wak_btn" href="#">
                                {{-- <i class="fa fa-fw fa-send"></i> --}}
                                <span class="action-text"> أضف عرضك </span>
                            </a>


                        </div>

                    </div>

                </div>
                <div class="info mx-0">


                    <div class="rate">
                        <ul class="project__meta list-meta-items d-flex justify-content-start-flex margin-right: -23px;">


                            <li class="text-muted">
                                <i class="fa fa-fw fa-user"></i> أحمد ا.
                            </li>
                            <li class="text-muted">
                                <time datetime="2022-04-23 12:21:47" title="" itemprop="datePublished" data-toggle="tooltip"
                                    data-original-title="2022-04-23 12:21:47">
                                    <i class="fa fa-clock-o"></i> منذ
                                    دقيقتين
                                </time>
                            </li>

                            <li class="text-muted">
                                <i class="fa fa-fw fa-ticket"></i>
                                أضف أول عرض
                            </li>

                        </ul>
                    </div>

                </div>

                <p class="font-sm mt-0">مرحبا بك أعمل كمصمم حر، ولي خبرة في تصميم الشعارات والتصاميم الإعلانية الخاصة
                    بالمواقع والواجهات وعلى
                    مواقع التواصل الأجتماعي , الواجهة البصرية هي أقوى طريقة للفت انتباه العملاء ، لذا الحصول على تصميم جذاب
                    يضمن لك فرصة قوية بلفت النظر لمنتجك .</p>

            </div>


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
