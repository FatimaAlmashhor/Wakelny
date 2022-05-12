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
        }

    </style>
    <main class="container">
        <!-- top nav start -->
        <div class="row mx-1  my-3 col-12 d-flex justify-content-lg-between ">
            <nav aria-label="breadcrumb" class="main-breadcrumb col-6 p-3">
                <h3 class="m-5 font-4xl"> لوحة التحكم</h3>

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
            <!-- wallet section -->
            <section class="col-lg-8 col-md-8 col-12" >

                <table class="table border">
                    <thead >
                        <tr>
                            <th class="font-md">الرقم</th>
                            <th class="font-md">المسلم </th>
                            <th class="font-md">المستلم</th>
                            <th class="font-md">المبلغ </th>
                            <th class="font-md">التاريخ</th>
                        </tr>
                    </thead>
                    <tbody class="table-light">
                        <tr>
                            <td class="font-md">1</td>
                            <td class="font-md">رقيه </td>
                            <td class="font-md">رقيه</td>
                            <td class="font-md">5000 </td>
                            <td class="font-md">5/10/2022</td>
                        </tr>
                        <tr>
                            <td class="font-md">1</td>
                            <td class="font-md">رقيه </td>
                            <td class="font-md">رقيه</td>
                            <td class="font-md">5000 </td>
                            <td class="font-md">5/10/2022</td>
                        </tr>
                    </tbody>
                </table>
            </section>
        </div>

    </main>
@endsection
