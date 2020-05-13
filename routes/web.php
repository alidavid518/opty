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
    Route::get('/qa/delete/{id}', 'Qa\QaController@delete');
    // category
    Route::get('/category/list', 'Category\CategoryController@list');
    Route::post('/category/new', 'Category\CategoryController@new');
    // contact us
    Route::get('/contact/list/{status}', 'Contacts\ContactController@list');
    // affiliate
    Route::get('/affiliate/list', 'Affiliate\AffiliateController@list');
    Route::post('/affiliate/new', 'Affiliate\AffiliateController@new');
    Route::get('/affiliate/delete', 'Affiliate\AffiliateController@delete');
    Route::get('/affiliate/get/{id}', 'Affiliate\AffiliateController@get');
    // team
    Route::get('/team/list', 'Team\TeamController@list');
    Route::post('/team/new', 'Team\TeamController@new');
    Route::post('/team/add_member', 'Team\TeamController@addMember');
    Route::get('/team/delete', 'Team\TeamController@delete');
    Route::get('/team/get/{id}', 'Team\TeamController@get');
    // advertiser
    Route::get('/advertiser/list', 'Advertiser\AdvertiserController@list');
    Route::post('/advertiser/new', 'Advertiser\AdvertiserController@new');
    Route::get('/advertiser/delete/{id}', 'Advertiser\AdvertiserController@delete');
    Route::get('/advertiser/get/{id}', 'Advertiser\AdvertiserController@get');
    // manager
    Route::get('/manager/list', 'Manager\ManagerController@list');
    Route::post('/manager/new', 'Manager\ManagerController@new');
    // campaign
    Route::get('/campaign/list/{flag}', 'Campaign\CampaignController@list');
    Route::post('/campaign/new/{flag}', 'Campaign\CampaignController@new');
    Route::get('/campaign/get/{id}', 'Campaign\CampaignController@get');
    Route::post('/campaign/edit/{id}', 'Campaign\CampaignController@edit');
    Route::get('/campaign/advertisers', 'Campaign\CampaignController@activeAdvertisers');
    // campaign/story
    Route::get('/campaign/story/list/{campaign_id}', 'Story\StoryController@list');
    Route::post('/campaign/story/save','Story\StoryController@save');
    // campaign/Lp
    Route::get('/campaign/lp/list/{campaign_id}', 'Lp\LpController@list');
    Route::get('/campaign/lp/delete/{id}', 'Lp\LpController@delete');
    Route::post('/campaign/lp/save','Lp\LpController@save');
    // campaign/Period
    Route::post('/campaign/period/set/{campaign_id}', 'Campaign\CampaignController@setPeriod');
    // campaign/LineRichImage
    Route::get('/campaign/line-rich-image/lp_list/{campaign_id}', 'LineRichImage\LineRichImageController@lp_list');
    Route::post('/campaign/line-rich-image/add-image/{lp_id}', 'LineRichImage\LineRichImageController@new');
    Route::get('/campaign/line-rich-image/delete/{id}', 'LineRichImage\LineRichImageController@delete');
    // campaign/mail-line-introduction
    Route::get('/campaign/mail-line-intro/lp_list/{campaign_id}', 'MailLineIntroduction\MailLineIntroductionController@lp_list');
    Route::post('/campaign/mail-line-intro/new/{lp_id}', 'MailLineIntroduction\MailLineIntroductionController@new');
    Route::get('/campaign/mail-line-intro/delete/{id}', 'MailLineIntroduction\MailLineIntroductionController@delete');

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
