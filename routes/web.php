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

Route::get('/', 'HomeController@index');

Route::get('/search', 'SearchController@search');

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

Route::resource('posts', 'PostController');
Route::resource('comments', 'CommentController');

Route::get('/admin', 'DashboardController@index')->middleware('is_admin');

Route::get('/admin/equipment', 'EquipmentController@index')->middleware('is_admin');
Route::get('/admin/equipment/create', 'EquipmentController@create')->middleware('is_admin');
Route::post('/admin/equipment/create', 'EquipmentController@store')->middleware('is_admin');
Route::get('/admin/equipment/{e}/edit', 'EquipmentController@edit')->middleware('is_admin');
Route::put('/admin/equipment/{e}/edit', 'EquipmentController@update')->middleware('is_admin');
Route::delete('/admin/equipment/{e}', 'EquipmentController@destroy')->middleware('is_admin');

// Company Routes
Route::get('/admin/company', 'CompanyController@index')->middleware('is_admin');
Route::get('/admin/company/create', 'CompanyController@create')->middleware('is_admin');
Route::post('/admin/company/create', 'CompanyController@store')->middleware('is_admin');
Route::get('/admin/company/{c}/edit', 'CompanyController@edit')->middleware('is_admin');
Route::put('/admin/company/{c}/edit', 'CompanyController@update')->middleware('is_admin');
Route::delete('/admin/company/{c}', 'CompanyController@destroy')->middleware('is_admin');

// Wallet Routes
Route::get('/admin/wallet', 'WalletController@index')->middleware('is_admin');
Route::get('/admin/wallet/create', 'WalletController@create')->middleware('is_admin');
Route::post('/admin/wallet/create', 'WalletController@store')->middleware('is_admin');
Route::get('/admin/wallet/{w}/edit', 'WalletController@edit')->middleware('is_admin');
Route::put('/admin/wallet/{w}/edit', 'WalletController@update')->middleware('is_admin');
Route::delete('/admin/wallet/{w}', 'WalletController@destroy')->middleware('is_admin');

// Article Routes
Route::get('/admin/article', 'PostController@all')->middleware('is_admin');
Route::get('/admin/article/create', 'PostController@admin_create')->middleware('is_admin');
Route::post('/admin/article/create', 'PostController@store')->middleware('is_admin');
Route::get('/admin/article/{a}/edit', 'PostController@admin_edit')->middleware('is_admin');
Route::put('/admin/article/{a}/edit', 'PostController@admin_update')->middleware('is_admin');
Route::delete('/admin/article/{a}', 'PostController@admin_destroy')->middleware('is_admin');

// User Routes
Route::get('/admin/user', 'ProfileController@all_users')->middleware('is_admin');
Route::delete('/admin/user/{u}', 'ProfileController@user_destroy')->middleware('is_admin');

//Front View Routes
Route::get('/mining/equipment', 'EquipmentController@front');
Route::get('/mining/equipment/{e}', 'EquipmentController@detail');
Route::post('/mining/equipment/{e}', 'EquipmentController@comment');

Route::get('/mining/company', 'CompanyController@front');
Route::get('/mining/company/{c}', 'CompanyController@detail');
Route::post('/mining/company/{c}', 'CompanyController@comment');

Route::get('/wallet', 'WalletController@front');
Route::get('/wallet/top', 'WalletController@top');
Route::get('/wallet/{w}', 'WalletController@detail');
Route::post('/wallet/{w}', 'WalletController@comment');

Route::get('/blog', 'PostController@blog');

// Profile Routes
Route::get('/profile', 'ProfileController@index')->middleware('auth');
Route::get('/profile/following', 'ProfileController@following')->middleware('auth');
Route::get('/profile/followers', 'ProfileController@followers')->middleware('auth');
Route::get('/profile/setting', 'ProfileController@setting')->middleware('auth');
Route::post('/profile/setting', 'ProfileController@update')->middleware('auth');
Route::get('/profile/password', 'ProfileController@password')->middleware('auth');
Route::post('/profile/password', 'ProfileController@update_password')->middleware('auth');
Route::get('/profile/{i}', 'ProfileController@view');
Route::post('/profile/{i}', 'ProfileController@follow');

Route::get('/profile/notifications/new', 'ProfileController@notifications_new');
