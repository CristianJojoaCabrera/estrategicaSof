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

Auth::routes();

    Route::post('/createPersonal', 'PersonalController@store')->name('createPersonal');
    Route::get('/persona/{id}', 'PersonalController@persona')->name('get_person');
    Route::put('/editPersona/{id}', 'PersonalController@update')->name('edit_person');
    Route::get('/persona/{id}', 'PersonalController@persona')->name('get_person');
    Route::get('/personal', 'PersonalController@personal')->name('personal');

    Route::get('/home', 'HomeController@index')->name('home');
