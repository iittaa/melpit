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
})->name("top");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(["prefix" => "mypage", "middleware" => "auth", "namespace" => "Mypage"], function(){
    Route::get("edit-profile", "ProfileController@showProfileEditForm")->name("mypage.edit-profile");
    Route::post("edit-profile", "ProfileController@editProfile")->name("mypage.edit-profile");
});

Route::group(["middleware" => "auth"], function(){
    Route::get("/sell", "SellController@showSellForm")->name("sell");
    Route::post("/sell", "SellController@sellItem")->name("sell");
});


