@extends('layouts.tasks')

@section('title', 'Tasks > Form')

@section('content')
    <fieldset>
        <legend>Add task form</legend>
        <form method="POST">
            @csrf

            <div>
                <label for="title">Task Title</label>
                <input type="text" name="title" id="title" maxlength="100" />

                @if (session('inputError'))
                    @inputError
                    {{ session('inputError') }}
                    @endinputError
                @endif
            </div>

            <button type="submit">Add task</button>
        </form>
    </fieldset>

@endsection
