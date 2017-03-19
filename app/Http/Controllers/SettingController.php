<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
   // Create new Controller Instance
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Update User Personal
    public function updateUserPersonal(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return $user;
    }

    // Update User Security
    public function updateUserSecurity(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6|confirmed'
        ]);

        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return $user;
    }
}
