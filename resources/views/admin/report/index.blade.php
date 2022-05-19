@extends('admin.master_layout')
@section('content')
    {{-- titile --}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{ __('dash.all_report') }}</h3>
    </div>
    <div class="my-4 d-flex justify-content-evenly flex-wrap"> 
        <button  id="users"  class="btn  btn-blue-rounderd rounded-pill my-2">
             المستخدم
        </button>
        <button     id="posts"  class="btn  btn-blue-rounderd rounded-pill my-2">
             المحتوى 
        </button>
        <button  id="projects"   class="btn  btn-blue-rounderd rounded-pill my-2">
             المشاريع
        </button>
    </div>
    <!-- Table head options start -->
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
                                        <th id="pro_m">{{ __('dash.type_report') }}</th>
                                        <th>{{ __('dash.user_id') }}</th>
                                        <th id="post_m">{{ __('dash.provider_ids') }}</th>
                                        <th id="user_m">{{ __('dash.post_id') }}</th>
                                        <th id="date_m">التاريخ</th>
                                        <th id="mes_m">{{ __('dash.massege') }}</th>
                                        <th>{{ __('dash.State') }}</th>
                                        <th>{{ __('dash.ACTION') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $item)
                                        <tr id="user">


                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->type_report }}</td>
                                            <td class="text-bold-500">{{ $item->reporter }}</td>
                                            <td class="text-bold-500">{{ $item->reported }}</td>
                                            <td class="" style=" width: 10px; ">{{ $item->massege }}</td>
                                            <td>
                                                @if ($item->is_active == 0)
                                                    <span
                                                    class="bg-primary-blue "  style="color:white;   padding: 5px 21px; border-radius: 5px;">مفعل</span>
                                                @else
                                                    <span
                                                    class="bg-primary-pink " style="color:white; padding: 5px 21px; border-radius: 5px;">
                                                        معطل</span>
                                                @endif
                                            </td>

                                            <td>

                                                <a href="{{ route('toggle_report', $item->id) }}"
                                                    class="btn btn-icon btn-outline-dribbble">

                                                    @if ($item->is_active == 1)
                                                        <i class="fas fa-toggle-on bx bx-edit-alt me-1 blue"
                                                            > </i>
                                                    @else
                                                        <i class="fas fa-toggle-off bx bx-edit-alt me-1"
                                                            style="color:#CD657C;"> </i>
                                                    @endif

                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach
                                    @foreach ($reports_post as $item)
                                        <tr id="post">


                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->type_report }}</td>
                                            <td class="text-bold-500">{{ $item->reporter }}</td>
                                            <td class="text-bold-500">{{ $item->title }}</td>
                                            <td class="" style=" width: 1px;">{{ $item->massege }}</td>
                                            <td>
                                                @if ($item->is_active == 0)
                                                    <span
                                                    class="bg-primary-blue "  style="color:white;padding: 5px 21px; border-radius: 5px;">مفعل</span>
                                                @else
                                                    <span
                                                    class="bg-primary-pink" style="color:white;padding: 5px 21px; border-radius: 5px;">
                                                        معطل</span>
                                                @endif
                                            </td>

                                            <td>

                                                <a href="{{ route('toggle_report', $item->id) }}"
                                                    class="btn btn-icon btn-outline-dribbble">

                                                    @if ($item->is_active == 1)
                                                        <i class="fas fa-toggle-on bx bx-edit-alt me-1 blue"
                                                            > </i>
                                                    @else
                                                        <i class="fas fa-toggle-off bx bx-edit-alt me-1"
                                                            style="color:#CD657C;"> </i>
                                                    @endif

                                                </a>

                                            </td>

                                        </tr>
                                    @endforeach
                                    @foreach ($reports_project as $item)
                                        <tr class="hover:bg-primary-light-pink" id="project">
                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->reporter }}</td>
                                            <td class="text-bold-500">{{ $item->title }}</td>
                                            <td class="">{{ $item->created_at }}</td>
                                            <td>
                                                @if ($item->is_active == 0)
                                                    <span
                                                    class="bg-primary-blue "   style="color:white;  padding: 5px 21px; border-radius: 5px;">مفعل</span>
                                                @else
                                                    <span
                                                    class="bg-primary-pink " style="color:white; padding: 5px 21px; border-radius: 5px;">
                                                        معطل</span>
                                                @endif
                                            </td>

                                            <td>

                                                <a href="{{ route('toggle_report', $item->report_id) }}"
                                                    class="btn btn-icon btn-outline-dribbble">

                                                    @if ($item->is_active == 1)
                                                        <i class="fas fa-toggle-on bx bx-edit-alt me-1 blue"
                                                          > </i>
                                                    @else
                                                        <i class="fas fa-toggle-off bx bx-edit-alt me-1"
                                                            style="color:#CD657C;"> </i>
                                                    @endif

                                                </a>
                                                <a class=' primary-blue'
                                                    href='{{ route('report.details', $item->project_id) }}'>
                                                    <i class="fas fa-eye"></i>
                                                </a>

                                            </td>

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
