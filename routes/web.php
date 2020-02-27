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

Route::get('/', function () {
    return view('contact-detail');
});

Route::get('/list', function () {
        return view('list-contact');
});

Route::get('/new', function () {
    return view('contact-new');
});

Route::get('/contact', function () {
    return view('favorite');

});
Route::get('/detail/{id}',function(){
    return view('detail_contact');
});

Route::get('/favorite', function () {
    return view('favorite');
});

Route::get('/edit/{id}', function () {
    return view('edit_contact');
});

Route::delete('/favorite', function () {
    return view('unfavorite');
});

Route::get('/block', function () {
    return view('block');
});

Route::delete('/block', function () {
    return view('unblock');
});