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

// Route::get('/', function () {
//     return view('myhomepage.home');
// });
Route::get('/', 'HomeController@index');
Route::get('/about-us', 'HomeController@aboutus');
Route::get('/test', function()
{
      return view('myaccount.test');
});

Auth::routes();

Route::get('/search', 'SearchController@index');
Route::get('/search/all', 'SearchController@all');
Route::get('/search/all/company', 'SearchController@company_all');
Route::get('/search/all/category/{category}', 'SearchController@category_all');
Route::get('/search/save/{id}', 'SearchController@save');
Route::get('/search/unsave/{id}', 'SearchController@unsave');
Route::get('/search/autocomplete', 'SearchController@autocomplete');

Route::resource('account-home','AccountHomeController');
Route::get('/close', 'AccountHomeController@close');
Route::match(array('PUT', 'PATCH'), "account-home/{account_home}/pass", array(
      'uses' => 'AccountHomeController@updatepass',
      'as' => 'account-home.updatepass'
));

// Route::match(array('GET'), "account-home/close", array(
//       'uses' => 'AccountHomeController@close',
//       'as' => 'account-home.close'
// ));



Route::match(array('POST'), "/account-home/profile", array(
      'uses' => 'AccountHomeController@update_profile',
      'as' => 'profile.update'
));


Route::resource('/company','CompaniesController');
Route::match(array('GET', 'HEAD'), "/create-company", array(
      'uses' => 'CompaniesController@index2',
      'as' => 'create-company.index2'
));
Route::match(array('POST'), "/company/profile", array(
      'uses' => 'CompaniesController@update_profile',
      'as' => 'company.profile.update'
));
Route::match(array('POST'), "/create-company", array(
      'uses' => 'CompaniesController@store_create_company',
      'as' => 'create-company.store_create_company'
));

Route::resource('/job','JobsController');

Route::resource('/detail','DetailsController');
Route::match(array('GET', 'HEAD'), "/detail/company/{company}", array(
      'uses' => 'DetailsController@show_company',
      'as' => 'detail.show.company'
));

Route::get('post/{id}/islikedbyme', 'SavesController@isLikedByMe');
Route::get('/saved', 'SavesController@index');
Route::delete('/saved/{saved}', 'SavesController@destroy');

Route::post('post/like', 'SavesController@like');

Route::resource('/admin','AdminHomeController');
Route::resource('/admin-users','AdminUsersController');
Route::match(array('POST'), "/admin-users/profile/{profile}", array(
      'uses' => 'AdminUsersController@update_profile',
      'as' => 'profile.update.admin'
));
Route::match(array('GET', 'HEAD'), "/admin-users/autocompleteusers", array(
      'uses' => 'AdminUsersController@autocompleteusers',
      'as' => 'admin.users.autocomplete'
));
Route::resource('/admin-jobs','AdminJobsController');
Route::resource('/admin-categories','AdminCategoriesController');
Route::resource('/admin-companies','AdminCompaniesController');
Route::match(array('POST'), "/admin-companies/profile/{profile}", array(
      'uses' => 'AdminCompaniesController@update_profile',
      'as' => 'company.profile.update.admin'
));
