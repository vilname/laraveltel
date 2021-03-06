<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Models\User\Auth\AuthAction;
use App\Models\User\Register\RegisterAction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
        return response()->json($action->execute($request));
    }

    public function auth(Request $request): JsonResponse
    {
        $handler = new AuthAction();
        return response()->json($handler->execute($request));
    }
}
