<?php
use App\CallApi;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//List URLS

//Generate URL
Route::group(['middleware' => 'cors'], function() {
	Route::post('generate/{url?}',function(Request $request){
		  return   CallApi::generate($request->input('url')); 
	});

	Route::post('topMostVisited',function(Request $request){
		  return   CallApi::mostVisited(); 
	});
});