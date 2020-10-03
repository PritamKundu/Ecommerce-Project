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
Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');

//Ctaegory Section
Route::group(['prefix' => '/categories'], function(){
Route::get('/manage', 'Backend\CategoryController@index')->name('managecategories');
//show create category
Route::get('/create', 'Backend\CategoryController@create')->name('createcategories');
Route::post('/create', 'Backend\CategoryController@store')->name('storecategories');
//show edit category & update
Route::get('/edit/{id}', 'Backend\CategoryController@edit')->name('editcategories');
Route::post('/edit/{id}', 'Backend\CategoryController@update')->name('updatecategories');
//Delete category
Route::post('/delete/{id}', 'Backend\CategoryController@destroy')->name('deletecategories');
});

//Brand Section
Route::group(['prefix' => '/brand'], function(){
Route::get('/manage', 'Backend\BrandController@index')->name('managebrands');
//show create category
Route::get('/create', 'Backend\BrandController@create')->name('createbrands');
Route::post('/create', 'Backend\BrandController@store')->name('storebrands');
//show edit category & update
Route::get('/edit/{id}', 'Backend\BrandController@edit')->name('editbrands');
Route::post('/edit/{id}', 'Backend\BrandController@update')->name('updatebrands');
//Delete category
Route::post('/delete/{id}', 'Backend\BrandController@destroy')->name('deletebrands');

});

//product Section
Route::group(['prefix' => '/product'], function(){
Route::get('/manage', 'Backend\ProductController@index')->name('manageproducts');
//show create category
Route::get('/create', 'Backend\ProductController@create')->name('createproducts');
Route::post('/create', 'Backend\ProductController@store')->name('storeproducts');
//show edit category & update
Route::get('/edit/{id}', 'Backend\ProductController@edit')->name('editproducts');
Route::post('/edit/{id}', 'Backend\ProductController@update')->name('updateproducts');
//Delete category
Route::post('/delete/{id}', 'Backend\ProductController@destroy')->name('deleteproducts');

});
