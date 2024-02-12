<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function login()
    {


    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'                => 'required|max:255',
            'username'            => 'required|unique:users|max:255',
            'email'               => 'nullable|email|unique:users|max:255',
            'phone_number'        => 'nullable|unique:users|max:20',
            'password'            => 'required|min:6',
            'profile_picture_url' => 'nullable|url|max:255',
        ], [
            'email.unique'        => 'Already registered user with this email!',
            'username.unique'     => 'Already registered user with this username!',
            'phone_number.unique' => 'Already registered user with this phone!',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 409);
        } else {
            $data = $validator->validated();
            $data['password'] = Hash::make($data['password']);
            User::create($data);
            return response()->json(['success' => 'User registered successfully'], 201);
        }
    }
}
