@extends('admin.master_layout')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>{{ __('dash.Skills') }}</h3>
    </div>

    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-12 col-12 mx-auto">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if (Route::currentRouteName() == 'edit_skill')
                                <form class="form form-vertical" method="POST"
                                    action={{ route('update_skill', $data->id) }} enctype="multipart/form-data">
                                @else
                                    <form class="card-body" method="POST" action={{ route('save_skill') }}
                                        enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="form-body">
                                <div class="row">
                                @csrf
                <div class="row g-3">
                  <div class="col-md-6">
                    <label class="form-label" for="multicol-username">{{ __('dash.Skill_name') }}</label>
                    <input name="name"  value="{{ $data->name ?? old('name') }}" type="text" id="multicol-username" class="form-control" placeholder="" />
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>              
                    @enderror
                  </div>
                  <div class="col-md-6 ">
                    <label class="form-label" for="multicol-email">{{ __('dash.Skill_level') }} </label>
                    <select name="level"   value="{{ $data->level ?? old('level') }}" class="form-select item-details mb-2">
             
                
                        <option> متقدم</option>
                        <option> متوسط</option>
                        <option> ضعيف</option>
                    </select>
                    @error('level')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
              </div>
            <div class="col-md-6">
              <div class="row">
                <label class="col-sm-3 col-form-label text-sm-end" for="formtabs-country">{{ __('dash.is_active') }} </label>
                <div class="col-sm-9">
                  <select  name="is_active" id="formtabs-country" class="select2 form-select" data-allow-clear="true">
                    
                    <option value="1">مفعل</option>
                    <option value="-1">معطل</option>
                  </select>
                </div>
              </div>
            </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">{{ __('dash.save') }}</button>
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
