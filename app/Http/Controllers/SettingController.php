<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Update User Personal
    public function updateUserPersonal(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $user = User::findOrFail(Auth::user());
        $user->name = $request->input('name');
        $user->save();

        return $user;
    }

    // Update User Security
    public function updateUserSecurity(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|min:6'
        ]);

        $user = User::findOrFail(Auth::user());
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return $user;
    }
}
