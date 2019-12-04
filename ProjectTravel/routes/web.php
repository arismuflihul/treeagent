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

Route::get('/logindulu','AuthController@login')->name('login');

Route::post('/postlogin', 'AuthController@postlogin');

Route::get('/logout', 'AuthController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/proses', 'CostumerController@createv2');

Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

Route::get('/pendapatan', 'PendapatanController@index')->middleware('auth');

Route::group(['middleware' => ['auth','checkRole:admin']], function(){

    

    Route::get('/agent','AgentController@index');

    Route::post('/agent/create', 'AgentController@create');

    Route::get('agent/{id}/viewUpdate','AgentController@viewUpdate');

    Route::post('/agent/{id}/update','AgentController@update');

    Route::get('/agent/{id}/delete', 'AgentController@delete');

    Route::get('/agent/{id}/listagent', 'AgentController@listagent');

    Route::get('/costumerlist', 'CostumerController@listcostumer');


});

Route::group(['middleware' => ['auth', 'checkRole:agent']], function(){

    Route::get('/agentbawah', 'AgentBawahController@index');

    Route::get('/agentbawah/{id}/listagentbawah', 'AgentBawahController@listagentbawah');

    Route::post('/agentbawah/create', 'AgentBawahController@create');

    Route::post('/costumer/create', 'CostumerController@create');

    Route::post('/costumer/createv2', 'CostumerController@createv2');

    Route::get('/costumer', 'CostumerController@index');    


});
