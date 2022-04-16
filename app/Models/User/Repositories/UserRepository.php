<?php

namespace App\Models\User\Repositories;


use App\Models\User;
use App\Models\User\Register\RegisterDto;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    public function saveUser(RegisterDto $registerDto): User
    {
        $user = new User();
        $user->name = $registerDto->name;
        $user->email = $registerDto->email;
        $user->password = Hash::make($registerDto->password);

        $user->save();

        return $user;
    }
}
