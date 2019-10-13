<?php

use App\Http\Resources\RoleResource;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::group([
    'prefix' => 'auth',
    'namespace' => 'API'
], function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::group(['middleware' => ['jwt.verify'], 'namespace' => 'API'], function () {

    Route::group(['prefix' => 'projects', 'namespace' => "Project"], function ()
    {
        Route::apiResource('/', 'ProjectController');
        Route::get('{id}/getFullInfo', 'ProjectController@getFullInfo');
        Route::get('{id}/stages', 'ProjectController@getStages');
        Route::get('{id}/resources', 'ProjectController@getResources');
        Route::get('{id}/users', 'ProjectController@getUsers');
    });

    Route::get('roles', 'RoleController@index');
    Route::get('roles/{id}', 'RoleController@show');

    Route::apiResource('users', 'UserController');
});
