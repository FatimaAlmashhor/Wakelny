@extends('client.master_layout')
@section('content')
<!-- <div class="row mx-1  mt-2 col-12 d-flex justify-content-lg-between ">
                <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                    <ol class="breadcrumb ms-3">
                        <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>
                        <li class=" active fs-6 fw-bold" aria-current="page"> <a href="{{ route('account') }}">
                                </a></li>
                    </ol>
                </nav>
</div> -->
<div class=" d-flex flex-column pt-20" >
<h3 class="my-16 mb-2 font-xl font-bold px-4">الأعمال الخاصة بي</h3>
    <div class=" d-flex flex-row justify-content-between ">
        <div id="filter_toggle" class="mx-4">
            <button class="mo-btn btn-blue-rounderd" id='filter_toggle' onclick="openNav()">☰ تصنيف</button>
        </div>
        <div id="" class="mx-4 mt-2" style="position: absolute;
    left: .1rem;">
            <a href="{{ route('userWork') }}" class="mo-btn btn-blue-bg font-md ml-4 "  > <i class="fas fa-plus"></i> &nbsp; أضافة  </a>
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
                                        <h6 class="title font-md">{{ __('filter.search_keys') }} </h6>
                                        <div>
                                            <div class="card-body"  >
                                                <input type="text" id='search_by_name' name='search_by_keys'
                                                    class="wak_input" style="border-radius: 5px;" />
                                            </div>
                                        </div>
                                    </article>
                                    {{-- <article class="filter-group ">
                                            <h6 class="title my-4 font-md">{{ __('filter.skills') }} </h6>
                                            <div class="my-2  "style="margin:4px 14px;" >
                                                <select class="selectpicker "  value="بالاختيار" name="skills[]" multiple aria-label="size 3 select example"
                                                    data-actions-box="true">
                                                    <!-- <option value="" selected="selected"> جميع المهارات</option> -->
                                                    @foreach ($skills as $item)
                                                        <option id='skills' value="{{ $item->id }}" >{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                    </article> --}}
                                    {{-- <article class="filter-group">
                                        <h6 class="title my-4 font-md">الأعمال المضافة خلال آخر </h6>
                                        <div class="mt-2  "style="margin:0px 14px;" >
                                            <select class="selectpicker "  value="" name="year"  data-actions-box="true" style="transform: translate3d(-4px, 212px, 0px);">
                                                <!-- <option value="" selected="selected"> جميع الاعمال</option> -->
                                                <option value=""  > اسبوع</option>
                                                <option value="" > شهر </option>
                                                <option value="" > 3 أشهر </option>
                                                <option value="" >  6 أشهر</option>
                                                <option value="" > سنة </option>
                                            </select>
                                        </div>
                                    </article> --}}
<br><br><br><br><br><br><br><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </aside>
<main id='works' class="container px-lg-5" style="overflow: hidden;">
<div class="py-5">
    <div class="row ">
      <!-- 1 Item-->
      @foreach ($works as $item)
        <div class="col-lg-6 mb-3 mb-lg-0 my-4">
            @if (Auth::user()->hasRole('provider'))
            <a href="{{ route('detailsWork', $item->id) }}" >
            @endif
                <div class="hover hover-1 text-white rounded"><img src="/images/{{ $item->main_image}}" alt="">
                    <div class="hover-overlay"></div>
                    <div class="hover-1-content px-5 py-4">
                        <h3 class="hover-1-title text-uppercase  mb-0"> <span class="font-weight-light">{{ $item->title}}</span></h3>
                        <p class="hover-1-description font-weight-light mb-0">{{ $item->name }}</p>
                        <div class="col-3 pl-2 pr-0 pt-1 text-left " style="font-size: 10px">
                        24 <span class="fas fa-eye"></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
</main>
    </div>
</div>
@endsection
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>
    const toggle = document.getElementById("filter_toggle");
    function openNav() {
        document.getElementById("filter").style.width = "350px";
        toggle.style.display = "none";
    }
    function closeNav() {
        document.getElementById("filter").style.width = "0";
        document.getElementById("works").style.marginLeft = "0";
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
<script type="text/javascript" src="/assets/client/js/filterOfProvider.js"></script>
<script>
    $(document).ready(function() {
        $('.combobox').combobox()
    });
</script>
{{-- <script src="/assets/client/js/helper/jquery-3.6.0.min.js"></script> --}}







