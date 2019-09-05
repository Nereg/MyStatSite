<?php
use App\Groups;
use App\ClassTop;
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
    $FirstTop = Groups::orderBy('Place','asc')->get();
    $SecondTop = ClassTop::orderBy('Place','asc')->get();
    return view('MainPage',[
      'First'=>$FirstTop,
      'Second'=>$SecondTop
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
  /*
  *display leaders of class
  */
  Route::get('/ClassTop' , function() {
    $Top = ClassTop::orderBy('Place','asc')->get();
    return view('ClassTop', [
      'Top' => $Top
    ]);
  });
  /*
  * Move to discord server invite link
  */
  Route::get('/DiscordServer' , function() {
    return redirect('https://discord.gg/Kesfu4f');
  });
  /*
  * Admin panel
  */
  Route::get('/Admin', function() {
    return view('AdminPanel');
  });
  