<?php
namespace Aozisik\Turkiye\Turkce;

class Ek
{
    private $soz;
    private $sonHece;

    public function __construct($soz)
    {
        $this->soz = $soz;
    }

    public function i()
    {
        return Cekim::yeni($this->soz)
            ->kaynastirma('y')
            ->kural('duz,ince', 'i')
            ->kural('duz,kalin', 'ı')
            ->kural('yuvarlak,ince', 'ü')
            ->kural('yuvarlak,kalin', 'u')
            ->sonuc();
    }

    public function in()
    {
        return Cekim::yeni($this->soz)
            ->kaynastirma('n')
            ->kural('duz,ince', 'in')
            ->kural('duz,kalin', 'ın')
            ->kural('yuvarlak,ince', 'ün')
            ->kural('yuvarlak,kalin', 'un')
            ->sonuc();
    }

    public function e()
    {
        return Cekim::yeni($this->soz)
            ->kaynastirma('y')
            ->kural('ince', 'e')
            ->kural('kalin', 'a')
            ->sonuc();
    }

    public function de()
    {
        return Cekim::yeni($this->soz)
            ->kural('sert,ince', 'te')
            ->kural('sert,kalin', 'ta')
            ->kural('yumusak,ince', 'de')
            ->kural('yumusak,kalin', 'da')
            ->sonuc();
    }

    public function den()
    {
        return $this->de() . 'n';
    }
}
