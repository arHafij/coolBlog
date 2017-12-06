<?php

// Admin Routes
Route::group(['namespace'=>'Admin'],function() {

    Route::get('admin/home','HomeController@index')->name('admin.home');

    //User
    Route::resource("admin/user","UserController");
    
    // Post
    Route::resource("admin/post","PostController");

    // Tag
    Route::resource("admin/tag","TagController");

    // Category
    Route::resource("admin/category","CategoryController");

     // Authentication Routes...
    Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/login', 'Auth\LoginController@login');
    Route::post('admin/logout', 'Auth\LoginController@logout')->name('admin.logout');

    // Registration Routes...
    Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('admin.register');
    Route::post('admin/register', 'Auth\RegisterController@register');

});

// User Routes
Route::group(['namespace'=>'User'], function() {

    Route::get('/','HomeController@index');

    Route::get('/post/{post}','PostController@showPost')->name('user.post.show');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
