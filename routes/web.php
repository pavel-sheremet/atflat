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


Route::group(['prefix' => 'agency'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/create', 'Agency\AgencyController@create')->name('agency.create');
        Route::post('/store', 'Agency\AgencyController@store')->name('agency.store');
    });

    Route::get('/', 'Agency\AgencyController@index')->name('agency')->middleware('clear.filter');
    Route::get('/{agency}', 'Agency\AgencyController@show')->name('agency.show');
});

Route::group(['prefix' => 'agent'], function () {
    Route::group(['middleware' => ['auth']], function () {


        Route::get('/create', 'Agent\AgentController@create')->name('agent.create');
        Route::post('/store', 'Agent\AgentController@store')->name('agent.store');
    });

    Route::get('/', 'Agent\AgentController@index')->name('agent')->middleware('clear.filter');
    Route::get('/{agent}', 'Agent\AgentController@show')->name('agent.show');
});

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {
    Route::get('/', 'UserController@profile')->name('profile')->middleware('verified');

    Route::group(['prefix' => '/agency'], function () {
        Route::get('/', 'Agency\ProfileController@index')->name('profile.agency');

        Route::group(['prefix' => '/{agency}'], function () {
            Route::get('/', 'Agency\ProfileController@show')->name('profile.agency.show');
        });
    });

    Route::group(['prefix' => '/agent'], function () {
        Route::get('/', 'Agent\ProfileController@index')->name('profile.agent');

    });


//        Route::group(['prefix' => '/agent'], function () {
//            Route::get('/', 'Agency\Agent\ProfileController@index')->name('profile.agency.agent');
//        });


});
