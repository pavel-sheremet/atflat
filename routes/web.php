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

Route::prefix('agency')->group(function () {
    Route::get('/', 'AgencyController@index')->name('agency');
    Route::get('/{agency}', 'AgencyController@show')->name('agency.show');
});

Route::group([
    'prefix' => 'agent',
    'middleware' => ['auth']
], function () {
    Route::get('/profile', 'AgentController@profile')
        ->middleware('is.agent')
        ->name('agent.profile');
    Route::get('/create', 'AgentController@create')->name('agent.create');
    Route::post('/store', 'AgentController@store')->name('agent.store');
});
