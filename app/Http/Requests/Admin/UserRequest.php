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
            'password' => 'required|min:8|regex:/(?=.*?[@#$%&*])/',
            'fb' => 'url',
            'ytb' => 'url'
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
