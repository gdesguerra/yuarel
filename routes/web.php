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

Route::get('/dashboard',					'DashboardController@index')->name('dashboard');

Route::get('/terms',						function () { return view('pages.terms'); });
Route::get('/privacy',						function () { return view('pages.privacy'); });

Route::get('/',								'ShortUrlController@create')->name('ShortUrl.create');
Route::post('/short-url',					'ShortUrlController@store')->name('ShortUrl.store');
Route::delete('/short-url/{id}',				'ShortUrlController@destroy')->name('ShortUrl.destroy');
Route::get('/{codeOrAlias}',				'ShortUrlController@show')->name('ShortUrl.show');

Route::get('/{codeOrAlias}/preview',		'PreviewController@show')->name('Preview.show');