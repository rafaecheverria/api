<?php

use Illuminate\Http\Request;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['jwt.auth'], 'prefix' => 'v1'], function () {

    // Users
    Route::get('/auth/user', 'App\Http\Controllers\UserController@userAuth');
    Route::get('/users', 'App\Http\Controllers\UserController@index');
    Route::get('/api', 'App\Http\Controllers\UserController@getApi');
    Route::post('/users/add', 'App\Http\Controllers\UserController@addUser');
    Route::get('/user/{id}', 'App\Http\Controllers\UserController@getUser');

    //Roles
    Route::get('/roles', 'App\Http\Controllers\RolesController@index');

    //Permisos
    Route::get('/permisos', 'App\Http\Controllers\PermisosController@index');

    //Regiones
    Route::get('regiones/selectRegion', 'App\Http\Controllers\RegionesController@selectRegion');

    //Cargos
    Route::get('cargos/selectCargo', 'App\Http\Controllers\CargosController@selectCargo');

    //Departamentos
    Route::get('departamentos/selectDepartamentoReg/{id}', 'App\Http\Controllers\DepartamentosController@selectDepartamentoReg');
});

Route::group(['prefix' => 'v1'], function () {
    Route::post('/auth/login', 'App\Http\Controllers\TokensController@login');
    Route::post('/auth/refresh', 'App\Http\Controllers\TokensController@refreshToken');
    Route::post('/auth/logout', 'App\Http\Controllers\TokensController@logout');
});
