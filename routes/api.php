<?php

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

Route::middleware('jwt.auth')->get('/user', function (Request $request) {
    return $request->user();
});
	
	Route::post('login', 'ApiAuthController@authenticate');
	Route::group(['middleware' => ['jwt.auth']], function () {
		//Route::resource('users', 'UserController');
        Route::get('/now', 'Schedule\ScheduleController@now');
        Route::resource('schedules', 'Schedule\ScheduleController', ['only' => ['index', 'show' ]]);
        Route::resource('students', 'Cursante\CursanteController', ['only' => ['show']]);
        Route::resource('missing', 'MissingController', ['only' => ['index', 'show', 'store']]);

});


