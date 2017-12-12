<?php

use PHPUnit\Framework\TestCase;
use Aozisik\Turkiye\Validation\TcKimlikNo;
use Aozisik\Turkiye\Validation\VergiKimlikNo;

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
        $this->assertTrue(true);
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
