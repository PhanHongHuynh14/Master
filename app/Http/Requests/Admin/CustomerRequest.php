<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
             ],
            'birthday' => 'required',
            'age' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'cmnd' => 'required',
            'bank'=> 'required',
            'sex' => 'required',
            'role_id' => 'required',
            'user_id' => 'required',
            'note' => 'required',
            'phonezalo' => 'required',
        ];
    }
}
