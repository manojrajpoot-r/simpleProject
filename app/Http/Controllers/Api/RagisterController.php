<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Facades\Validator;
class RagisterController extends BaseController
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users|max:255',
            'phone' => 'required|digits:10',
            'password' => 'required|string|min:6',
            'c_password' => 'required|same:password'
           // 'user_profile' =>'required|file|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());
        }
        try{

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),

            ]);
            $success['user'] =  $user;
             return $this->sendResponse($success, 'User register successfully.');
            //$token = JWTAuth::fromUser($user);
        } catch (JWTException $e) {
            return $this->sendError(['error' => 'Failed to refresh token'], 500);

        }

    }
}
