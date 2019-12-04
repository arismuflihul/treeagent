<?php

use App\Agent;
use App\User;
use App\Costumer;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('agent', function(){
    return Agent::paginate(5);
});

Route::get('user', function(){
    return User::paginate(5);
});

Route::get('costumer', function(){
    return Costumer::paginate(5);
});

//
// Route::get('agents/{agent}', function (Agent $agent) {
//     return $agent;
// });
//
//
Route::get('agents/{agent}', function ($id) {
    return Agent::find($id);
});

Route::get('users', 'UserController@users');
    
Route::get('train', 'UserController@train');

Route::post('Train_Post', 'UserController@train_post');

Route::get('Agent_Get', 'Api\AgentApiController@agent_get');

Route::post('Agent_Post', 'Api\AgentApiController@agent_post');

Route::get('Agent_Find', 'Api\AgentApiController@show');
