@extends('admin.master_layout')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>profiles</h3>
    </div>


    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12 mx-auto">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            @if (Route::currentRouteName() == 'edit_profile')
                                <form class="form form-vertical" method="POST"
                                    action={{ route('update_profile', $data->id) }} enctype="multipart/form-data">
                                @else
                                    <form class="card-body" method="POST" action={{ route('save_profile') }}
                                        enctype="multipart/form-data">
                            @endif

                            @csrf
                            <div class="form-body">
                                <div class="row">
                                @csrf
                <div class="row g-3">
                <div class="col-md-12">
                    <div class="form-group">
                                    <label><strong>نوع الحساب </strong></label><br>
                                    <label><input type="checkbox" name="account_type"  value="صاحب مشاريع"checked> <strong> صاحب مشاريع</strong>  (أبحث عن مستقلين لتنفيذ مشاريعي)</label>
                                    <label><input type="checkbox" name="account_type"  value=" مقدم خبرة" checked >  <strong> مقدم خبرة</strong>  (أبحث عن مشاريع لتنفيذها) </label>
                        </div> 
                        @error('account_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    </div>  
                    <div class="col-md-6 col-12 mb-md-0 mb-3 ps-md-0">
               <label class="form-label" for="multicol-email"> التخصص</label>
                    <select name="majoring"   value="{{ $data->majoring ?? old('majoring') }}" class="form-select item-details mb-2">
                        <option> هندسة</option>
                        <option> برمجة</option>
                        <option> تسويق</option>
                    </select>
                    @error('majoring')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
              </div>
                  <div class="col-md-6">
                    <label class="form-label" for="multicol-username">المسمى الوظيفي </label>
                    <input name="career_field"  value="{{ $data->career_field ?? old('career_field') }}" type="text" id="multicol-username" class="form-control" placeholder="" />
                    @error('career_field')
                        <span class="text-danger">{{ $message }}</span>              
                    @enderror
                  </div>
                  <div class="form-group">
                                <label><strong> النبذة التعريفية</strong></label>
                                <textarea class="form-control" rows="4" cols="40" name="bio" value="{{ $data->bio ?? old('bio') }}"></textarea>
                                @error('bio')
                        <span class="text-danger">{{ $message }}</span>              
                    @enderror
                    </div>
                  <div class="col-md-6">
                    <label class="form-label" for="multicol-username"> الفيديو التعريفي </label>
                    <input name="video"  value="{{ $data->video ?? old('video') }}" type="url" id="multicol-username" class="form-control" placeholder="" />
                    @error('video')
                        <span class="text-danger">{{ $message }}</span>              
                    @enderror
                  </div>
                  
  
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
