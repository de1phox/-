<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//use App\Http\Controllers\NewsController; //мне такое вроде не нужно

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// *** Главный контроллер - некоторые общие страницы (MainController)
// Главная страница
Route::get('/', 'App\Http\Controllers\MainController@Index')->name('index');

Route::get('/categories', 'App\Http\Controllers\MainController@categories')->name('categories');
Route::get('/categories/{category}', 'App\Http\Controllers\MainController@category')->name('category');
Route::get('/products/{product}', 'App\Http\Controllers\MainController@product')->name('product');

Route::get('/basket', 'App\Http\Controllers\BasketController@basket')->name('basket');
Route::get('/basket/place', 'App\Http\Controllers\BasketController@basketPlace')->name('basket-place');
Route::post('/basket/add/{id}', 'App\Http\Controllers\BasketController@basketAdd')->name('basket-add');
Route::post('/basket/remove/{id}', 'App\Http\Controllers\BasketController@basketRemove')->name('basket-remove');
Route::post('/basket/place', 'App\Http\Controllers\BasketController@basketConfirm')->name('basket-confirm');

Auth::routes();
Route::get('/logout', 'App\Http\Controllers\Auth\LoginController@logout')->name('get-logout');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home/{order}', [App\Http\Controllers\HomeController::class, 'order'])->name('order');

Route::group([
    //'middleware' => 'auth',
    'prefix' => 'admin',
], function () {
    Route::group(['middleware' => 'admin'], function () {
        Route::get('/orders', 'App\Http\Controllers\Admin\OrderController@index')->name('orders');
        Route::get('/orders/{order}', 'App\Http\Controllers\Admin\OrderController@show')->name('orders-show');

        Route::resource('categories', 'App\Http\Controllers\Admin\CategoryController');
        Route::resource('plants', 'App\Http\Controllers\Admin\PlantController');
    });

});

