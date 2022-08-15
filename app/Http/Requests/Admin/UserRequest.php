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
                'array',
            ],
            'address'=> 'nullable|max:255',
            'school_id' => 'nullable|exists:schools,id',
            'type' => 'nullable',
            'parent_id' => 'nullable|exists:users,id',
            'closed' => 'nullable|boolean',
            'code' => [
                'nullable',
                Rule::unique('users')->ignore($this->user),
            ],
            'social_type' => 'nullable|numeric',
            'social_id' => [
                'nullable',
                Rule::unique('users')->ignore($this->user),
            ],
            'social_name' => 'nullable',
            'social_nickname' => 'nullable',
            'social_avatar' => 'nullable|url',
            'description' => 'nullable',

        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('Bạn chưa nhập Tên.'),
            'email.required' => __('Bạn chưa nhập Email.'),
            'password1.required' => __('Bạn chưa nhập Mật khẩu.'),
            'password2.required' => __('Bạn chưa nhập lại Mật khẩu.'),
            'name.min' => __('Tên không được nhỏ hơn 2 ký tự.'),
            'password1.min' => __('Mật khẩu không được nhỏ hơn 8 ký tự.'),
            'facebook.required' => __('Bạn chưa nhập đường dẫn .'),
            'youtube.required' => __('Bạn chưa nhập đường dẫn.'),
            'facebook.url' => __('Bạn chưa nhập đúng định dạng.'),
            'youtube.url' => __('Bạn chưa nhập đúng định dạng.'),
        ];
    }
}
