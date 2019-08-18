<?php
use Illuminate\Foundation\Inspiring;
/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('updateDB', function () {
    $MAPI = new MyStat();
    $token= $MAPI->Login(env('MYSTAT_PASSWORD','YOU_DONT_INCLUDE_PASSWORD'),env('MYSTAT_USER',"IN_.ENV_FILE")); 
    $leaderboard = $MAPI->GetLeaderboard($token);
    $Top = App\Groups::all();
    foreach ($leaderboard as $key => $value) {
        $Top->Name = $value->full_name;
        $Top->Photo = $value->photo_path;
        $Top->Place = $value->position;
        $Top->save();
    }
})->describe('Update all data in DB like top`s');
