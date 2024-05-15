<?php

namespace App\Rules;

use App\Http\Controllers\InnController;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Inn implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty(InnController::getInnResponce($value)->items[0])) {
					$fail('Inn is not valid');
				}
    }
}
