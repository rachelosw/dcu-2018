<?php

use Yajra\Datatables\Datatables;
use App\User;
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

Route::get('/', 'HomeController@index')->name('index');

Auth::routes();

Route::get('/dashboard', ['as' => 'auth.dashboard', 'uses' => 'UserController@getDashboard']);
Route::get('/dashboard/profile/edit', ['as' => 'auth.edit', 'uses' => 'UserController@edit']);
Route::patch('/dashboard/profile/{user}/update', ['as' => 'auth.update', 'uses' => 'UserController@update']);
Route::get('/dashboard/profile/upload', ['as' => 'auth.upload', 'uses' => 'UserController@uploadPhoto'])->middleware('is_pending');
Route::post('/dashboard/profile/uploaded', ['as'=>'auth.uploaded','uses'=>'UserController@uploadAction'])->middleware('is_pending');
Route::get('/dashboard/payment', ['as' => 'auth.payment', 'uses' => 'UserController@getPayment']);
Route::get('/dashboard/choose-seminar', ['as' => 'auth.chooseSeminar', 'uses' => 'SeminarController@getChooseSeminarView'])->middleware('is_accepted');
Route::patch('/dashboard/choose-seminar/{package}', ['as' => 'auth.seminarChosen', 'uses' => 'SeminarController@setSeminar'])->middleware('is_accepted');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dcu-inspiration', ['as' => 'dcu-inspiration', 'uses' => 'SeminarController@getDcuInspiration']);
Route::get('/dcu-opportunity', ['as' => 'dcu-opportunities', 'uses' => 'SeminarController@getDcuOpportunities']);
Route::get('/dcu-specials', ['as' => 'dcu-specials', 'uses' => 'SeminarController@getDcuSpecials']);
Route::get('/dcu-care', ['as' => 'dcu-care', 'uses' => 'SeminarController@getDcuCare']);

Route::get('/admin', 'AdminController@admin')    
->middleware('is_admin')    
->name('admin.home');

Route::get('/admin/users', ['as' => 'admin.users', 'uses' => 'AdminController@getUsers'])->middleware('is_admin');
Route::delete('/admin/users/{user}', ['as' => 'admin.deleteUser', 'uses' => 'AdminController@deleteUser'])->middleware('is_admin');
Route::put('/admin/users/{user}', ['as' => 'admin.approveUser', 'uses' => 'AdminController@approveUser'])->middleware('is_admin');

Route::get('/admin/seminars', ['as' => 'admin.seminars', 'uses' => 'AdminController@getSeminars'])->middleware('is_admin');
Route::get('/admin/seminars/add', ['as' => 'admin.addSeminar', 'uses' => 'AdminController@addSeminar']);
Route::post('/admin/seminars/add', ['as' => 'admin.seminarAdded', 'uses' => 'AdminController@seminarAdded']);
Route::get('/admin/seminars/edit/{seminar}', ['as' => 'admin.editSeminar', 'uses' => 'AdminController@editSeminar'])->middleware('is_admin');
Route::patch('/admin/seminars/edit/{seminar}', ['as' => 'admin.seminarEdited', 'uses' => 'AdminController@seminarEdited'])->middleware('is_admin');
Route::delete('/admin/seminars/delete/{seminar}', ['as' => 'admin.deleteSeminar', 'uses' => 'AdminController@deleteSeminar'])->middleware('is_admin');
Route::patch('/admin/seminars/edit/package/{seminar}', ['as' => 'admin.changePacket', 'uses' => 'AdminController@changeSeminarPacket'])->middleware('is_admin');

Route::get('admin/categories', ['as' => 'admin.seminarCategories', 'uses' => 'AdminController@seminarCategories'])->middleware('is_admin');
Route::get('admin/categories/edit/{category}', ['as' => 'admin.editCategory', 'uses' => 'AdminController@editCategory'])->middleware('is_admin');
Route::patch('admin/categories/edit/{category}', ['as' => 'admin.categoryEdited', 'uses' => 'AdminController@categoryEdited'])->middleware('is_admin');

Route::get('admin/settings', ['as' => 'admin.settingsPage', 'uses' => 'AdminController@getSettingsPage']);
Route::post('admin/settings', ['as' => 'admin.saveSettings', 'uses' => 'AdminController@saveSettings']);
