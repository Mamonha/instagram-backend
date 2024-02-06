<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUser extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'username' => 'required|unique:users|max:255',
            'email' => 'nullable|email|unique:users|max:255',
            'phone_number' => 'nullable|unique:users|max:20',
            'password' => 'required|min:6',
            'profile_picture_url' => 'nullable|url|max:255',
        ];
    }
}
