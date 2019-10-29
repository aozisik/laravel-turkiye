<?php

use Aozisik\LaravelTurkiye\Providers\TurkiyeServiceProvider;
use App\Console\Kernel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Testing\TestCase;

class LaravelTests extends TestCase
{
    public function createApplication()
    {
        $app = require __DIR__ . '/../../vendor/laravel/laravel/bootstrap/app.php';

        $provider = new TurkiyeServiceProvider($app);
        $app->make(Kernel::class)->bootstrap();
        $provider->boot();

        return $app;
    }

    /** @test */
    public function it_registers_tckn_rule()
    {
        $data = [
            'tckn' => '1'
        ];

        $validator = Validator::make($data, ['tckn' => 'tckn']);
        $this->assertFalse($validator->passes());
    }

    /** @test */
    public function it_registers_vkn_rule()
    {
        $data = [
            'vkn' => '1'
        ];

        $validator = Validator::make($data, ['vkn' => 'vkn']);
        $this->assertFalse($validator->passes());
    }

    /** @test */
    public function it_registers_tr_iban_rule()
    {
        $data = [
            'tr_iban' => '1'
        ];

        $validator = Validator::make($data, ['tr_iban' => 'tr_iban']);
        $this->assertFalse($validator->passes());
    }
}
