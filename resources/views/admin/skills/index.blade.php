
@extends('admin.master_layout')
@section('content')
    {{-- titile --}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{ __('dash.all_Skills') }}</h3>
    </div>

    <!-- Table head options start -->
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
                  
                    <div class="card-content">
                        <!-- table head dark -->
                        <div class="table" style="overflow: none;padding: 10px 20px;">
                            <table class="table mb-0 mt-3" style="overflow: none">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                      
                                        <th>{{ __('dash.Skill_name') }}</th>
                                        <th>{{ __('dash.Skill_level') }}</th>
                                        <th>{{ __('dash.State') }}</th>
                                        <th>{{ __('dash.ACTION') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($skills as $item)
                                        <tr>

                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                    
                                            <td class="text-bold-500">{{ $item->name }}</td>
                                            <td class="text-bold-500">{{ $item->level }}</td>
                                            <td>
                                              @if($item->is_active == 1) 
                                              <span style="color:white; background-color:#84e984;  padding: 5px 21px; border-radius: 5px;">مفعل</span>
                                              @else
                                              <span  style="color:white; background-color:#ff5d5d; padding: 5px 10px; border-radius: 5px;">غير مفعل</span>
                                              @endif
                                              </td>
                                            <td>
                                                {{-- Drop down --}}
                                                <div class="btn-group dropdown mb-1">

                                                    <a class="fas fa-ellipsis-v" data-bs-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                        <span class="sr-only"><i
                                                                class="fa-regular fa-ellipsis-vertical"></i></span>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        
                                                        <a class="dropdown-item"
                                                            href="{{ route('edit_skill', $item->id) }}">{{ __('dash.edit') }}</a>
                                                        <a class="dropdown-item"
                                                            href="{{ route('toggle_skill', $item->id) }}">{{ __('dash.delete') }}</a>
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
