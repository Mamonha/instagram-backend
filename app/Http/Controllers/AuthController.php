<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUser;
use App\Models\User;
use Illuminate\Http\Request;
use Throwable;

class AuthController extends Controller
{

    public function login()
    {
    }


    public function register(StoreUser $request)
    {
        try {
            $data = $request->validated();
            User::create($data);
            return response()->json(['success' => 'User created successfully'], 201);
        } catch (Throwable $err) {
            return response()->json(['error' => $err->validator->errors()], 422);
        }
    }
}
