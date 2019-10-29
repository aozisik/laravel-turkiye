<?php
namespace Aozisik\LaravelTurkiye\Rules;

use Illuminate\Contracts\Validation\Rule;

class TcKimlikNoRule implements Rule
{
    private $disallowed = [
        '11111111110',
        '22222222220',
        '33333333330',
        '44444444440',
        '55555555550',
        '66666666660',
        '77777777770',
        '88888888880',
        '99999999990',
    ];

    public function passes($attribute, $value)
    {
        $value = strval($value);
        if (strlen($value) != 11 || $value[0] === '0' || in_array($value, $this->disallowed)) {
            return false;
        }
        return $this->firstCheck($value) && $this->secondCheck($value);
    }

    public function message()
    {
        return trans('turkiye::messages.tckn');
    }

    private function firstCheck($value)
    {
        $a = 0;
        $b = 0;
        for ($i = 0;$i < 9;$i = $i + 2) {
            $a = $a + $value[$i];
        }
        for ($i = 1;$i < 9;$i = $i + 2) {
            $b = $b + $value[$i];
        }
        return ($a * 7 - $b) % 10 == $value[9];
    }

    private function secondCheck($value)
    {
        $c = 0;
        for ($i = 0;$i < 10;$i = $i + 1) {
            $c = $c + $value[$i];
        }
        return $c % 10 == $value[10];
    }
}
