
@extends('admin.master_layout')
@section('content')
    {{-- titile ----}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>


@livewire('users')


@livewireScripts

@endsection


