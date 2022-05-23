@extends('client.master_layout')
@section('content')
    <main class="container pt-20">
        <!-- top nav start -->
        <div class="row mx-1  my-3 col-12 d-flex justify-content-lg-between ">
            <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                <h3 class="m-5 font-xl font-bold"> لوحة التحكم</h3>

            </nav>
            <div class="col-6 mt-8">
                <a href="{{ route('userProfile', Auth::user()->id) }}" class="mo-btn btn-blue-bg float-start font-md"><i
                        class="fa fa-user p-1"></i> ملفي الشخصي </a>
            </div>
        </div>
        <!-- top nav end -->

        <!-- side sec -->
        <div class="row">


            <!-- Dashboard Nav Section -->

            @include('client.components.dash_nav')
            <div class=" d-flex flex-column col-lg-8 col-md-8 col-12">

                <main id='works' class="container px-lg-5" style="overflow: hidden;">
                    <div class="py-5">
                        <div class="row ">
                            <!-- 1 Item-->
                            @foreach ($works as $item)
                                <div class="col-lg-6 mb-3 mb-lg-0 my-4">
                                    @if (Auth::user()->hasRole('provider'))
                                        <a href="{{ route('detailsWork', $item->id) }}">
                                    @endif
                                    <div class="hover hover-1 text-white rounded"><img
                                            src="/images/{{ $item->main_image }}" alt="">
                                        <div class="hover-overlay"></div>
                                        <div class="hover-1-content px-5 py-4">
                                            <h3 class="hover-1-title text-uppercase  mb-0"> <span
                                                    class="font-weight-light">{{ $item->title }}</span></h3>
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
