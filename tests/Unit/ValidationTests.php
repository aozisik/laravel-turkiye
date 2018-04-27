<?php

use PHPUnit\Framework\TestCase;
use Aozisik\LaravelTurkiye\Validation\Iban;
use Aozisik\LaravelTurkiye\Validation\TcKimlikNo;
use Aozisik\LaravelTurkiye\Validation\VergiKimlikNo;

class ValidationTests extends TestCase
{
    /**
     * @test
     */
    public function tc_kimlik_no()
    {
        $validator = new TcKimlikNo();

        $this->assertTrue($validator->validate('10000000146')); // Mustafa Kemal Atatürk!
        $this->assertTrue($validator->validate('35044266730')); // Uğur Dündar?

        $this->assertFalse($validator->validate('1235'));
        $this->assertFalse($validator->validate('11111111110')); // Haberlere çıkan şanssız arkadaşımızın başına daha fazla bela açılmasın...
        $this->assertFalse($validator->validate('22222222220'));
        $this->assertFalse($validator->validate('33333333330'));
        $this->assertFalse($validator->validate('01215141105'));
        $this->assertFalse($validator->validate('34259710069'));
        $this->assertFalse($validator->validate('12351232111'));
        $this->assertFalse($validator->validate('63261461122'));
        $this->assertFalse($validator->validate('12341232232'));
        $this->assertFalse($validator->validate('342597100692'));
    }

    private function vkn_dogrulama($value)
    {
        $validation = new VergiKimlikNo();
        return $validation->validate($value);
    }

    /**
     * @test
     */
    public function vergi_kimlik_no()
    {
        // Invalid
        $this->assertFalse($this->vkn_dogrulama('invalid'));
        $this->assertFalse($this->vkn_dogrulama('1710443373'));
        $this->assertFalse($this->vkn_dogrulama('0710443371'));
        // Valid
        $this->assertTrue($this->vkn_dogrulama('0710443373'));
        $this->assertTrue($this->vkn_dogrulama('4780163831'));
        $this->assertTrue($this->vkn_dogrulama('0350003022'));
        $this->assertTrue($this->vkn_dogrulama('9980070251'));
        $this->assertTrue($this->vkn_dogrulama('4560007243'));
        $this->assertTrue($this->vkn_dogrulama('8730341530'));
        $this->assertTrue($this->vkn_dogrulama('7290012773'));
    }

    /**
     * @test
     */
    public function iban()
    {
        $validator = new Iban();

        $this->assertTrue($validator->validate('TR 68 00062 0 0000222990028402'));
        $this->assertTrue($validator->validate('TR680006200000222990028402'));
        // Checksum doğru değil
        //$this->assertFalse($validator->validate('TR5852 5 252 5896 585 47826'));
        // Fazla karakter
        $this->assertFalse($validator->validate('TR5852 5 252 5896 585 447826'));
        // Eksik karakter
        $this->assertFalse($validator->validate('TR5852 5 252 5896 585 44782'));
        // Türkiye değil
        $this->assertFalse($validator->validate('DE5852 5 252 5896 585 47826'));
    }

    /**
     * @test
     */
    public function sabit_hat()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function cep_telefonu()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function telefon()
    {
        $this->assertTrue(true);
    }

    /**
     * @test
     */
    public function plaka()
    {
        $this->assertTrue(true);
    }
}
