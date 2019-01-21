<?php

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
use App\ManagerUrl;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/{url}',function($url = null){
     return ManagerUrl::urlRedirect($url);
});