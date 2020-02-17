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

Route::get('403', function () {
    return view('exception.403');
})->name('403');

Auth::routes(['verify' => true]);

Route::get('/profile', 'UserController@profile')->name('profile')->middleware('verified');


Route::group(['prefix' => 'agency'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/create', 'Agency\AgencyController@create')->name('agency.create');
        Route::post('/store', 'Agency\AgencyController@store')->name('agency.store');

        Route::group(['prefix' => '/profile'], function () {
            Route::get('/', 'Agency\ProfileController@index')->name('agency.profile');
            Route::get('/{agency}', 'Agency\ProfileController@show')->name('agency.profile.show');
        });
    });

    Route::get('/', 'Agency\AgencyController@index')->name('agency');
    Route::get('/{agency}', 'Agency\AgencyController@show')->name('agency.show');
});

Route::group(['prefix' => 'agent'], function () {
    Route::get('/{agent}', 'AgentController@show')->name('agent.show');
    // TODO: сделать мидлваре на проверку причастности пользователя агенству
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/profile', 'AgentController@profile')->name('agent.profile');
        Route::get('/create', 'AgentController@create')->name('agent.create');
        Route::post('/store', 'AgentController@store')->name('agent.store');
    });
});
