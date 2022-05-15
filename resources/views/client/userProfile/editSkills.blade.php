@extends('client.master_layout')
@section('content')
    <style>
        /* .bootstrap-select>.dropdown-toggle.bs-placeholder,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:active,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:focus,
        .bootstrap-select>.dropdown-toggle.bs-placeholder:hover,
        [type=button]:not(:disabled),
        [type=reset]:not(:disabled),
        .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled),
        .bootstrap-select>.dropdown-toggle.bs-placeholder:not(:disabled) {
            color: black;
            width: 300px;
            height: 40px;
            font-size: 15px;
            padding: 5px;
            background-color: white;
        } */

    </style>
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
            <!-- skill section -->
            <section class="col-lg-8 col-md-8 col-12">


                <div class="card p-3">

                    <div class="card-header bg-transparent d-flex justify-content-between align-items-center">
                        <h3 class=" fs-5 font-lg">{{ __('profile.skills') }}</h3>
                    </div>





                    <form action="{{ route('editSkills') }}" method="POST">
                        @csrf
                        <div class="container mx-5 my-4 " style="margin-left: 10px;">
                            <select class="selectpicker" name="skills[]" multiple aria-label="size 3 select example"
                                data-actions-box="true">
                                @foreach ($skills as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <hr>
                        <div>
                            <button class="mo-btn btn-blue-bg float-left font-md mt-3" type="submit">حفظ
                            </button>
                        </div>
                    </form>
                    <div class="d-flex my-4">
                        @foreach ($myskills as $item)
                            <div class="wak_skill px-2">
                                <a href='{{ route('deleteSkill', $item->skill_id) }}'
                                    class="wak_skill__delete badge badge-light"><i class="fa-solid fa-xmark"></i></a>
                                <div class="mo-btn btn-pink-bg text-white text-gray-700  py-2 px-4 rounded inline-flex items-center">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @endforeach
                    </div>


            </section>
        </div>

    </main>
@endsection
