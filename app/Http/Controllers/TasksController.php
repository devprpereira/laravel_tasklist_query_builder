<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TasksController extends Controller
{
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
        if($request->filled('title')) {
            $this->title = $request->input('title');
            DB::insert('INSERT INTO tasks (title) VALUES (?)', [$this->title]);

            return redirect()->route('tasks.list');
        }
    }

    public function edit($item)
    {
        return view('tasks.edit', ['id' => $item]);
    }

    public function editAction($item)
    {
        return 'Aqui listou';
    }

    public function delete($item)
    {
        return view('tasks.delete', ['id' => $item]);
    }

    public function mark($item)
    {
        return 'Aqui listou';
    }
}
