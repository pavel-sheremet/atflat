<?php

namespace App\Providers;

use Blade;
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

        Blade::directive('money_month', function ($sum) {
            return "<?php echo __('numbers.money.sum.per.month.with.currency', ['sum' => number_format((float)$sum, 0, '.', ' ')]); ?>";
        });

        Blade::directive('money', function ($sum) {
            return "<?php echo __('numbers.money.sum.per.single.with.currency', ['sum' => number_format((float)$sum, 0, '.', ' ')]); ?>";
        });

        Resource::withoutWrapping();
    }
}
