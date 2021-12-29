<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenBlacklistedException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class TokensController extends Controller
{
    //Login
    public function login(Request $request)
    {
        $credentials = $request->only('email' , 'password');
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json([
                'success' => false,
                'message' => 'Error de validación',
                'errors'   => $validator->errors(),
            ], 422);
        }

        $token = JWTAuth::attempt($credentials);

        if($token){
            return response()->json([
                'success' => true,
                'token' => $token,
                'usuario'   => User::where('email', $credentials['email'])->get()->first(),
            ], 200 );
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Las Credenciales no son correctas!',
                'errors'   => $validator->errors(),
            ], 401);
        }
    }

    //Refresh Token
    public function refreshToken()
    {
        $token = JWTAuth::getToken();
        try {
            $token = JWTAuth::refresh($token);
            return response()->json([
                'success' => true,
                'token'   => $token
            ], 200);

        }
        catch(TokenExpiredException $ex){
            return response()->json([
                'success' => false,
                'message' => 'La sesión ha expirado! (expired)',
            ], 422);

        }
        catch (TokenBlacklistedException $ex) {
            return response()->json([
                'success' => false,
                'message' => 'Necesitas iniciar sesión otra vez (blanklisted)',
            ], 422);
        }
    }

    //Logout
    public function logout()
    {
       $token = JWTAuth::getToken();
       try{
           $token = JWTAuth::invalidate($token);
           return response()->json([
                'susccess' => true,
                'message'  => 'Logout satisfactorio!',
           ], 200);
       } catch (JWTException $ex){
        return response()->json([
            'susccess' => false,
            'message'  => 'Logout fallido, por favor intenta nuevamente!',
       ], 422);
       }
    }

}
