<?php


namespace App\Models\User\Auth;


use App\Models\Interfaces\ApiResult;
use App\Models\User\Repositories\OauthClientsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class AuthAction implements ApiResult
{
    public function execute(Request $request)
    {
        Validate::validate($request);

        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $oauthClients = (new OauthClientsRepository())->getClient(10);

//            $redis =  Redis::connection()->client();
//            $redis->set('oauth_client', json_encode($oauthClients->toArray()));

            return new AuthResource([
                'status_code' => 200,
                'status' => 'success',
                'data' => collect([
                    'grant_type' => 'password',
                    'client_id' => $oauthClients->id,
                    'client_secret' => $oauthClients->secret,
                    'username' => $request->email,
                    'password' => $request->password
                ])
            ]);
        }

        return new AuthResource([
            'status_code' => 401,
            'status' => 'error',
            'data' => [
                'message' => 'Ошибка авторизации'
            ]
        ]);
    }
}
