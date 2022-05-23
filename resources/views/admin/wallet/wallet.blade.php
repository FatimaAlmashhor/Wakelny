@extends('admin.master_layout')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{ __('dash.user_Statistics') }} </h3>
    </div>

    <div class="page-content">
        <section class="row mx-4">
            <div class="col-12 col-lg-10 mx-auto">
                <div class="row m-auto ">
                    <div class="col-12 col-xl-4 mx-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>الرصيد الكلي</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12">
                                        <h3 class="mb-0 text-primary-pink font-bold font-lg">${{ $balance }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-4 mx-4">
                        <div class="card">
                            <div class="card-header">
                                <h3>الارباح</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-12">
                                        <h3 class="mb-0 text-primary-pink font-bold font-lg">${{ $fee }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </section>


        <section class="section">
            <div class="row" id="table-head">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            <!-- table head dark -->
                            <div class="table-responsive py-2">
                                <table class="table mb-0 ">
                                    <thead class="thead-dark ">
                                        <tr>
                                            <td class="font-lg">الرقم</td>
                                            <td class="font-lg">المستلم</td>
                                            <td class="font-lg">المبلغ </td>
                                            <td class="font-lg">المشروع </td>
                                            <td class="font-lg">التاريخ</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transaction as $item)
                                            <tr>

                                                <td class="font-md">{{ $loop->iteration }}</td>
                                                <td class="font-md">{{ $item->name }}</td>
                                                <td class="font-md">{{ $item->amount }}</td>
                                                <td class="font-md">{{ $item->title }}</td>
                                                <td class="font-md">{{ $item->created_at }}</td>

                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>

    </div>
@endsection
