<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'aims_description' => 'sometimes|required|string',
            'education' => 'sometimes|required|string',
            'experience' => 'sometimes|required|string',
            'about' => 'sometimes|required|string',
        ];
    }
}
