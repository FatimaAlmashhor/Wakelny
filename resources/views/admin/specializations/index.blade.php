@extends('admin.master_layout')
@section('content')
    {{-- titile --}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{ __('dash.all_specialization') }}</h3>
    </div>

    <!-- Table head options start -->
    <section class="section">
        <div class="row" id="table-head">
            <div class="col-12">
                <div class="card">
 
                    <div class="card-content">
                        <!-- table head dark -->
                        <div class="table" style="overflow: none ; padding: 10px 20px;">
                            <table class="table mb-0 mt-3 " style="overflow: none">
                                <thead class="thead-dark pr-4">
                                    <tr>
                                        <th>#</th>
                                        <th>{{ __('dash.specialization_name') }}</th>
                                        <th>{{ __('dash.category_number') }}</th>
                                        <th>{{ __('dash.State') }}</th>
                                        <th>{{ __('dash.ACTION') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($specializations as $item)
                                        <tr>

                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                
                                            <td class="text-bold-500">{{ $item->title }}</td>
                                            <td class="text-bold-500">{{ $item->category_id }}</td>
                                            <td>
                                              @if($item->is_active == 1) 
                                              <span style="color:white; background-color:#84e984;  padding: 5px 21px; border-radius: 5px;">مفعل</span>
                                              @else
                                              <span  style="color:white; background-color:#ff5d5d; padding: 5px 10px; border-radius: 5px;"> معطل</span>
                                              @endif
                                              </td>
                                             
                                                <td>
                                                <a  href="{{ route('edit_specialization', $item->id) }}" class="btn btn-icon btn-outline-dribbble">
                                                     <i class="fas fa-edit bx bx-edit-alt me-1"> </i>
                                                </a>
                                             
                                                <a  href="{{ route('toggle_specialization', $item->id) }}" class="btn btn-icon btn-outline-dribbble">
                                                    
                                                        @if($item->is_active == 1) 
                                                            <i class="fas fa-toggle-on bx bx-edit-alt me-1" style="color:#ff5d5d;" > </i>   
                                                            @else
                                                            <i class="fas fa-toggle-off bx bx-edit-alt me-1" style="color:#84e984;" > </i>   
                                                        @endif
                                             
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
