<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'user_role_id' => 'required|exists:user_roles,id',
            'major_id' => 'required|exists:majors,id',
            'aims_description' => 'required|string',
            'education' => 'required|string',
            'experience' => 'required|string',
            'about' => 'required|string',
            'password' => 'required|string|min:6',
            'password_confirmation' => 'required|string|same:password',
        ];
    }
}
