<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilterUsersRequest extends FormRequest
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
            'search_query' => 'sometimes|nullable|string',
            'user_role_id' => 'sometimes|required|exists:user_roles,id',
            'registration_date' => 'sometimes|required|in:asc,desc',
            'per_page' => 'sometimes|required|numeric',
        ];
    }
}
