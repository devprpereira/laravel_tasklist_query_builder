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

                @if ($errors->any())
                    @inputError
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                    @endinputError
                @endif
            </div>

            <button type="submit">Update task</button>
        </form>
    </fieldset>

@endsection
