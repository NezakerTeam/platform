<?php
/*
  |--------------------------------------------------------------------------
  | Web Routes
  |--------------------------------------------------------------------------
  |
  | This file is where you may define all of the routes that are handled
  | by your application. Just tell Laravel the URIs it should respond
  | to using a Closure or controller method. Build something great!
  |
 */

//Route::get('/', 'HomeController@index');


Auth::routes();

//Route::get('/home', 'HomeController@index');
//Route::resource('lesson/posts', 'Content\\LessonController');

// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('lesson', 'Admin\LessonCrudController');
    CRUD::resource('user', 'Admin\UserCrudController');
    CRUD::resource('content', 'Admin\ContentCrudController');

    // [...] other routes
});
