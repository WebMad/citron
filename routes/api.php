<?php

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
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', 'AuthController@logout');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
    });

});


Route::group(['middleware' => ['auth:api'], 'namespace' => 'API'], function () {

    Route::apiResource('project_resources', 'Project\ResourceController');
    Route::apiResource('project_stages', 'Project\StageController');
    Route::apiResource('projects', 'Project\ProjectController');
    Route::apiResource('project_invites', 'Project\InviteController');
    Route::apiResource('project_users', 'Project\ProjectUserController');

    Route::group(['prefix' => 'projects', 'namespace' => "Project"], function () {
        Route::get('{project}/myProjects', 'ProjectController@myProjects');
        Route::get('{project}/fullInfo', 'ProjectController@getFullInfo');
        Route::get('{project}/stages', 'ProjectController@getStages');
        Route::get('{project}/resources', 'ProjectController@getResources');
        Route::get('{project}/users', 'ProjectController@getUsers');
        Route::delete('kick_user/{project_user_id}', 'ProjectController@kickUser');
    });

    Route::group(['prefix' => 'project_invites', 'namespace' => 'Project'], function () {
        Route::post('{project_invite}/accept', 'InviteController@accept');
        Route::post('{project_invite}/deny', 'InviteController@deny');
    });

    Route::group(['prefix' => 'invite_statuses', 'namespace' => 'Project'], function () {
        Route::get('/', 'InviteStatusController@index');
        Route::get('/{invite_status}', 'InviteStatusController@show');
    });

    Route::get('roles', 'RoleController@index');
    Route::get('roles/{role}', 'RoleController@show');

    Route::get('project_roles', 'Project\RoleController@index');
    Route::get('project_roles/{id}', 'Project\RoleController@show');

    Route::apiResource('users', 'UserController');
    Route::group(['prefix' => 'users'], function () {
        Route::get('{user}/projects', 'UserController@getProjects');
        Route::get('{user}/invites', 'UserController@getInvites');
    });

});
