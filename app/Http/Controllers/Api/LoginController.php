<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
  class LoginController extends  BaseController
{

    public function login(Request $request)
    {
        try {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($token = JWTAuth::attempt($request->only('email', 'password'))) {
            $success = $this->respondWithToken($token);

            return $this->sendResponse($success, 'User login successfully.');
        }
    } catch (JWTException $e) {
        return $this->sendError(['error' => 'Failed to refresh token'], 500);

    }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());

            return $this->sendResponse([], 'Successfully logged out.');
        } catch (JWTException $e) {
            return $this->sendError(['error' => 'Failed to logout, please try again'], 500);

        }
    }
    public function refreshToken()
    {
        try {
            $token = JWTAuth::refresh(JWTAuth::getToken());
            return response()->json(['token' => $token]);
        } catch (JWTException $e) {
            return $this->sendError(['error' => 'Failed to refresh token'], 500);

        }
    }
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => JWTAuth::factory()->getTTL() * 60,
        ];
    }


}
