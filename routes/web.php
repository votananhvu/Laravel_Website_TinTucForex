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

Route::get('/', 'App\Http\Controllers\FrontController@index');

/*------------ ROUTE LOGIN-------------*/

/*------------------------------------*/

/*------------ ADMIN --------------*/
Route::group(['prefix'=>'admin','middleware'=>'auth'], function () {
    //page admin
    Route::get('/', function() {
        return redirect('/login');
    });
    // Route::get('/home', 'App\Http\Controllers\BackController@home');
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    //Staff manangement
    Route::group(['prefix'=>'staff'], function () {
        Route::get('list', 'App\Http\Controllers\BackController@staff_list');
        Route::get('/profile', 'App\Http\Controllers\BackController@staff_profile');
        Route::post('/profile', 'App\Http\Controllers\BackController@staff_profile_post');
        Route::get('add', 'App\Http\Controllers\BackController@staff_add');
        Route::post('add', 'App\Http\Controllers\BackController@staff_add_post');
        Route::get('edit/{id}', 'App\Http\Controllers\BackController@staff_edit');
        Route::post('edit/{id}', 'App\Http\Controllers\BackController@staff_edit_post');
        Route::get('delete/{id}', 'App\Http\Controllers\BackController@staff_delete');
        Route::post('filter', 'App\Http\Controllers\BackController@staff_filter');
    });
    //System mananger
    Route::get('system', 'App\Http\Controllers\BackController@system');
    Route::post('system', 'App\Http\Controllers\BackController@system_post');
    //Page
    Route::group(['prefix'=>'page'], function() {
        Route::get('list', 'App\Http\Controllers\BackController@page_list');
        Route::get('edit/{id}', 'App\Http\Controllers\BackController@page_edit');
        Route::post('edit/{id}', 'App\Http\Controllers\BackController@page_edit_post');
    });
    //Social mananger
    Route::group(['prefix'=>'social'], function() {
        Route::get('list', 'App\Http\Controllers\BackController@social_list');
        Route::get('edit/{id}', 'App\Http\Controllers\BackController@social_edit');
        Route::post('edit/{id}', 'App\Http\Controllers\BackController@social_edit_post');

    });
    //Newsletter mananger
    Route::group(['prefix'=>'newsletter'], function() {
        Route::get('list', 'App\Http\Controllers\BackController@newsletter_list');
        Route::get('edit/{id}', 'App\Http\Controllers\BackController@newsletter_edit');
        Route::post('edit/{id}', 'App\Http\Controllers\BackController@newsletter_edit_post');
        Route::get('delete/{id}', 'App\Http\Controllers\BackController@newsletter_delete');
    });
    //Contact mananger
    Route::group(['prefix'=>'contact'], function() {
        Route::get('list', 'App\Http\Controllers\BackController@contact_list');
        Route::get('edit/{id}', 'App\Http\Controllers\BackController@contact_edit');
        Route::post('edit/{id}', 'App\Http\Controllers\BackController@contact_edit_post');
        Route::get('delete/{id}', 'App\Http\Controllers\BackController@contact_delete');
    });
    //Category mananger
    Route::group(['prefix'=>'category'], function() {
        Route::get('list', 'App\Http\Controllers\BackController@category_list');
        Route::get('add', 'App\Http\Controllers\BackController@category_add');
        Route::post('add', 'App\Http\Controllers\BackController@category_add_post');
        Route::get('edit/{id}', 'App\Http\Controllers\BackController@category_edit');
        Route::post('edit/{id}', 'App\Http\Controllers\BackController@category_edit_post');
        Route::get('delete/{id}', 'App\Http\Controllers\BackController@category_delete');
    });
    //News mananger
    Route::group(['prefix'=>'news'], function() {
        Route::get('list', 'App\Http\Controllers\BackController@news_list');
        Route::get('add', 'App\Http\Controllers\BackController@news_add');
        Route::post('add', 'App\Http\Controllers\BackController@news_add_post');
        Route::get('edit/{id}', 'App\Http\Controllers\BackController@news_edit');
        Route::post('edit/{id}', 'App\Http\Controllers\BackController@news_edit_post');
        Route::get('delete/{id}', 'App\Http\Controllers\BackController@news_delete');
        Route::post('sort/{id}', 'App\Http\Controllers\BackController@category_update_sort');
    });

});

/*------------ ADMIN --------------*/

/*------------ CLIENT --------------*/
// Route::get('/{url}', 'App\Http\Controllers\FrontController@page');
Route::get('about-me', 'App\Http\Controllers\FrontController@about');
Route::get('lich-kinh-te', 'App\Http\Controllers\FrontController@lichKinhTe');
Route::get('mo-tai-khoan-forex', 'App\Http\Controllers\FrontController@motaikhoanforex');
Route::get('brokers-uy-tin', 'App\Http\Controllers\FrontController@broker');
Route::get('huong-dan-dau-tu-forex', 'App\Http\Controllers\FrontController@huongdandautuforex');
Route::get('bai-viet/{url}', 'App\Http\Controllers\FrontController@news_detail');
Route::get('category/{url}', 'App\Http\Controllers\FrontController@news_blog');
Route::get('search', 'App\Http\Controllers\FrontController@news_search');
/*------------ CLIENT --------------*/

Auth::routes();

// Route::get('/admin/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});
