
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

    <!-- Table head options start-->
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">

                    <div class="card-content">
                        <!-- table head dark --->
                        <div class="card-body" style="overflow: none;padding: 10px 20px;">
                            <table class="table mb-0 mt-3 " id="table1" style="overflow: none">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>

                                        <th>{{ __('dash.usre_name') }}</th>
                                        <th>{{ __('dash.user_email') }}</th>
                                        <th>{{ __('dash.user_isBan_unBan') }}</th>
                                        <th>{{ __('dash.user_is_active') }}</th>

                                    </tr>

                                </thead>

                                <tbody>
                                    @foreach ($users as $item)
                                        <tr>

                                            <td class="text-bold-500">{{ $loop->iteration }}</td>

                                            <td class="text-bold-500">{{ $item->name }}</td>
                                            <td class="text-bold-500">{{ $item->email }}</td>
                                            <td >
                                            @if( $item->isban=='0')
                                            <label class="py-2 px- badge btn-primary">مفعل </label>
                                            @elseif($item->isban=='1')
                                            <label class="py-2 px- badge btn-danger">حظر </label>
                                            @endif


                                            </td>
                                            <td>
                                                {{-- <a  href="{{ route('edit_user', $item->id) }}" class="btn btn-icon btn-outline-dribbble">
                                                     <i class="fas fa-edit bx bx-edit-alt me-1"> </i>
                                                </a> --}}

                                                <a   href="{{ route('ban_user', $item->id) }}" class="btn btn-icon btn-outline-dribbble">

                                                        @if($item->isban == 1)
                                                        <i class="fas fa-toggle-off bx bx-edit-alt me-1" style="color:#84e984;" > </i>
                                                        @else
                                                        <i class="fas fa-toggle-on bx bx-edit-alt me-1" style="color:#ff5d5d;" > </i>
                                                        @endif

                                                </a>
                                            </td>

                                            {{-- <td>
                                                <a  href="{{ route('edit_skill') }}" class="btn btn-icon btn-outline-dribbble">
                                                     <i class="fas fa-edit bx bx-edit-alt me-1"> </i>
                                                </a>

                                                <a   href="{{ route('toggle_skill', $item->id) }}" class="btn btn-icon btn-outline-dribbble">

                                                        @if($item->is_active == 1)
                                                        <i class="fas fa-toggle-on bx bx-edit-alt me-1" style="color:#ff5d5d;" > </i>
                                                            @else
                                                            <i class="fas fa-toggle-off bx bx-edit-alt me-1" style="color:#84e984;" > </i>
                                                        @endif

                                                </a>
                                            </td> --}}

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
