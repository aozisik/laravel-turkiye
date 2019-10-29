<?php

use PHPUnit\Framework\TestCase;
use Aozisik\LaravelTurkiye\Validation\Iban;
use Aozisik\LaravelTurkiye\Rules\TcKimlikNoRule;
use Aozisik\LaravelTurkiye\Rules\TrIbanRule;
use Aozisik\LaravelTurkiye\Rules\VergiKimlikNoRule;

class ValidationTests extends TestCase
{
    /**
     * @test
     */
    public function tc_kimlik_no()
    {
        $rule = new TcKimlikNoRule();

        $this->assertRulePasses($rule, '10000000146'); // Mustafa Kemal Atatürk!
        $this->assertRulePasses($rule, '35044266730'); // Uğur Dündar?

        $this->assertRuleFails($rule, '1235');
        $this->assertRuleFails($rule, '11111111110'); // Haberlere çıkan şanssız arkadaşımızın başına daha fazla bela açılmasın...
        $this->assertRuleFails($rule, '22222222220');
        $this->assertRuleFails($rule, '33333333330');
        $this->assertRuleFails($rule, '01215141105');
        $this->assertRuleFails($rule, '34259710069');
        $this->assertRuleFails($rule, '12351232111');
        $this->assertRuleFails($rule, '63261461122');
        $this->assertRuleFails($rule, '12341232232');
        $this->assertRuleFails($rule, '342597100692');
    }

    /**
     * @test
     */
    public function vergi_kimlik_no()
    {
        $rule = new VergiKimlikNoRule();

        // Invalid
        $this->assertRuleFails($rule, 'invalid');
        $this->assertRuleFails($rule, '1710443373');
        $this->assertRuleFails($rule, '0710443371');
        // Valid
        $this->assertRulePasses($rule, '0710443373');
        $this->assertRulePasses($rule, '4780163831');
        $this->assertRulePasses($rule, '0350003022');
        $this->assertRulePasses($rule, '9980070251');
        $this->assertRulePasses($rule, '4560007243');
        $this->assertRulePasses($rule, '8730341530');
        $this->assertRulePasses($rule, '7290012773');
    }

    /**
     * @test
     */
    public function iban()
    {
        $rule = new TrIbanRule();

        $this->assertRulePasses($rule, 'TR 68 00062 0 0000222990028402');
        $this->assertRulePasses($rule, 'TR680006200000222990028402');
        // Checksum doğru değil
        //$this->assertFalse($validator->validate('TR5852 5 252 5896 585 47826'));
        // Fazla karakter
        $this->assertRuleFails($rule, 'TR5852 5 252 5896 585 447826');
        // Eksik karakter
        $this->assertRuleFails($rule, 'TR5852 5 252 5896 585 44782');
        // Türkiye değil
        $this->assertRuleFails($rule, 'DE5852 5 252 5896 585 47826');
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

    private function validateRule($rule, $value)
    {
        return $rule->passes('', $value);
    }

    private function assertRulePasses($rule, $value)
    {
        return $this->assertTrue(
            $this->validateRule($rule, $value)
        );
    }

    private function assertRuleFails($rule, $value)
    {
        return $this->assertFalse(
            $this->validateRule($rule, $value)
        );
    }
}
