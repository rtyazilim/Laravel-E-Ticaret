<?php

namespace App\Modules\User\Http\Requests;

use App\Http\Requests\ApiFormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends ApiFormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'max:191', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'phone' => ['nullable', 'string', 'max:30'],
            'role' => ['required', Rule::in(['customer', 'manager', 'admin'])],
            'status' => ['required', Rule::in(['active', 'passive', 'banned'])],
        ];
    }
}
