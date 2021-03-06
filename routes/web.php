<?php

use Illuminate\Support\Facades\Route;
use App\Helpers\LocaleHelper;

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
    return redirect('/'. config('app.locale'));
});

Route::group(['prefix' => LocaleHelper::getLocale(), 'middleware' => 'LocaleMiddleware'], function () {

    Auth::routes();

    //главная страница
    Route::get('/', 'HomeController@index')->name('home');

    //страница новости
    Route::get('/article/{id}', 'HomeController@article')->name('article');

    //страница новостей категории
    Route::get('/category/{id}', 'HomeController@category')->name('category');

    //страница со списком(не доделано)
    Route::get('/list/{type}', 'HomeController@list')->name('list');

    //страница с информацией о пользователе
    Route::get('/user/{id}', 'UserController@userInfo')->name('userInfo');

    //админка
    Route::group(['namespace' => 'Admin', 'middleware' => ['auth', 'AdminAccess'], 'prefix' => '/admin'], function () {
        Route::get('/', 'IndexController@index')->name('admin.index');
        Route::resource('articles', 'ArticlesController')->except(['create']);
        Route::resource('categories', 'CategoriesController')->except(['create']);
        Route::resource('users', 'UsersController')->except(['create']);
        Route::resource('usergroups', 'UserGroupsController')->except(['create']);
    });
});



