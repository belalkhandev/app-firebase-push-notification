<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Illuminate\Validation\Rules;
use mysql_xdevapi\Exception;

class UserController extends Controller
{
    public function changePassword()
    {
        return Inertia::render('ChangePassword');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'password_confirmation' => 'required',
        ]);

        $user = auth('web')->user();

        if (!$user) {
            throw new Exception('No user found');
        }

        //check current password
        if(!Hash::check($request->get('current_password'), $user->password)){
            return response()->json([
                'message' => "Failed to update password",
                'errors' => [
                    'current_password' => ["Current password does not match"]
                ]
            ], 422);
        }

        $user->password = Hash::make($request->password);

        if (!$user->save()) {
            return redirect()->back()->with('message', 'Failed to update password');
        }


        return redirect()->back()->with('message', 'Password has been changed successfully');
    }
}
