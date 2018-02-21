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

//Route::get('/', 'HomeController@index');


Auth::routes();

//Route::get('/home', 'HomeController@index');
//Route::resource('lesson/posts', 'Content\\LessonController');
// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('user', 'Admin\UserCrudController');
    CRUD::resource('content', 'Admin\ContentCrudController');
    CRUD::resource('lesson', 'Admin\LessonCrudController');
    CRUD::resource('subject', 'Admin\SubjectCrudController');
    CRUD::resource('grade', 'Admin\GradeCrudController');
    CRUD::resource('stage', 'Admin\StageCrudController');

    // [...] other routes
});

Route::get(\App\Models\Page::URL_PREFIX . '{page}/{subs?}', ['uses' => 'PageController@index'])
    ->where(['page' => '^((?!admin).)*$', 'subs' => '.*']);

Route::get('social-auth/facebook', 'Auth\SocialAuthController@redirectToProvider')->name('socialAuth.facebook');
Route::get('social-auth/facebook/callback', 'Auth\SocialAuthController@handleProviderCallback')->name('socialAuth.facebook.callback');
