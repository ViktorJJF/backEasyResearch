<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['message' => 'Correo o contraseña incorrectos, por favor intente de nuevo'], 422);
            }
        } catch (JWTException $e) {
            return response()->json(['message' => 'Parece que algo salió mal. Por favor intente de nuevo'], 500);
        }
        $user = \App\Models\User::whereEmail(request('email'))->first();

        // if($user->status == 'pending_activation')
        //     return response()->json(['message' => 'Your account hasn\'t been activated. Please check your email & activate account.'], 422);

        if ($user->status == 'banned') {
            return response()->json(['message' => 'Your account is banned. Please contact system administrator.'], 422);
        }

        // if($user->status != 'activated')
        //     return response()->json(['message' => 'There is something wrong with your account. Please contact system administrator.'], 422);

        return response()->json(['message' => 'Iniciaste sesión satisfactoriamente!', 'token' => $token]);
    }

    public function register(Request $request)
    {
        // $validation = Validator::make($request->all(), [
        //     'first_name' => 'required',
        //     'last_name' => 'required',
        //     'email' => 'required|email|unique:users',
        //     'password' => 'required|min:6',
        //     'password_confirmation' => 'required|same:password'
        // ]);

        // if($validation->fails())
        //     return response()->json(['message' => $validation->messages()->first()],422);
        $user = \App\Models\User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
        ]);

        $user->activation_token = generateUuid();
        $user->save();
        $profile = new \App\Models\Profile;
        $profile->first_name = request('first_name');
        $profile->last_name = request('last_name');
        $user->profile()->save($profile);

        // $user->notify(new Activation($user));

        return response()->json(['message' => 'You have registered successfully. Please check your email for activation!']);
    }

    public function getAuthUser()
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (JWTException $e) {
            return response()->json(['authenticated' => false], 422);
        }

        $user = JWTAuth::parseToken()->authenticate();
        $profile = $user->Profile;
        $social_auth = ($user->password) ? 0 : 1;

        return response()->json(compact('user', 'profile', 'social_auth'));
    }
}
