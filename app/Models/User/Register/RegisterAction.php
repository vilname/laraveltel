<?php

namespace App\Models\User\Register;

use App\Models\Interfaces\ApiResult;
use App\Models\User\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterAction implements ApiResult
{
    /**
     * @throws \Exception
     */
    public function execute(Request $request): User
    {
        try {
            Validate::validate($request);
            $userRepository = new UserRepository();
            $user = $userRepository->saveUser(RegisterDto::map($request->all()));
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return $user;
    }
}
