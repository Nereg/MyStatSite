<?php
use App\Groups;
use Illuminate\Http\Request;
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

  /**
   * Вывести панель с задачами
   */
  Route::get('/', function () {
    $tasks = Groups::orderBy('Place', 'asc')->get();

    return view('tasks', [
      'tasks' => $tasks
    ]);
  });
  /*
  *display leaders of group
  */
  Route::get('/GroupTop' , function() {
    $Top = Groups::orderBy('Place','asc')->get();
    return view('GroupTop', [
      'Top' => $Top
    ]);
  });