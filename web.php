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
Route::get('/faqs', 'FaqController@index')->name('faqs');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//User Areas
Route::get('/userarea', 'User\UserController@index')->name('userarea');
Route::get('/userarea/viewticket/{ticket_id}', 'User\UserController@viewticket')->name('viewticket');
Route::get('/userarea/ticketlist', 'User\UserController@ticketlist')->name('ticketlist');
Route::post('/userarea/addcommentbyuser', 'User\UserController@addcommentbyuser')->name('addcommentbyuser');

//Open Ticket
Route::post('/openticket', 'User\UserController@openticket')->name('openticket');

//Admin Areas
Route::get('/adminarea', 'Admin\AdminController@index')->name('adminarea');
Route::get('/adminarea/adddepartment', 'Admin\AdminController@adddepartment')->name('adddepartment');
Route::post('/adminarea/adddepartment_insert', 'Admin\AdminController@adddepartment_insert')->name('adddepartment_insert');
Route::post('/adminarea/changedepartmentstatus', 'Admin\AdminController@changedepartmentstatus')->name('changedepartmentstatus');
Route::get('/adminarea/addservice', 'Admin\AdminController@addservice')->name('addservice');
Route::post('/adminarea/addservice_insert', 'Admin\AdminController@addservice_insert')->name('addservice_insert');
Route::post('/adminarea/changeservicestatus', 'Admin\AdminController@changeservicestatus')->name('changeservicestatus');
Route::get('/adminarea/all_tickets_list', 'Admin\AdminController@all_tickets_list')->name('all_tickets_list');
Route::get('/adminarea/all_tickets_list/{user_id}', 'Admin\AdminController@all_tickets_list_individual')->name('all_tickets_list_individual');
Route::get('/adminarea/viewticket/{ticket_id}', 'Admin\AdminController@adminviewticket')->name('adminviewticket');
Route::post('/adminarea/markticketclosebyadmin', 'Admin\AdminController@markticketclosebyadmin')->name('markticketclosebyadmin');
Route::post('/adminarea/addcommentbyadmin', 'Admin\AdminController@addcommentbyadmin')->name('addcommentbyadmin');
Route::get('/adminarea/users', 'Admin\AdminController@adminusers')->name('adminusers');
Route::get('/adminarea/addadminexecutive', 'Admin\AdminController@addadminexecutive')->name('addadminexecutive');
Route::post('/adminarea/addadmininsert', 'Admin\AdminController@addadmininsert')->name('addadmininsert');
Route::post('/adminarea/addexecutiveinsert', 'Admin\AdminController@addexecutiveinsert')->name('addexecutiveinsert');
Route::post('/adminarea/adminexecutivedelete', 'Admin\AdminController@adminexecutivedelete')->name('adminexecutivedelete');
Route::get('/adminarea/addfaq', 'Admin\AdminController@addfaq')->name('addfaq');
Route::post('/adminarea/addfaqinsert', 'Admin\AdminController@addfaqinsert')->name('addfaqinsert');
Route::post('/adminarea/changefaqstatus', 'Admin\AdminController@changefaqstatus')->name('changefaqstatus');

//Admin Settings
Route::get('/adminarea/settings', 'Admin\AdminController@adminsettings')->name('adminsettings');
Route::post('/adminarea/changesettings', 'Admin\AdminController@changesettings')->name('changesettings');

//Executive Areas
Route::get('/executivearea', 'Executive\ExecutiveController@index')->name('executivearea');
Route::get('/executivearea/viewticket/{ticket_id}', 'Executive\ExecutiveController@executiveviewticket')->name('executiveviewticket');
Route::post('/executivearea/addcommentbyexecutive', 'Executive\ExecutiveController@addcommentbyexecutive')->name('addcommentbyexecutive');
Route::post('/executivearea/markticketclosebyexecutive', 'Executive\ExecutiveController@markticketclosebyexecutive')->name('markticketclosebyexecutive');

//Profile Area
Route::get('/userprofile','ProfileController@userprofile')->name('userprofile');
Route::get('/adminprofile','ProfileController@adminprofile')->name('adminprofile');
Route::get('/executiveprofile','ProfileController@executiveprofile')->name('executiveprofile');
Route::post('/avatar_change','ProfileController@avatar_change')->name('avatar_change');
Route::post('/password_change','ProfileController@password_change')->name('password_change');

//Installation - one time
Route::get('/install','InstallController@install')->name('install');

//Email Templates (Not using)
Route::get('/replybyadminmail','MailController@replybyadminmail')->name('replybyadminmail');

//Testing Ground
Route::get('/test',function(){
  return view("test");
})->name('test');
