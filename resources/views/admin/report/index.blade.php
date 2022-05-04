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
                                        <th>{{ __('dash.type_report') }}</th>
                                        <th>{{ __('dash.user_id') }}</th>
                                        <th>{{ __('dash.provider_id') }}</th>
                                        <th>{{ __('dash.post_id') }}</th>
                                        <th >{{ __('dash.massege') }}</th>
                                        <th>{{ __('dash.State') }}</th>
                                        <th>{{ __('dash.ACTION') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reports as $item)
                                        <tr>

                                            <td class="text-bold-500">{{ $loop->iteration }}</td>
                                            <td class="text-bold-500">{{ $item->type_report }}</td> 
                                            <td class="text-bold-500">{{ $item->user_id }}</td> 
                                            <td class="text-bold-500">{{ $item->provider_id }}</td> 
                                            <td class="text-bold-500">{{ $item->post_id }}</td>                                
                                            <td class="" style=" width: 1px;">{{ $item->massege }}</td>
                                            <td>
                                              @if($item->is_active == 1) 
                                              <span style="color:white; background-color:#84e984;  padding: 5px 21px; border-radius: 5px;">مفعل</span>
                                              @else
                                              <span  style="color:white; background-color:#ff5d5d; padding: 5px 10px; border-radius: 5px;"> معطل</span>
                                              @endif
                                            </td>
                                             
                                            <td>
                                             
                                                <a  href="{{ route('toggle_report', $item->id) }}" class="btn btn-icon btn-outline-dribbble">
                                                    
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
