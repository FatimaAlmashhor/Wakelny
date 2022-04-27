@extends('client.master_layout')
@section('content')
    <style>
        .bootstrap-select>.dropdown-toggle.bs-placeholder,
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
            border: 2px solid rgba(240, 157, 96, 0.49);
        }

    </style>
    <main class="container">
        <!-- top nav start -->
        <div class="row mx-1  my-3 col-12 d-flex justify-content-lg-between ">
            <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                <ol class="breadcrumb ms-3">
                    <li class=" fs-6 fw-bold"><a href="{{ route('home') }}">الرئيسية </a></li>/&nbsp&nbsp&nbsp
                    <li class=" active fs-6 fw-bold" aria-current="page"> <a href="{{ route('editUserProfile') }}"> تغيير
                            إعدادات الحساب </a></li>
                </ol>

            </nav>
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
                        <h3 class=" fs-5" style="color:rgba(77, 212, 172, 1);">{{ __('profile.skills') }}</h3>
                    </div>





                    <form action="{{ route('editSkills') }}" method="POST">
                        @csrf
                        <div class="container mx-5 my-4 ">
                            <select class="selectpicker" name="skills[]" multiple aria-label="size 3 select example"
                                data-actions-box="true">
                                @foreach ($skills as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <hr>
                        <div class="row col-md-8  ">
                            <button class="wak_btn " type="submit">Save</button>
                        </div>
                    </form>
                    <div class="d-flex my-4">
                        @foreach ($myskills as $item)
                            <div class="wak_skill px-2">
                                <a href='{{ route('deleteSkill', $item->skill_id) }}'
                                    class="wak_skill__delete badge badge-light"><i class="fa-solid fa-xmark"></i></a>
                                <div class="wak_btn lighter_orange">
                                    {{ $item->name }}
                                </div>
                            </div>
                        @endforeach
                    </div>


            </section>
        </div>

    </main>
@endsection
