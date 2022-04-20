@extends('admin.master_layout')
@section('content')
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <h3>Category</h3>
    </div>

    <!-- Basic Vertical form layout section start -->
    <section id="basic-vertical-layouts">
        <div class="row match-height">
            <div class="col-md-6 col-12 mx-auto">
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
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="first-name-vertical">First Name</label>
                                            <input type="text" value='{{ $data->title ?? old('title') }}' name='title'
                                                id="first-name-vertical" class="form-control"
                                                placeholder="Software development" />
                                            <span class="text-danger">{{ $errors->first('title') }}</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-8  form-group ml-o text-start">
                                        <div class='form-check'>
                                            <div class="checkbox">
                                                <input type="checkbox" id="checkbox1" name='is_active' value="1"
                                                    class='form-check-input' checked>
                                                <label for="checkbox1">Remember Me</label>
                                            </div>
                                        </div>
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
