<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Traits\GeneralTrait;
use Exception;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use GeneralTrait;

    public function Register(RegisterRequest $request){
        try{
        $user = User::create($request);

        $tokens = $user->createToken('auth_token')->plainTextToken;

        return $this->AuthData($user,$tokens);

        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }

    public function Login(LoginRequest $request){
        try{
            $user = User::where('email', $request->email) 
            ->first();

            if(!$user || !Hash::check($request->password)){
                return response()->json([
                    'Bad Credentials'
                ], 401);
            }
        }catch(Exception $e){
            return $this->getError($e->getCode(),$e->getMessage());
        }
    }
}
