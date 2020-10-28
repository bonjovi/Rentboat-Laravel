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
// });

Route::get('/', 'MainController@index')->name('mainpage.index');
#Route::get('/catalog', 'MainController@catalog');

Route::get('/search', 'BoatController@search')->name('boats.search');
Route::get('/catalog', 'BoatController@index')->name('boats.index');
Route::post('/catalog/store', 'BoatController@store')->name('boats.store');
Route::get('/catalog/{slug}', 'BoatController@boat')->name('boats.boat');


Route::get('/catalog/type/{slug}', 'BoatController@type')->name('boats.type');

Route::get('/catalog/category/{slug}', 'CatalogController@category')->name('catalog.category');
//Route::get('/catalog/type/{slug}', 'CatalogController@type')->name('catalog.type');
Route::get('/catalog/city/{slug}', 'CatalogController@city')->name('catalog.city');

Route::get('/product', 'MainController@product');

Route::get('/blog/search', 'PostController@search')->name('blog.search');
Route::get('/blog', 'PostController@index')->name('blog.posts');
Route::get('/blog/tag/{slug}', 'PostController@postsbytag')->name('blog.postsbytag');
Route::get('/blog/{slug}', 'PostController@post')->name('blog.post');




Route::middleware('auth')->group(function () {
    Route::get('/account/edit', 'UserController@edit')->name('account.edit');
    #Route::patch('/my-profile', 'UsersController@update')->name('users.update');
    #Route::get('/my-orders', 'OrdersController@index')->name('orders.index');
    #Route::get('/my-orders/{order}', 'OrdersController@show')->name('orders.show');
});

Auth::routes();





#Route::get('login', ['as' => 'auth.login', 'uses' => 'Auth\AuthController@showLoginForm'])->with('success', 'Регистрация на сайте прошла успешно');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
