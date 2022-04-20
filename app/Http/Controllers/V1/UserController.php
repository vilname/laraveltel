<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\User\Auth\AuthAction;
use App\Models\User\Register\RegisterAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UserController extends Controller
{
    /**
     * @OA\Post(
     *      path="/register",
     *      operationId="usersIdentification",
     *      tags={"User"},
     *      summary="Регистрация пользователя",
     *      description="Регистрация пользователя",
     *      @OA\Parameter(
     *          name="email",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="password",
     *          in="path",
     *          required=true,
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="user_id", type="number"),
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     * @throws \Exception
     */
    public function register(Request $request): JsonResponse
    {
        $action = new RegisterAction();
        $user = $action->execute($request);

        return response()->json([
            'status' => 'success',
            'status_code' => 200,
            'data' => [
                'user_id' => $user->id
            ]
        ]);
    }

    public function auth(Request $request): JsonResponse
    {
        $handler = new AuthAction();
        return response()->json($handler->execute($request));
    }
}
