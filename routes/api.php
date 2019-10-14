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

    Route::apiResource('project_resources', 'Project\ResourceController');
    Route::apiResource('project_stages', 'Project\StageController');
    Route::apiResource('projects', 'Project\ProjectController');

    Route::group(['prefix' => 'projects', 'namespace' => "Project"], function () {
        Route::get('{project}/fullInfo', 'ProjectController@getFullInfo');
        Route::get('{project}/stages', 'ProjectController@getStages');
        Route::get('{project}/resources', 'ProjectController@getResources');
        Route::get('{project}/users', 'ProjectController@getUsers');
    });

    Route::get('roles', 'RoleController@index');
    Route::get('roles/{id}', 'RoleController@show');

    Route::get('project_roles', 'Project\RoleController@index');
    Route::get('project_roles/{id}', 'Project\RoleController@show');

    Route::apiResource('users', 'UserController');
});
