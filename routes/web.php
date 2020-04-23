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

//Route::get('/','Front\HomeController@index')->name('front.home');

Auth::routes();

// single page
Route::middleware(['auth'])->group(function()
{
    Route::get('/', 'SinglePageController@displaySPA')->name('admin.spa');

    // admin side routes

    Route::prefix('admin')->namespace('Admin')->group(function() {
        // admin/accounts
        Route::get('accounts','Account/AccountController@list');
        Route::get('accounts/get','Account/AccountController@get');
        Route::get('accounts/edit','Account/AccountController@edit');
        Route::get('accounts/new','Account/AccountController@new');
        // admin/banks
        Route::get('bank_accounts','Account/AccountController@list');
        Route::get('bank_accounts/get','Account/AccountController@get');
        Route::get('bank_accounts/edit','Account/AccountController@edit');
        Route::get('bank_accounts/new','Account/AccountController@new');

    });

    Route::fallback(function(){
        return redirect('/');
    });
});

Route::fallback(function(){
    return redirect('/');
});
