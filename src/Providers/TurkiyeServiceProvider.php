<?php
namespace Aozisik\LaravelTurkiye\Providers;

use Aozisik\Turkiye\Validation\Iban;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Aozisik\LaravelTurkiye\Validation\TcKimlikNo;
use Aozisik\LaravelTurkiye\Validation\VergiKimlikNo;

class TurkiyeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('tckn', function ($attribute, $value, $parameters, $validator) {
            return (new TcKimlikNo())->validate($value);
        });

        Validator::extend('vkn', function ($attribute, $value, $parameters, $validator) {
            return (new VergiKimlikNo())->validate($value);
        });

        Validator::extend('tr_iban', function ($attribute, $value, $parameters, $validator) {
            return (new Iban())->validate($value);
        });
    }
}
