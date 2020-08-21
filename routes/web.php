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

Route::get('/logins',function(){
    return view('auth.login');
});

Route::post('/sendmail','MailController@send');
Route::get('/strategy/new/{email}','StrategyController@new');
Route::post('/strategy','StrategyController@store');
Route::get('/success',function(){
    return view('strategy.submitted');
});
Route::get('/strategy/new_inside','StrategyController@new_inside');
Route::post('/strategy/store_inside','StrategyController@store_insde');

Route::get('/dashboard/clients/{id}','ClientsController@dashboard');
Route::get('/campaigns/clients/{id}','ClientsController@campaigns');
Route::get('/reports/clients/{id}','ClientsController@reports');
Route::get('/notifications/clients/{id}','ClientsController@notifications');
Route::get('/strategies/clients/{id}','ClientsController@strategies');
Route::get('/strategy/show/{id}','ClientsController@show_strategy');
Route::get('/account/clients/{id}','ClientsController@account_details');
Route::get('/profile/clients/{id}','ClientsController@edit');
Route::put('/edit/clients/{id}','ClientsController@update');
Route::delete('/clients/{id}','ClientsController@destroy');

Route::get('/profile/account_manager/{id}','AccountManagerController@edit');
Route::put('/edit/account_manager/{id}','AccountManagerController@update');
Route::get('/acc/addclient','AccountManagerController@new_client');
Route::post('/acc/addclient','AccountManagerController@store_client');
Route::get('/acc/addagency','AccountManagerController@new_agency');
Route::post('/acc/addagency','AccountManagerController@store_agency');
Route::get('/dashboard/account_manager/{id}','AccountManagerController@dashboard');
Route::get('/clients/{id}','AccountManagerController@clients');
Route::get('/agencies/{id}','AccountManagerController@agencies');
Route::delete('/account_managers/{id}','AccountManagerController@destroy');


Route::get('/dashboard/admin/{id}','AdminController@dashboard');
Route::get('/manage/clients/{id}','AdminController@clients');
Route::get('/manage/agencies/{id}','AdminController@agencies');
Route::get('/manage/account_manager/{id}','AdminController@account_manager');
Route::get('/manage/admins/{id}','AdminController@admins');
Route::get('/acc_manager/details/{id}','AdminController@manager_details');
Route::get('/client/details/{id}','AdminController@client_details');
Route::get('/agency/details/{id}','AdminController@agency_details');
Route::get('/admin/addagency','AdminController@new_agency');
Route::post('/admin/addagency','AdminController@store_agency');
Route::get('/admin/{type}','AdminController@new');
Route::post('/admin/{type}','AdminController@store');
Route::get('/profile/{type}/{id}','AdminController@edit');
Route::put('/edit/{type}/{id}','AdminController@update');
Route::get('/viaadmin/agency/{id}','AdminController@edit_agency');
Route::put('/viaadmin/agency/{id}','AdminController@update_agency');
Route::delete('/admins/{id}','AdminController@destroy');


Route::get('/dashboard/agencies/{id}','AgencyController@dashboard');
Route::get('/manage/campaigns/{id}','AgencyController@campaigns');
Route::get('/manage/posts/{id}','AgencyController@posts');
Route::get('/account/agencies/{id}','AgencyController@account_details');
Route::get('/profile/agencies/{id}','AgencyController@edit');
Route::put('/profile/agencies/{id}','AgencyController@update');
Route::delete('/agencies/{id}','AgencyController@destroy');

Auth::routes(['register'=>false]);

// Route::get('/home', 'HomeController@index')->name('home');
