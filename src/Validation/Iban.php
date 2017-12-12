<?php
namespace Aozisik\Turkiye\Validation;

use Aozisik\Turkiye\Contracts\Validator;

class Iban implements Validator
{
    public function validate($value)
    {
        $value = preg_replace('/\ /', '', $value);

        if (substr($value, 0, 2) !== 'TR' || strlen($value) !== 26) {
            return false;
        }
        // TODO: Verify checksum
        return true;
    }
}
