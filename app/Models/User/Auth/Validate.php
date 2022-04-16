<?php

namespace App\Models\User\Auth;

use Illuminate\Http\Request;

class Validate
{
    public static function validate(Request $request): array
    {
        return $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    }
}
