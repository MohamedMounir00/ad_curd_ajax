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
 
 Route::resource('students','AjaxController');
 Route::get('student/read-data','AjaxController@readData');
 Route::post('student/store','AjaxController@store')->name('store');
 Route::post('student/delete','AjaxController@destory')->name('delete');
 Route::get('student/edit','AjaxController@edit')->name('edit');
 Route::post('student/update','AjaxController@update')->name('update');
 Route::get('student/paginate','AjaxController@pagination')->name('paginate');
 Route::get('student/paginate/student','AjaxController@studentpage');

