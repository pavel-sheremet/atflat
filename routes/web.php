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
})->name('welcome');

Auth::routes(['verify' => true]);

Route::get('/profile', 'UserController@profile')->name('profile')->middleware('verified');


Route::group(['prefix' => 'agency'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/create', 'AgencyController@create')->name('agency.create');
        Route::get('/profile', 'AgencyController@profile')->name('agency.profile');
        Route::get('/profile/{agency}', 'AgencyController@profileShow')->name('agency.profile.show');
    });

    Route::get('/', 'AgencyController@index')->name('agency');
    Route::get('/{agency}', 'AgencyController@show')->name('agency.show');
});

Route::group(['prefix' => 'agent'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profile', 'AgentController@profile')->name('agent.profile')->middleware('is.agent');
        Route::get('/create', 'AgentController@create')->name('agent.create');
        Route::post('/store', 'AgentController@store')->name('agent.store');
    });
});
