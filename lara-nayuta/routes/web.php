<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/timeline', 'PostController@showTimelinePage')->name('timeline');
Route::post('/timeline', 'PostController@postContent');

Route::get('/timeline/delete/{id}', 'PostController@destroy')->name('destroy');
//⬆︎このURLが@で指定したdestroy関数に渡される。nameのdestroyはtimeline.blade.phpのformのaction="{{ route('destroy'のこと。

Route::get ('/user/showProfile/{id}', 'UserController@showProfile')->name('showProfile');

// いいね作成
Route::get('posts/{post_id}/likes','LikeController@store');
// いいね取り消し
Route::get('likes/{like_id}','LikeController@destroy');

