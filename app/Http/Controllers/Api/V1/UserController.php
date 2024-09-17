<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequests\UserLoginRequest;
use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        if(Auth::attempt($request->all())){
            $token = Auth::user()->createToken('token')->plainTextToken;
            return json_encode([
                'response'=>'Logged',
                'Token'=>$token,
                'Code'=>'200'
            ]);
        }
    }

    public function logout(UserLoginRequest $request)
    {
        $request->user()->currentAccessToken()->delete();
        return json_encode([
            'response'=>'Unlogged',
            'Code'=>'200'
        ]);
    }
}
