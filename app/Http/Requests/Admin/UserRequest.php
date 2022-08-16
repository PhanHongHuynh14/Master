<?php

namespace App\Http\Requests\Admin;

use App\Rules\ValidationName;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => [
                'required',
                'min:2',
                'not_regex:/^[@#$%&*]/',
                new ValidationName(),
            ],
            'email' => [
                'required',
                'email',
                'max:32',
                'not_regex:/^[root]/',
                Rule::unique('users')->ignore($this->user),
            ],
            'username' => [
                'required',
                'min:2',
                'max:50',
                Rule::unique('users')->ignore($this->user),
            ],
            'password' => [
                'required',
                'min:8',
                'max:200',
                'regex:/^[0-9@#$%&*]+$/',
            ],
            'role_ids' => [
                'required',
            ],

        ];
    }
}
