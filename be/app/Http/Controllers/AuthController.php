<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'email' => 'required|string|email',
            'password' => 'required|string|min:3',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'errors' => $validator->errors()->toArray(),
            ]);
        }
        if (Auth::guard($request->segment(2))->attempt(['email' => $input['email'], 'password' => $input['password']])) {
            $user = Auth::guard($request->segment(2))->user();
            DB::table('oauth_access_tokens')->where('user_id', $user->id)->update(array('revoked' => true));
            $token = $user->createToken(ucfirst($request->segment(2)).' Access Token',[$request->segment(2)])->accessToken;
            return response()->json([
                'status' => 'success',
                'access_token' => $token,
                'profile' => $user
            ]);
        }
        else {
            return response()->json([
                'status' => false,
                'message' => 'Unauthorized'
            ], 401);
        }
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(),
            [
                'fullname'  => 'required|string',
                'email'     => 'bail|required|string|unique:App\Models\User,email',
                'phone'     => 'bail|required|string|unique:App\Models\User,phone',
                'password'  => 'required|string|min:6',
            ]
        );
        if ($validator->fails()) {
            return response()->json([
                'status' => 'fails',
                'message' => $validator->errors()->first(),
                'errors' => $validator->errors()->toArray(),
            ],401);
        }
        $user = new User([
            'fullname'  => $request->fullname,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => bcrypt($request->password),
        ]);
        $user->save();
        return response()->json([
            'status' => true,
            'information register' => $user
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['status' => true, 'message' => 'You have been logged out']);
    }
}
