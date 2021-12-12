<?php declare(strict_type=1);

namespace App\Http\Controllers;

use Exception;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(private Auth $auth,){}

    public function login(Request $request): JsonResponse
    {
        $credebtuals = $request->validate([
         'email' => 'required|email',
         'password' => 'required'
        ]);

        if($this->getGuard()->attempt($credentials)){
            $request->session()->regenerate();

            return new JsonRespones(['message' => 'ログイン成功']);
        }

        throw new Exception('ログイン失敗');
        // if(auth()->attempt($credentials)){
        //     return response()->json(['message' => 'OK!'], 200);
        // }

        // return response()->json(['message' => 'ユーザーが見つかりません。'], 422);
    }

    public function logout(Request $request): JsonResponse
    {
        $this->getGuard()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return new JsonResponse(['message' => 'ログアウト']);
    }

    private function getGuard(): StatefulGuard
    {
        return $this->auth->guard(config('auth.defaults.guard'));
    }

}