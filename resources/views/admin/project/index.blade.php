@extends('admin.master_layout')
@section('content')
    {{-- titile ---}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>


    <div class="page-heading">
        <h3>{{ __('dash.all_project') }}</h3>
    </div>

    <!-- Table head options starts- -->
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
                                        <th>#</th>
                                        <th>{{ __('dash.start_project') }}</th>
                                        <th>{{ __('dash.end_project') }}</th>
                                        <th>{{ __('dash.title') }}</th>
                                        <th>{{ __('dash.seeker_id') }}</th>
                                        <th>{{ __('dash.provider_id') }}</th>
                                        <th>{{ __('dash.duration') }}</th>
                                        <th>{{ __('dash.status') }}</th>
                                        <th >{{ __('dash.amount') }}</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($project as $item)
                                        <tr>

                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->stated_at }}</td>

                                            <td class="text-bold-500">{{ $item->finshed }}</td>
                                            <td class="text-bold-500">{{ $item->title }}</td>

                                            <td class="text-bold-500">{{ $item->reporter }}</td>
                                            <td class="text-bold-500">{{ $item->reported }}</td>

                                            <td class="text-bold-500">{{ $item->duration }}أيام</td>
                                            <td class="text-bold-500">{{ $item->status }}</td>
                                            <td class="" style=" width: 1px;">${{ $item->amount }}</td>

                                        </tr>

                                    @endforeach

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
