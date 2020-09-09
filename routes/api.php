<?php

use Illuminate\Http\Request;
use Api\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('auth/login', 'Api\AuthController@login');


Route::group(['middleware' => 'apiJwt'], function(){
    #http://cursos-jobim.test/api/alunosApi
    Route::get('alunosApi', 'Api\\UserController@index');

    #http://cursos-jobim.test/api/alunosApi
    Route::get('cursoApi', 'Api\CursoController@index');
});