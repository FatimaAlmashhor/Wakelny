@extends('client.master_layout')
@section('content')
    <div>

        @foreach ($myskills as $item)
            <h2>
                {{ $item->name }}
            </h2>
        @endforeach
    </div>
    <form action="{{ route('editSkills') }}" method="POST">
        @csrf
        <div class="container mt-5">
            <select class="selectpicker" name="skills[]" multiple aria-label="size 3 select example"
                data-actions-box="true">
                @foreach ($skills as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>


        <button class="wak_btn" type="submit">Save</button>
    </form>
@endsection
