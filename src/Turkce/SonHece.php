<?php
namespace Aozisik\Turkiye\Turkce;

class SonHece
{
    public $sonHarfSesli;

    public $sonSesliDar;
    public $sonSesliInce;
    public $sonSesliGenis;
    public $sonSesliKalin;


    private $sesliler = ['a', 'e', 'ı', 'i', 'o', 'ö', 'u', 'ü'];

    public function __construct($soz)
    {
        $soz = str_replace(['i', 'I'], ['İ', 'ı'], $soz);
        $soz = strtolower($soz);
    }

    private function sonSesli()
    {
    }
}
