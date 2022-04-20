<?php

namespace App\Models\Equipment\Validators;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Validation\Validator as ValidatorsResult;

class StoreValidate
{
    public static function validate(array $equipment, string $maskForValidate): ValidatorsResult
    {
        return Validator::make($equipment, [
            'code' => ['required'],
            'code_type' => ['required'],
            'serial_number' => ['required', 'regex:' . $maskForValidate],
        ]);
    }
}
