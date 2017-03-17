<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Get All Users
    public function getAllUsers() {
        $users = User::all();

        return $users;
    }

    // Create User
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users,email'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('password');
        $user->save();

        return $user;
    }
}
