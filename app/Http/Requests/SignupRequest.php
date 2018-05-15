<?php

namespace App\Http\Requests;

use Illuminate\Http\Request;

class SignupRequest extends Request
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
     * @return array
     */
    public function rules()
    {
        return [
            // 'username' => 'required|unique:users',
            'email'      => 'required|email|unique:users',
            'password'   => 'required|min:6',
            'company' => 'required',
            'tos' => 'required',

        ];
    }

    public function messages()
    {
        return [
            'email.email' => 'Provide a valid work email address',
            'email.required' => 'Email is required',
            'email.unique' =>'Account already exists for the email provided, Login to add another company instead.',
            'password.required'  => 'Password is required to create your account',

        ];
    }
}
