@extends('layouts.tasks')

@section('title', 'Tasks > List')

@section('content')

    @if (session('savedSuccefully'))
        @savedSuccefully
        {{ session('savedSuccefully') }}
        @endsavedSuccefully
    @endif

    @if (session('unableToLoad'))
        @unableToLoad
        {{ session('unableToLoad') }}
        @endunableToLoad
    @endif

    @if (count($data) >= 1)
        Tasks List: {{ count($data) }} items <br />
        <ul>

            @foreach ($data as $tasks)

                <li> Task ID #{{ $tasks->id }} - @if ($tasks->done === 0) Not Done @else Done @endif
                    <ul>
                        <li> {{ $tasks->title }} </li>
                        <li>
                            <a href=" {{ route('tasks.mark', ['id' => $tasks->id]) }} ">
                                @if ($tasks->done === 0)
                                    Mark as done
                                @else
                                    Unmark as done
                                @endif
                            </a>
                        </li>
                        <li> <a href=" {{ route('tasks.edit', $tasks->id) }}">Edit</a> </li>
                        <li> <a href=" {{ route('tasks.delete', $tasks->id) }}"
                                onclick="return confirm('Are you sure to delete the task #' + {{ $tasks->id }}  + '?')">Delete</a>
                        </li>
                    </ul>
                </li><br />
            @endforeach
        </ul>
    @else
        Nothing to show now. Try <a href="{{ route('tasks.add') }}"> Add a new task </a>
    @endif
@endsection
