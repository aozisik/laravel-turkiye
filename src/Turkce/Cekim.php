<?php
namespace Aozisik\Turkiye\Turkce;

class Cekim
{
    private $ek;
    private $soz;
    private $sonHece;
    private $kaynastirma;

    public function __construct($soz)
    {
        $this->soz = $soz;
        $this->sonHece = new SonHece($soz);
    }

    public static function yeni($soz)
    {
        return new self($soz);
    }

    public function kaynastirma($harf)
    {
        $this->kaynastirma = $harf;
        return $this;
    }

    public function kural($kosullar, $ek)
    {
        $kosullar = explode(',', $kosullar);
        foreach ($kosullar as $kosul) {
            if (!$this->sonHece->$kosul()) {
                // Bir koşul sağlanmadığında bitir.
                return $this;
            }
        }
        $this->ek = $ek;
        return $this;
    }

    public function sonuc()
    {
        $sonuc = $this->soz . '\'';

        if ($this->kaynastirma && $this->sonHece->sonHarfSesli) {
            $sonuc .= $this->kaynastirma;
        }

        return $sonuc .= $this->ek;
    }
}
