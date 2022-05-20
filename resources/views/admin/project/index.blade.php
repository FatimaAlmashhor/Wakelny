@extends('admin.master_layouts')
@section('content')
@livewireStyles
    {{-- titile ---}}
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
    @livewire('projects')


@livewireScripts

@endsection
