@extends('client.master_layout')
@section('content')
    <div>
        <div class="d-flex my-4">
            @foreach ($myskills as $item)
                <div class="wak_skill px-2">
                    <a href='{{ route('deleteSkill', $item->skill_id) }}' class="wak_skill__delete badge badge-light"><i
                            class="fa-solid fa-xmark"></i></a>
                    <div class="wak_btn lighter_orange">
                        {{ $item->name }}
                    </div>
                </div>
            @endforeach
        </div>

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
