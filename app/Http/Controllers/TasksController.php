<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
    private $inputError = ['inputError' => 'Campo obrigatório'];

    public function list()
    {

        $data = DB::select('SELECT * FROM tasks');

        return view('tasks.list', ['data' => $data]);
    }

    public function add()
    {
        return view('tasks.add');
    }

    public function addAction(Request $request)
    {
        if ($request->filled('title')) {
            $this->title = $request->input('title');
            DB::insert('INSERT INTO tasks (title) VALUES (?)', [$this->title]);

            return redirect()->route('tasks.list')
                ->with('savedSuccefully', 'Task added succefully.');
        } else {

            return redirect()->route('tasks.add')
                ->with($this->inputError);
        }
    }

    public function edit($item)
    {
        $task = $this->verifyTask($item);
        if ($task !== false) {
            return view(
                'tasks.edit',
                [
                    'item' => $task[0]
                ]
            );
        } else {
            return redirect()
                ->route('tasks.list')
                ->with('unableToLoad', 'Não foi possível alterar o item de ID #' . $item);
        };
    }

    public function editAction(Request $request, $item)
    {

        if ($request->filled('title')) {
            DB::update('UPDATE tasks SET title = ? WHERE id = ?', [$request->title, $item]);
            return redirect()
                ->route('tasks.list')
                ->with('savedSuccefully', 'Task #' . $item . ' updated succefully.');
        } else {
            return redirect()->route('tasks.edit', $item)
                ->with($this->inputError);
        }
    }

    public function delete($item)
    {
        return view('tasks.delete', ['id' => $item]);
    }

    public function mark($item)
    {
        return 'Aqui listou';
    }

    public function verifyTask($item)
    {
        $task = DB::select('SELECT * FROM tasks WHERE id = ?', [$item]);
        return count($task) > 0 ? $task : false;
    }
}
