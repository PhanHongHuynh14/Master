<?php

namespace App\Http\Requests\Admin;
use App\Rules\ValidationName;
use Illuminate\Foundation\Http\FormRequest;

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
            'email' => 'required|email|not_regex:/^[root]/',
            'password' => 'required|min:8|regex:/^0-9@#$%&*+$/|confirmed',
            'fb' => 'url',
            'ytb' => 'url'
        ];
    }
}
