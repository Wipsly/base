<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Create new Controller Instance
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get Authenticated User
    public function getAuthUser() {
        $user = Auth::user();

        return $user;
    }

    // Get All Users
    public function getAllUsers() {
        $users = User::all();

        return $users;
    }

    // Get User
    public function getUser($id) {
        $user = User::findorFail($id);

        return $user;
    }

    // Edit User
    public function editUser($id, Request $request)
    {
        $user = User::findOrFail($id);

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

    // Create User
    public function createUser(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users,email'
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('password');
        $user->save();

        return $user;
    }

    // Delete User
    public function deleteUser($id)
    {
        $user = User::findOrFail($id);

        $user->delete();
    }
}
