<?php
namespace Aozisik\Turkiye\Validation;

use Aozisik\Turkiye\Contracts\Validator;

class VergiKimlikNo implements Validator
{
	public function validate($value)
	{
	    if (strlen($value) !== 10) {
	        return false;
	    }
	    $sum = 0;
	    for ($i = 0; $i < 9; $i++) {
	        $mod = ($value[$i] + (9 - $i)) % 10;
	        $pow = $mod * pow(2, (9 - $i)) % 9;
	        $sum += ($mod !== 0 && $pow == 0) ? 9 : $pow;
	    }
	    $checksum = ($sum % 10 == 0) ? 0 : (10 - ($sum % 10));
	    return $checksum == $value[9];		
	}
}