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

Route::get('/', 'PageController@home');
Route::get('/search', 'PageController@search');
Route::get('/locations', 'PageController@locations');
Route::get('/donors', 'PageController@donors');
Route::get('/about', 'PageController@about');
Route::get('/resources', 'PageController@resources');


Route::get('/donor/{id}/get_email', 'DonorController@getEmail');
Route::get('/donor/{id}/details', 'PageController@donor_details');
Route::get('/donor/{id}/complete', 'PageController@complete');
Route::get('/confirm/{hash}', 'PageController@confirmed');
Route::get('/donor/edit/{hash}', 'PageController@donor_edit');


Route::get('/donor/new', 'PageController@new_donor');
Route::post('/donor/new/submit', 'DonorController@new_donor');
Route::post('/donor/update', 'DonorController@updateDonor');
