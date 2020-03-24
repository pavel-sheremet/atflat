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
//    $realty = \App\Realty::with('metro')->find(101);
//    dd($realty->delete());
//
//    dd($realty);
//    $realty = \App\Realty::find(1);
//
//    $file = new \App\File();
//    $file->bytes = 1;
//    $file->public_id = rand();
//    $file->mime_type = 1;
//    $file->extension = 1;
//    $file->disk = 1;
//    $file->path = 1;
//    $file->fileable()->associate($realty);
//    $file->save();
//
//    dd($realty->file);
//    factory(\App\File::class, 1)
//        ->make()
//        ->each(function ($faker) {
//            $file = new \App\File();
//            $file->name = $faker->name;
//            $file->save();
//        });

//    $faker = new \Faker\Generator();
//    $faker->image();

//    $agency = \App\Agency::withCount('realty')
//        ->with('realty', 'owner')
//        ->orderBy('realty_count', 'desc')
//        ->first();

//    Auth::loginUsingId($agency->owner->id, true);




    return view('welcome');
})->name('welcome');

Route::get('403', function () {
    return view('exception.403');
})->name('403');

Auth::routes(['verify' => true]);


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
