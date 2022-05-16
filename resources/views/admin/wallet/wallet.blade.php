@extends('admin.master_layout')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{  __('dash.user_Statistics')}} </h3>
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
                                         <h3 class="mb-0" style="color: #373483 ;">$0.00</h5>
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
                                         <h3 class="mb-0" style="color: #CD657C ;">$0.00</h5>
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
                        <div class="table" style="overflow: none ; padding: 10px 20px;">
                                            <table class="table mb-0 mt-3 " style="overflow: none">
                                                <thead class="thead-dark pr-4">
                                            <tr>
                                                <td class="font-lg">الرقم</td>
                                                <td class="font-lg">المسلم </td>
                                                <td class="font-lg">المستلم</td>
                                                <td class="font-lg">المبلغ </td>
                                                <td class="font-lg">التاريخ</td>
                                            </tr>
                                        </thead>
                                        <tbody >
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
                        </div>
                        </div>
            </div>
        </div>
    </section>

    </div>




@endsection
