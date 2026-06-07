<?php

namespace App\Modules\User\Http\Requests;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:150'],
            'email' => ['sometimes', 'required', 'email', 'max:191', Rule::unique('users', 'email')->ignore($this->route('user'))],
            'password' => ['sometimes', 'required', 'string', 'min:8', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'role' => ['sometimes', 'required', Rule::in(['customer', 'manager', 'admin'])],
            'status' => ['sometimes', 'required', Rule::in(['active', 'passive', 'banned'])],
        ];
    }
}
