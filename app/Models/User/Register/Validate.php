<?php

namespace App\Models\User\Register;

use Illuminate\Http\Request;

class Validate
{
    public static function validate(Request $request): array
    {
        return $request->validate([
            'email' => ['required', 'email', 'unique:users'],
            'name' => ['required'],
            'password' => ['required'],
        ]);
    }
}
