<?php

use App\Http\Controllers\TasksController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('tasks.list');
});

Route::prefix('tasks')->group(function () {

    Route::get('/', [TasksController::class, 'list'])->name('tasks.list'); //Screen of listing

    Route::get('add', [TasksController::class, 'add'])->name('tasks.add'); //Screen of
    Route::post('add', [TasksController::class, 'addAction']); //Action

    Route::get('edit/{id}', [TasksController::class, 'edit'])->name('tasks.edit'); //Screen of
    Route::post('edit/{id}', [TasksController::class, 'editAction']); //Action

    Route::get('delete/{id}', [TasksController::class, 'delete'])->name('tasks.delete'); //Action

    Route::get('mark/{id}', [TasksController::class, 'mark'])->name('tasks.mark'); //Mark as done or don't done
});


/*This route is an self made example of how simple routes works
In this case, I'm using a get method, but also can be post, and others http verbs
Tip: type Route:: and press ctrl + spacebar to see the static methods of this class would be greapeful
*/
// Route::get('/teste', function(){
//     return view('teste');
// });

// Route::get('teste/{category}/edit/{algo}', function ($category, $algo) {
//     echo 'editando o artigo da categoria ' . $category;
// });


/*
The above route creates a dynamic route, receiving one paramether who will be
interpolated in a var called $n, and that var can be used in route or sent to view
*/
// Route::get('teste/{number}', function($n){
//     echo 'passou o parâmetro: ' . $n;
// });

// Route::get('teste/{number}/algo', function($n){
//     echo 'passou o parâmetro: ' . $n . ', mas entrou em algo';
// });

// Route::get('teste/{number}/algo/{string}', function($n, $s){
//     echo 'passou o parâmetro: ' . $n . ', mas entrou em algo e ainda passou uma string: ' . $s;
// });

// Route::get('teste/{number}/{duvido}/{string}', function($n, $d, $s){
//     echo 'passou o parâmetro: ' . $n . ', mas entrou em algo e ainda passou uma string: ' . $s . ', pena que ' . $d;
// });

// Route::get('{number}/{duvido}/{string}', function($n, $d, $s){
//     echo 'passou o parâmetro: ' . $n . ', mas entrou em algo e ainda passou uma string: ' . $s . ', pena que ' . $d;
// });

// Route::get('{number}/{duvido}/{string}', function ($n, $d, $s) {
//     echo 'passou o parâmetro: ' . $n . ', mas entrou em algo e ainda passou uma string: ' . $s . ', pena que ' . $d;
// })->name('minha-rota');

// Route::prefix('teste')->group(function () {
//     Route::get('/', function () {
//         return view('teste');
//     });

//     Route::get('{category}', function ($category) {
//         echo 'editando o artigo da categoria ' . $category;
//     });


//     //exemplo de rota com redirect para rota nomeada (da linha 57)
//     Route::get('teste2/numero', function () {
//         return redirect()->route('minha-rota');
//     });
// });

