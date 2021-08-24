<?php

use Illuminate\Routing\RouteGroup;
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
Route::namespace('SoftDelete')->group(function () {
    route::get('danh-sach-quan-tri.html','UserController@List')->name('list');
    route::post('them-qt','UserController@Add')->name('add');
    route::get('remove/{id}','UserController@RemoveItem')->name('remove');
    route::get('khoi-phuc/{id}','UserController@Restore')->name('restore');
    route::get('xoa-vinh-vien/{id}','UserController@PermentlyDelete')->name('permently');
});

