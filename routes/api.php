<?php

use Illuminate\Http\Request;
use App\User;

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

Route::apiResource('/dashboarduser', 'DashBoardUserController');
Route::apiResource('/location', 'LocationController');
Route::apiResource('/comment', 'CommentController');
Route::apiResource('/tantouUser', 'TantouUserController');
Route::apiResource('/tantou', 'TantouController');


Route::apiResource('/Partstruct', 'PartStructController');
Route::apiResource('/Productionexe', 'ProductionExeController');
Route::get('/Productionexe/pdf', 'ProductionExeController@listPdf');


Route::get('dashboarduser/tag/{comentNum}', 'DashBoardUserController@tag');
Route::patch('/gomi'          , 'DashBoardUserController@gomi');
Route::patch('/souzi'         , 'DashBoardUserController@souzi');
Route::patch('/seisou'        , 'DashBoardUserController@seisou');
Route::patch('/hinomoto'       , 'DashBoardUserController@hinomoto');
Route::patch('/server'        , 'DashBoardUserController@server');


Route::apiResource('/linemaster'    , 'LineMasterController');
Route::apiResource('/processmaster' , 'ProcessMasterController');
Route::apiResource('/hostmaster'    , 'HostMasterController');
Route::apiResource('/workermaster'  , 'WorkerMasterController');

Route::patch('/zaiseki/{id}'  , 'DashBoardUserController@zaiseki');
Route::patch('/taiseki/{id}'  , 'DashBoardUserController@taiseki');

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('signup', 'AuthController@signup');
    Route::post('me', 'AuthController@me');
    Route::post('payload', 'AuthController@payload');

});