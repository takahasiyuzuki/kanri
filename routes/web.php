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
    return view('welcome');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//Route::get('/mypage', 'HomeController@mypage')->name('mypage');

//Auth::routes();

// mypageのルート
Route::get('/home', 'HomeController@index')->name('mypage');
Route::get('/mypage/crate', 'HomeController@crate')->name('crate');
Route::post('/mypage/crate', 'HomeController@crate')->name('crate');

// mypage2のルート
Route::get('/mypage2', 'MypagesController@mypage2')->name('mypage2');
Route::get('/crate', 'MypagesController@crate')->name('crate');
Route::post('/crate', 'MypagesController@crate')->name('crate');
Route::get('/mypage', 'HomeController@index')->name('mypage');

// mypage3のルート
Route::get('/mypage3', 'MypagesController@mypage3')->name('mypage2');
Route::get('/crate', 'MypagesController@crate')->name('crate');
Route::post('/crate', 'MypagesController@crate')->name('crate');
Route::get('/mypage', 'HomeController@index')->name('mypage');

// mypage4のルート
Route::get('/mypage4', 'MypagesController@mypage4')->name('mypage4');
Route::get('/crate', 'MypagesController@crate')->name('crate');
Route::post('/crate', 'MypagesController@crate')->name('crate');
Route::get('/mypage', 'HomeController@index')->name('mypage');

// 編集
Route::get('/edit/{id}', 'MypagesController@showEdit')->name('edit');
Route::post('/update', 'MypagesController@exeUpdate')->name('update');

// 削除
Route::post('/delete/{id}', 'MypagesController@exeDelete')->name('delete');

//検索
Route::get('/search', 'MypagesController@search')->name('search');
Route::post('/search', 'MypagesController@search')->name('search');

//Auth::routes();