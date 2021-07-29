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

// Route::get('/', function () {
//     return view('welcome');
// })->name("top");

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

Route::get("/", "ItemsController@showItems")->name("top");

// 仮のルート
Route::get('items/{item}',"ItemsController@showItemDetail")->name('item');

Route::group(["prefix" => "mypage", "middleware" => "auth", "namespace" => "Mypage"], function(){
    Route::get("edit-profile", "ProfileController@showProfileEditForm")->name("mypage.edit-profile");
    Route::post("edit-profile", "ProfileController@editProfile")->name("mypage.edit-profile");
    Route::get("sold-items", "SoldItemsController@showSoldItems")->name("mypage.sold-items");

});

Route::group(["middleware" => "auth"], function(){
    Route::get("sell", "SellController@showSellForm")->name("sell");
    Route::post("sell", "SellController@sellItem")->name("sell");
    Route::get('items/{item}/buy', function () { return "商品購入画面";})->name('item.buy');
});




