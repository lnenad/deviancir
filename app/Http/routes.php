<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get( 'tags/{id}' , 'GraphicsController@tags');

Route::resource('/', 'PageController');

Route::resource('users', 'UsersController');

Route::resource('graphics', 'GraphicsController');

Route::resource('comments', 'CommentsController');

Route::get( '/graphic/like', array(
    'as' => 'graphic.like',
    'uses' => 'GraphicsController@like'
) );

/*
Route::bind('graphics', function($value, $route) {
	return App\Graphic::where('title',$value)->first();
});
Route::bind('user', function($value, $route) {
	return App\Project::whereSlug($value)->first();
});
*/


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
