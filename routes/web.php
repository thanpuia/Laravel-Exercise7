<?php

use App\Http\Controllers\ContentController;

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

// Route::get('/', function () {
//     return view('home');
// });
Route::get('/boot', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');

// Route::GET('/users', 'UserController@index')->name('users.index');
// Route::PUT('/users/{user}', 'UserController@update')->name('users.update');
// Route::DELETE('/users/{user}', 'UserController@destroy')->name('users.destroy');
Route::get('/users/search', 'UserController@search')->name('users.search');
Route::resource('/users', 'UserController');

Route::post('attendence/viewByRegistration','AttendenceController@viewByRegistration')->name('attendence.viewByRegistration');
Route::post('attendence/viewByClass','AttendenceController@viewByClass')->name('attendence.viewByClass');
Route::post('attendence/attendence_edit_store','AttendenceController@attendence_edit_store')->name('attendence.attendence_edit_store');
Route::post('attendence/attendence_edit','AttendenceController@attendence_edit')->name('attendence.attendence_edit');
Route::post('attendence/postCreate','AttendenceController@postCreate')->name('attendence.postCreate');
Route::resource('/attendence', 'AttendenceController');

Route::get('contents/create','ContentController@create')->name('contents.create');
Route::post('contents/store','ContentController@store')->name('contents.store');
Route::get('contents/{content}/edit','ContentController@edit')->name('contents.edit');
Route::put('contents/update','ContentController@update')->name('contents.update');


