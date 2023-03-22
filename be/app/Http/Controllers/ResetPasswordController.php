<?php

namespace App\Http\Controllers;

use App\Notifications\UserResetpassNotificationMail;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Notifications\ResetPasswordRequest;

class ResetPasswordController extends Controller
{
    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->all()['email'])->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate(['email' => $user->email,],['token' => Str::random(10),]);
        if ($passwordReset) {
            $user->notify(new ResetPasswordRequest($passwordReset->token));
//            $user->notify(new UserResetpassNotificationMail($passwordReset->token));
        }
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);
    }
    public function reset(Request $request)
    {
        $passwordReset = PasswordReset::where('token', $request->segment(4))->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();
            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $updatePasswordUser = $user->update(array('password' => bcrypt($request->password)));
        $passwordReset->delete();
        return response()->json([
            'success' => $updatePasswordUser,
        ]);
    }
}
