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

use Illuminate\Http\Request;

//Route::get('/','Front\HomeController@index')->name('front.home');

Auth::routes();

// single page
Route::middleware(['auth'])->group(function () {
  // admin route group
  Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::post('/account/save', 'Account\AccountController@new');
    Route::post('/account/bank/save', 'Bank\BankController@new');

    // QA
    Route::get('/qa/list', 'Qa\QaController@list');
    Route::get('/qa/list/{id}', 'Qa\QaController@detail');
    Route::post('/qa/new', 'Qa\QaController@new');
    // category
    Route::get('/category/list', 'Category\CategoryController@list');
    Route::post('/category/new', 'Category\CategoryController@new');
  });

  // user route group
  Route::prefix('user')->namespace('User')->group(function () {
    Route::get('/test', function () {
      echo 'user/test';
    });

  });

  // single page
  Route::get('/', 'SinglePageController@displaySPA')->name('spa');

  Route::fallback(function () {
    return redirect('/');
  });
});

Route::fallback(function () {
  return redirect('/');
});
