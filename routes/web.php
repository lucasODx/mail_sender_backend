<?php

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
    return view('welcome');
});


Route::get('send-email', function(){
    $user = new stdClass();
    $user->name = "Lucas";
    $user->email = "elleventestelucas@gmail.com";

    Mail::send(new \App\Mail\Mailer($user));
});