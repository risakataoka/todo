<?php

use Illuminate\Support\Facades\Auth;
use App\Day;
use App\Want;
use App\Dotask;
use App\Objective;


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
//トップページ遷移
/*Route::get('/', function () {
    return view('top');
});*/

Route::get('/', 'TopController@top');

//Route::get('top', 'TopController@top');

Auth::routes();

//ログインページ、新規登録ページ遷移
Route::get('auth/login', 'AdminController@login');
Route::get('auth/register', 'AdminController@register');

//ログイン後ページ遷移
Route::get('home', 'HomeController@index')->name('home');
Route::get('mypage', 'HomeController@mypage');

//アイテム追加ページ遷移
Route::get('additem/day', 'HomeController@dayAdd');
Route::post('home/dayItemAdd', 'HomeController@dayItemAdd');

Route::get('additem/want', 'HomeController@wantAdd');
Route::post('home/wantItemAdd', 'HomeController@wantItemAdd');

Route::get('additem/do', 'HomeController@doAdd');
Route::post('home/doItemAdd', 'HomeController@doItemAdd');

Route::get('additem/objective', 'HomeController@objectiveAdd');
Route::post('home/objectiveItemAdd', 'HomeController@objectiveItemAdd');

//アイテム削除
Route::delete('/home/day/{day}', 'HomeController@dayItemDelete');
Route::delete('/home/want/{want}', 'HomeController@wantItemDelete');
Route::delete('/home/do/{dotask}', 'HomeController@doItemDelete');
Route::delete('/home/objective/{objective}', 'HomeController@objectiveItemDelete');
