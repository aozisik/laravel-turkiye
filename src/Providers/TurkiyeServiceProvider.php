<?php
namespace Aozisik\LaravelTurkiye\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

class TurkiyeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'turkiye');

        Validator::extend('tckn', '\Aozisik\LaravelTurkiye\Rules\TcKimlikNoRule@passes');
        Validator::extend('vkn', '\Aozisik\LaravelTurkiye\Rules\VergiKimlikNoRule@passes');
        Validator::extend('tr_iban', '\Aozisik\LaravelTurkiye\Rules\TrIbanRule@passes');
    }
}
