<?php
namespace Aozisik\LaravelTurkiye\Rules;

use Illuminate\Contracts\Validation\Rule;

class TrIbanRule implements Rule
{
    public function passes($attribute, $value)
    {
        $value = preg_replace('/\ /', '', $value);

        if (substr($value, 0, 2) !== 'TR' || strlen($value) !== 26) {
            return false;
        }
        // TODO: Verify checksum
        return true;
    }

    public function message()
    {
        return trans('turkiye::messages.tr_iban');
    }
}
