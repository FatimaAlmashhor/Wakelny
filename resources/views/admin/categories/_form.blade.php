@extends('admin.master_layout')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{ __('dash.Categories') }}</h3>
    </div>

    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12 mx-auto">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if (Route::currentRouteName() == 'edit_category')
                                <form class="form form-vertical" method="POST"
                                    action={{ route('update_category', $data->id) }} enctype="multipart/form-data">
                                @else
                                    <form class="card-body" method="POST" action={{ route('save_category') }}
                                        enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="form-body">
                                <div class="row g-3">
                                 
                                    <div class="col-md-6">
                                        <label class="form-label" for="multicol-username">{{ __('dash.category_name') }}</label>
                                        <input value="{{ $data->title ?? old('title') }}" name='title' type="text" id="multicol-username" class="form-control" placeholder="" />
                                        @error('title')
                                            <span class="text-danger w-100">{{ $message }}</span>              
                                        @enderror
                                    </div>
                  <div class="col-md-6 ">
                    <label class="form-label" for="multicol-email">{{ __('dash.is_active') }} </label>
                    <select  name="is_active" id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                                                    
                                                    <option value="1">مفعل</option>
                                                    <option value="-1">معطل</option>
                                                </select>

              </div>
                                 
                                    <div class="col-12 d-flex justify-content-end">
                                         <button type="submit" class="mo-btn btn-blue-bg">{{ __('dash.save') }}</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- // Basic Vertical form layout section end -->
@endsection
