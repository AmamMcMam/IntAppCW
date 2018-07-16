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

Route::get('/laravel', function () {
    return view('welcome');
});

Route::get('/', 'HomepageController@index');
Route::get('/events', 'EventController@index');
Route::get('/mostliked', 'EventController@mostLiked');
Route::get('/datesorted', 'EventController@dateSorted');
Route::get('/category/{categoryName}', 'EventController@category');
Route::get('/events/create', 'EventController@create');
Route::get('/events/organiser', 'EventController@organiser');
Route::get('/events/edit/{id}', 'EventController@edit');
Route::get('/events/{id}', 'EventController@view');
Route::post('/events', 'EventController@store');
Route::post('/update', 'EventController@update');
Route::post('/likes/{id}', 'LikeController@store');

Auth::routes();


Route::get('/home', 'HomepageController@index')->name('home');
