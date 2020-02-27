<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/block', function (Request $request) {
    return $request->block();
});


Route::get('get_all_contacts', 'UsersController@get_all_contacts');

Route::delete('delete_all_contacts', 'UsersController@delete_all_contacts');

Route::delete('delete_contact_by_id/{id}', 'UsersController@delete_contact_by_id');

Route::post('create_contact', 'UsersController@create_contact');

Route::put('update_contact/{id}', 'UsersController@update_contact');

Route::get('get_detail/{id}','UsersController@getDetail');

Route::get('deleteAll','UsersController@deleteData');

Route::post('create_favorite/{id}','UsersController@create_favorite');

Route::get('get_all_favorite', 'UsersController@get_all_favorite');

Route::delete('unfavorite_contact_by_id/{id}', 'UsersController@unfavorite_contact_by_id');

Route::delete('unblock_contact_by_id/{id}', 'UsersController@unblock_contact_by_id');

Route::post('create_block/{id}','UsersController@create_block');

Route::get('get_all_block', 'UsersController@get_all_block');