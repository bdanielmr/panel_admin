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

Route::get('/', function () {
    return view('welcome');
});

 //Home



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', 'Auth\LoginController@logout', function () {
    return abort(404);
});

Route::middleware(['auth', 'admin'])->group(function () {
        //Logout




        //ProductType

        Route::get('/producttypes', 'ProductTypeController@index');
        Route::get('/producttypes/create', 'ProductTypeController@create'); //form register
        Route::get('/producttypes/{producttype}/edit', 'ProductTypeController@edit');

        //

        Route::get('logout', 'Auth\LoginController@logout', function () {
            return abort(404);
        });

        //

        Route::post('/producttypes', 'ProductTypeController@store'); //form send

        Route::put('/producttypes/{producttype}', 'ProductTypeController@update');
        Route::delete('/producttypes/{producttype}', 'ProductTypeController@destroy');


        //agents
        Route::resource('agents', 'AgentController');


        //local agent sales
        Route::resource('localsales', 'LocalSaleController');

        //regional agent sales
        Route::resource('regionalsales', 'RegionalSaleController');
});


