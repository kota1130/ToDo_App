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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', 'UserController@index');

Route::group(['prefix' => 'task', 'middleware'=>'auth'], function(){
    Route::get('index', 'TaskController@index')->name('task.index');
    Route::get('create','TaskController@create')->name('task.create');
    Route::post('store','TaskController@store')->name('task.store');
    Route::get('show/{id}', 'TaskController@show')->name('task.show');
    Route::get('edit/{id}', 'TaskController@edit')->name('task.edit');
    Route::post('update/{id}', 'TaskController@update')->name('task.update');
    Route::post('destroy/{id}', 'TaskController@destroy')->name('task.destroy');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
