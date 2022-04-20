@extends('admin.master_layout')
@section('content')
    {{-- titile --}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Categories</h3>
    </div>

    <!-- Table head options start -->
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex">
                        <h4 class="card-title mr-auto" style="margin-right: auto">All Categories</h4>
                        <a href="{{ route('add_category') }}" class="   btn btn-primary">Add new category</a>

                    </div>
                    <div class="card-content">
                        <!-- table head dark -->
                        <div class="table" style="overflow: none">
                            <table class="table mb-0 mt-3" style="overflow: none">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                        <tr>

                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td>{{ $item->id }}</td>
                                            <td class="text-bold-500">{{ $item->title }}</td>
                                            <td>
                                                {{-- Drop down --}}
                                                <div class="btn-group dropdown mb-1">

                                                    <button type="button" class="" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only"><i
                                                                class="fa-regular fa-ellipsis-vertical">click</i></span>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit_category', $item->id) }}">Edit</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('toggle_category', $item->id) }}">Delete</a>
                                                    </div>
                                                </div>

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
