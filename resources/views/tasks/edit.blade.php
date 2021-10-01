@extends('layouts.tasks')

@section('title', 'Edit Tasks')

@section('title', 'Tasks > Form')

@section('content')
    <fieldset>
        <legend>Edit task</legend>
        <form method="POST">
            @csrf

            <div>
                <label for="title">Task Title</label>
                <input type="text" name="title" id="title" maxlength="100" value='{{ $item->title }}' />

                @if (session('inputError'))
                    @inputError
                    {{ session('inputError') }}
                    @endinputError
                @endif
            </div>

            <button type="submit">Update task</button>
        </form>
    </fieldset>

@endsection
