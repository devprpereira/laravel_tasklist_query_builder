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

    public function edit($id)
    {
        $task = $this->verifyTask($id);
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
                ->with('unableToLoad', 'Não foi possível alterar o item de ID #' . $id);
        };
    }

    public function editAction(Request $request, $id)
    {

        if ($request->filled('title')) {
            DB::update('UPDATE tasks SET title = ? WHERE id = ?', [$request->title, $id]);
            return redirect()
                ->route('tasks.list')
                ->with('savedSuccefully', 'Task #' . $id . ' updated succefully.');
        } else {
            return redirect()->route('tasks.edit', $id)
                ->with($this->inputError);
        }
    }

    public function delete($id)
    {
        $task = $this->verifyTask($id);
        if ($task !== false) {
            DB::delete('DELETE FROM tasks WHERE id = ?', [$id]);
            return redirect()
                ->route('tasks.list')
                ->with('savedSuccefully', 'Task #' . $id . ' removed succefully.');
        } else {
            return redirect()
                ->route('tasks.list')
                ->with('unableToLoad', 'Não foi possível remover o item de ID #' . $id);
        };
    }

    public function mark($id)
    {
        $task = $this->verifyTask($id);
        if ($task !== false) {
            DB::update('UPDATE tasks SET done = 1 - done WHERE id = ?', [$id]);

            return redirect()
                ->route('tasks.list')
                ->with('savedSuccefully', 'Task #' . $id . ' has "done" updated succefully.');
        } else {
            return redirect()
                ->route('tasks.list')
                ->with('unableToLoad', 'Não foi possível alterar o item de ID #' . $id);
        };
    }

    public function verifyTask($id)
    {
        $task = DB::select('SELECT * FROM tasks WHERE id = ?', [$id]);
        return count($task) > 0 ? $task : false;
    }
}
