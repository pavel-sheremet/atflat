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
    $files = Auth::user()->files()->unused()->get()->each(function ($item) {
        $item->delete();
    });

    dd($files);

    return view('welcome');
})->name('welcome');

Route::get('403', function () {
    return view('exception.403');
})->name('403');

Auth::routes(['verify' => true]);

Route::group(['prefix' => '/file'], function () {
//    Route::post('/store', 'FileController@store')->name('file.store');
    Route::post('/upload', 'FileController@upload')->name('file.upload');
    Route::post('/destroy', 'FileController@destroy')->name('file.destroy');
});

Route::group(['prefix' => '/agency'], function () {
    Route::group(['middleware' => ['auth']], function () {
        Route::get('/create', 'Agency\AgencyController@create')->name('agency.create');
        Route::post('/store', 'Agency\AgencyController@store')->name('agency.store');
    });

    Route::get('/', 'Agency\AgencyController@index')
        ->name('agency')
        ->middleware('clear.filter');
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

Route::group(['prefix' => '/api'], function () {
    Route::group(['prefix' => '/route'], function () {
        Route::post('/create', 'API\RealtyController@create')->name('api.realty.create');
        Route::post('/store', 'API\RealtyController@store')->name('api.realty.store')->middleware('auth');
        Route::post('/edit/{realty}', 'API\RealtyController@edit')->middleware('auth')->name('api.realty.edit');
        Route::post('/update/{realty}', 'API\RealtyController@update')->middleware('auth')->name('api.realty.update');

    });
});

Route::group(['prefix' => '/realty'], function () {
    Route::get('/', 'RealtyController@index')->name('realty')->middleware('clear.filter');

    Route::get('/create', 'RealtyController@create')->middleware('auth')->name('realty.create');
    Route::get('/edit/{realty}', 'RealtyController@edit')->middleware('auth')->name('realty.edit');
    Route::get('/{realty}', 'RealtyController@show')->name('realty.show');
});

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {
    Route::get('/', 'UserController@profile')->name('profile')->middleware('verified');

    Route::group(['prefix' => '/agency'], function () {
        Route::get('/', 'Agency\ProfileController@index')->name('profile.agency');

        Route::group(['prefix' => '/{agency}'], function () {
            Route::get('/', 'Agency\ProfileController@show')->name('profile.agency.show');

            Route::group(['prefix' => 'realty'], function () {
                Route::get('/', 'Agency\Realty\ProfileController@index')->name('profile.agency.realty')->middleware('clear.filter');
                Route::get('/create', 'Agency\Realty\ProfileController@create')->name('profile.agency.realty.create');



                Route::get('/{realty}', 'Agency\Realty\ProfileController@show')->name('profile.agency.realty.show');
            });
        });
    });

    Route::group(['prefix' => '/agent'], function () {
        Route::get('/', 'Agent\ProfileController@index')->name('profile.agent');

    });
});
