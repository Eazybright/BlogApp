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
Route::get('send_test_email', function(){
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
	{
		$message->to('doneazy911@gmail.com');
	});
});

Route::group(['middleware' => 'web'], function(){
    //facebook authentication route
    // Route::get('login/facebook', 'Auth\AuthController@redirectToFacebook');
    // Route::get('login/facebook/callback', 'Auth\AuthController@getFacebookCallback');

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

    //categories route
    Route::resource('categories', 'CategoryController', ['except' => 'create']);

    //tags route
    Route::resource('tags', 'TagController', ['except' => 'create']);

    // Route::post('send-mail', 'MailController@sendMail')->name('mail');
    
});

Auth::routes();
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');
