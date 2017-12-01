<?php
namespace Aozisik\Turkiye\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Aozisik\Turkiye\Validation\TcKimlikNo;

class TurkiyeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('tckn', function ($attribute, $value, $parameters, $validator) {
            return (new TcKimlikNo())->validate($value);
        });
    }
}
