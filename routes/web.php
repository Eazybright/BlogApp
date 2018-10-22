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

Route::group(['middleware' => 'web'], function(){
    //facebook authentication route
    // Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    // Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('/redirect', 'Auth\SocialAuthFacebookController@redirect')->name('redirect');
    Route::get('/callback', 'Auth\SocialAuthFacebookController@callback')->name('callback');
    // Route::get('auth/callback/{provider}', 'SocialAuthController@callback');
    // Route::get('auth/redirect/{provider}', 'SocialAuthController@redirect');


    //blog routes
    Route::get('blog/{slug}', ['as' => 'blog.single', 'uses' => 'BlogController@getSingle'])->where('slug', '[\w\d\-\_]+');
    Route::get('blog', ['as' => 'blog.index', 'uses' => 'BlogController@getIndex']);

    //pages route
    Route::get('/', 'PagesController@getIndex');
    Route::get('contact', 'PagesController@getContact');
    Route::post('contact', 'PagesController@postContact');
    Route::get('about', 'PagesController@getAbout');
    
    //posts route
    Route::resource('posts', 'PostController');

    //comments route
    Route::post('comments/{post_id}', ['uses' => 'CommentController@store', 'as' => 'comments.store']);
    Route::get('comments/{id}/edit', ['uses' => 'CommentController@edit', 'as' => 'comments.edit']);
    Route::delete('comments/{id}/delete', ['uses' => 'CommentController@destroy', 'as' => 'comments.destroy']);
    Route::put('comments/{id}', ['uses' => 'CommentController@update', 'as' => 'comments.update']);
    Route::get('comments/{id}/delete', ['uses' => 'CommentController@delete', 'as' => 'comments.delete']);

    //categories route
    Route::resource('categories', 'CategoryController', ['except' => 'create']);

    //tags route
    Route::resource('tags', 'TagController', ['except' => 'create']);

    //dashboard route
    Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'DashboardController@getIndex']);

    //activate account routes
    Route::get('auth/activate', 'Auth\ActivationController@activate')->name('auth.activate');
    Route::get('auth/activate/resend', 'Auth\ActivationResendController@showResendForm')->name('auth.activate.resend');
    Route::post('auth/activate/resend', 'Auth\ActivationResendController@Resend')->name('auth.activate.resend');

});

Auth::routes();
