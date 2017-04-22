<?php

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

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:api');

$api = app('Dingo\Api\Routing\Router');


$api->version('v1', function ($api) {
    $api->get('stages', 'App\Http\Controllers\Api\ContentController@stages');
    $api->get('grades/{id}', 'App\Http\Controllers\Api\ContentController@grades');
    $api->get('subjects/{id}', 'App\Http\Controllers\Api\ContentController@subjects');
    $api->get('lessons/{id}', 'App\Http\Controllers\Api\ContentController@lessons');
    $api->get('videos/{id}', 'App\Http\Controllers\Api\ContentController@videos');
});
