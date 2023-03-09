<?php

use App\Http\Controllers\EmployeeController;
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

Route::group(['namespace' => 'App\Http\Controllers'],function(){
    Route::get('/', 'HomeController@index')->name('home.index');

    Route::group(['middleware'=> ['guest']], function(){
        //register
        Route::get('/register','RegisterController@show')->name('register.show');
        Route::post('/register','RegisterController@register')->name('register.registration');
        Route::get('/login','LoginController@show')->name('login.show');
        Route::post('/login','LoginController@login')->name('login.loginUser');
    });

    Route::group(['middleware'=> ['auth']], function(){
        Route::get('/logout','LogoutController@logout')->name('logout');
        Route::resource('/branch',BranchController::class);
        Route::resource('/employee',EmployeeController::class);
    });



});
