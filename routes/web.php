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

//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/','IndexController@create');       //添加页面
Route::any('check','IndexController@check');
Route::post('addad','IndexController@addad');   //添加执行
Route::get('list','IndexController@list');      //列表


Route::prefix('12306')->group(function () {
    Route::get('index','TrainController@index');
    Route::get('init','TrainController@init');
});

Route::prefix('kaoshi')->group(function(){
    Route::get('index','KaoshiController@index');
    Route::post('login','KaoshiController@login');
      Route::middleware(['kk'])->group(function(){
        Route::get('create','KaoshiController@create');
        Route::post('adddiaoyan','KaoshiController@adddiaoyan');
    });
});
Route::get('index','jingcaicontroller@index');
Route::post('addqiudui','jingcaicontroller@addqiudui');
Route::get('jingcailist','jingcaicontroller@jingcailist');
Route::get('canyu','jingcaicontroller@canyu');
Route::post('jingcaidd','jingcaicontroller@jingcaidd');
Route::get('chengj','jingcaicontroller@chengj');
Route::get('kongzhi','jingcaicontroller@kongzhi');
Route::post('kongzhido','jingcaicontroller@kongzhido');
