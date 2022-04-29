
@extends('admin.master_layout')
@section('content')
    {{-- titile --}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{ __('dash.all_users') }}</h3>
    </div>

    <!-- Table head options start -->
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <!-- table head dark -->
                        <div class="card-body" style="overflow: none;padding: 10px 20px;">
                            <table class="table mb-0 mt-3 " id="table1" style="overflow: none">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>

                                        <th>{{ __('dash.usre_name') }}</th>
                                        <th>{{ __('dash.user_email') }}</th>
                                        <th>{{ __('dash.user_is_active') }}</th>

                                    </tr>

                                </thead>



                                <tbody>

                                        <tr>

                                            <td class="text-bold-500"></td>

                                            <td class="text-bold-500"></td>
                                            <td class="text-bold-500"></td>
                                            <td>

                                              </td>
                                            <td>
                                            <td>



                                            </td>

                                        </tr>



                                </tbody> 
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Table head options end -->
@endsection
