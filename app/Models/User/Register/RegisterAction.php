<?php

namespace App\Models\User\Register;

use App\Models\Resource\ErrorResource;
use App\Models\Resource\SuccessResource;
use App\Models\User\Repositories\UserRepository;
use Illuminate\Http\Request;

class RegisterAction
{
    /**
     * @throws \Exception
     */
    public function execute(Request $request)
    {
        try {
            Validate::validate($request);
            $userRepository = new UserRepository();
            $user = $userRepository->saveUser(RegisterDto::map($request->all()));

        } catch (\Exception $e) {
            return new ErrorResource(['message' => $e->getMessage()]);
        }

        return new SuccessResource(['data' =>
            ['user_id' => $user->id]
        ]);
    }
}
