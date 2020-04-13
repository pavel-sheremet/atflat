<?php

namespace App\Providers;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('max_mb', function ($attribute, $value, $parameters, $validator) {
            if ($value instanceof UploadedFile && ! $value->isValid()) return false;

            return $value->getSize()/1024/1024 <= $parameters[0];
        });

        Validator::replacer('max_mb', function ($message, $attribute, $rule, $parameters) {
            return str_replace(':' . $rule, $parameters[0], $message);
        });

        Resource::withoutWrapping();
    }
}
