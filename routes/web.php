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
Route::group(['middleware'=>['web']],function(){

  Route::get('auth/login', ['as' =>'login','uses'=> 'Auth\LoginController@showLoginForm']);
  Route::post('auth/login', 'Auth\LoginController@login');
  Route::get('auth/logout', 'Auth\LoginController@logout')->name('logout');

   // Password Reset Routes
   Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
  Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
  Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
  Route::post('password/reset', 'Auth\ResetPasswordController@reset');

  // Registration Routes...
  Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
  Route::post('auth/register', 'Auth\RegisterController@register');

  // categories
  Route::resource('categories', 'CategoryController', ['except'=>['create']]);
  Route::resource('tags', 'TagController', ['except'=>['create']]);
  // Comments
  Route::post('comments/{post_id}',['uses' => 'CommentsController@store','as'=>'comments.store']);

  Route::get('comments/{id}/edit',['uses' => 'CommentsController@edit','as'=>'comments.edit']);
  Route::put('comments/{id}',['uses' => 'CommentsController@update','as'=>'comments.update']);

  Route::delete('comments/{id}',['uses' => 'CommentsController@destroy','as'=>'comments.destroy']);
    Route::get('comments/{id}/delete',['uses' => 'CommentsController@delete','as'=>'comments.delete']);
//Authentication  route
  // Route::get('auth/login' , 'Auth\LoginController@showLoginForm');
  // Route::get('auth/login' , 'Auth\LoginController@login');
  // Route::get('auth/logout' , 'Auth\LoginController@logout');
  //
  // //Registration routes
  // Route::get('auth/register' ,'Auth\RegisterController@showRegistrationForm');
  // Route::post('auth/register' ,'Auth\RegisterController@register');
  Route::get('blog/{slug}',['as'=>'blog.single', 'uses'=>'BlogController@getSingle'])->where('slug','[\w\d\-\_]+');
  Route::get('blog',['uses'=>'BlogController@getIndex', 'as'=> 'blog.index']);
  Route::get('about', 'PagesController@getAbout');
  Route::get('contactus', 'PagesController@getContact');
  Route::get('contactus', 'PagesController@postContact');
  Route::get('/', 'PagesController@getIndex');
  Route::resource('posts', 'PostController');




});
