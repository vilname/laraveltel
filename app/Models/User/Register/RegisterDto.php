<?php

namespace App\Models\User\Register;

use App\Models\Interfaces\DtoInterface;

class RegisterDto implements DtoInterface
{
    public string $email;
    public string $name;
    public string $password;

    public static function map($data): self
    {
        $o = new self();

        $o->email = $data['email'];
        $o->name = $data['name'];
        $o->password = $data['password'];

        return $o;
    }
}
