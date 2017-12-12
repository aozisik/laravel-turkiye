<?php
namespace Aozisik\Turkiye\Turkce;

class SonHece
{
    public $sonHarfSesli;

    private $soz;
    private $sert;
    private $kalin;
    private $yuvarlak;

    private $sesliler = ['a', 'e', 'ı', 'i', 'o', 'ö', 'u', 'ü'];
    private $yuvarlakSesliler = ['o', 'ö', 'u', 'ü'];
    private $kalinSesliler = ['a', 'ı', 'u', 'o'];

    private $sertSessizler = ['f', 's', 't', 'k', 'ç', 'ş', 'h', 'p'];

    public function __construct($soz)
    {
        $soz = $this->sonSoz($soz);
        $soz = str_replace(['i', 'I'], ['İ', 'ı'], $soz);
        $soz = mb_strtolower($soz, 'UTF-8');
        $this->soz = $soz;

        $sonHarf = mb_substr($soz, -1);
        $this->sonHarfSesli = in_array($sonHarf, $this->sesliler);

        $sonSesliHarf = $this->sonSesli($soz);
        $this->sert = in_array($sonHarf, $this->sertSessizler);
        $this->kalin = in_array($sonSesliHarf, $this->kalinSesliler);
        $this->yuvarlak = in_array($sonSesliHarf, $this->yuvarlakSesliler);
    }

    private function sonSoz($soz)
    {
        $sozler = explode(' ', $soz);
        return end($sozler);
    }

    private function sonSesli($soz)
    {
        $regex = '/' . implode('|', $this->sesliler) . '/';
        preg_match_all($regex, $soz, $matches);

        if (!$matches) {
            return false;
        }

        return end($matches[0]);
    }

    public function sert()
    {
        return $this->sert;
    }

    public function yumusak()
    {
        return !$this->sert();
    }

    public function kalin()
    {
        $istisnalar = [
            'mal',
            'lal',
            'hal'
        ];
        // Kemal, Bilal, Zuhal gibi istisnalar için...
        if (in_array(substr($this->soz, -3), $istisnalar)) {
            return false;
        }
        return $this->kalin;
    }

    public function ince()
    {
        return !$this->kalin();
    }

    public function yuvarlak()
    {
        return $this->yuvarlak;
    }

    public function duz()
    {
        return !$this->yuvarlak();
    }
}
