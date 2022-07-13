<?php
namespace App\Http\Requests;
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

    public function messages()
    {
       return [
          'name.required' => __('Bạn chưa nhập Tên.'),
          'email.required' => __('Bạn chưa nhập Email.'),
          'password.required' => __('Bạn chưa nhập Mật khẩu.'),
          'name.min' => __('name không được nhỏ hơn 2 ký tự.'),
          'name.min' => __('Mật khẩu không được nhỏ hơn 8 ký tự.')
       ];
    }
}
