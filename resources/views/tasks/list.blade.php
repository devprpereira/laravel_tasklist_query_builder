@extends('layouts.tasks')

@section('title', 'Tasks > List')

@section('content')

    Tasks List: <br />

    @if (count($data) >= 1)
        <ul>

            @foreach ($data as $tasks)

                <li> Task #{{ $tasks->id }}
                    <ul>
                        <li> {{ $tasks->title }} </li>
                        <li>
                            <a href=" {{ route('tasks.mark', ['id' => $tasks->id])}} ">
                                @if ($tasks->done === 0)
                                    Marcar como feito
                                @else
                                    Desmarcar como feito
                                @endif
                            </a>
                        </li>
                        <li> <a href=" {{ route('tasks.edit', $tasks->id) }}">Editar</a> </li>
                        <li> <a href=" {{ route('tasks.delete', $tasks->id) }}">Excluir</a> </li>
                    </ul>
                </li><br />
            @endforeach
        </ul>
    @else
        Não existe nenhuma tarefa para ser exibida atualmente.
    @endif
@endsection
