<?php
namespace Aozisik\Turkiye\Turkce;

class Ek
{
    private $soz;
    private $sonHece;

    public function __construct($soz)
    {
        $this->soz = $soz;
        $this->sonHece = new SonHece($soz);
    }

    public function i()
    {
        return $this->cekimle('i', 'y');
    }

    public function e()
    {
        return $this->soz . 'e';
    }

    public function de()
    {
        return $this->soz . 'de';
    }

    public function den()
    {
        return $this->soz . 'den';
    }

    public function in()
    {
        return $this->soz . 'in';
    }

    private function cekimle($ek, $kaynastirma)
    {
        $cikti = $this->soz . '\'';

        if ($this->sonHece->sonHarfSesli) {
            $cikti .= $kaynastirma;
        }

        return $this->soz . '\'' . $ek;
    }
}
