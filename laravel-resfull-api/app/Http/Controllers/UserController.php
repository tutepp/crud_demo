<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    /*
     * get token login
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'password' => 'required|string|min:1|confirmed',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json($validator->errors()->toJson(), 400);
        // }

        $user = User::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,

            'dateOfBirth' => $request->dateOfBirth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    /*
     * get current user
     */
    public function getAuthenticatedUser()
    {
        try {

            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }
        } catch (TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());
        }

        return response()->json(compact('user'));
    }
}
