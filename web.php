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

Route::get('/faqs', 'FaqController@index')->name('faqs');
Route::get('/home', 'HomeController@index')->name('home');

//User Areas
Route::get('/userarea', 'User\UserController@index')->name('userarea');
Route::get('/userarea/viewticket/{ticket_id}', 'User\UserController@viewticket')->name('viewticket');
Route::get('/userarea/ticketlist', 'User\UserController@ticketlist')->name('ticketlist');
Route::post('/userarea/addcommentbyuser', 'User\UserController@addcommentbyuser')->name('addcommentbyuser');