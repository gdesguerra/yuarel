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

Auth::routes();

Route::get('/account/settings',			'UserController@edit')->name('user.edit');
Route::put('/account',					'UserController@update')->name('user.update');

Route::get('/dashboard',				'DashboardController@index')->name('dashboard');

Route::get('/terms',					function () { return view('pages.terms'); });
Route::get('/privacy',					function () { return view('pages.privacy'); });

Route::get('/',							'ShortUrlController@create')->name('short_url.create');
Route::post('/short-url',				'ShortUrlController@store')->name('short_url.store')
											->middleware('prepend_http');
Route::delete('/short-url/{id}',		'ShortUrlController@destroy')->name('short_url.destroy');
Route::get('/{codeOrAlias}',			'ShortUrlController@show')->name('short_url.show');

Route::get('/{codeOrAlias}/preview',	'PreviewController@show')->name('preview.show');