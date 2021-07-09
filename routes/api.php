<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => ['api']], function () {
    Route::group(['prefix' => 'animal'], function () {
        Route::get('add','AnimalController@create');
        Route::post('create','AnimalController@store');
        Route::get('car','AnimalController@index');
        Route::get('code/{id}','AnimalController@findById');
        Route::post('edit/{id}','AnimalController@update');
        Route::delete('delete/{id}','AnimalController@destroy');

    });
});

Route::group(['middleware' => ['api']], function () {

    Route::group(['prefix' => 'v1'], function () {

        Route::group(['prefix' => 'document'], function () {


            Route::get('/student/list', 'StudentController@list')->name('student.list');
            Route::get('/student/show/{id}', 'StudentController@show')->name('student.show');
            Route::post('/student/create', 'StudentController@create')->name('student.create');
            Route::put('/student/update/{id}', 'StudentController@update')->name('student.update');
            Route::delete('/student/delete/{id}', 'StudentController@delete')->name('student.delete');

        });
    });
});
