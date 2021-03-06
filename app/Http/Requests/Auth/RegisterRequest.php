<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'name' => ['required' , 'string' , 'max:30'],
            'email' => ['required' , 'email' , 'max:50' , 'unique:users,email'],
            'timezone' => ['required' , 'string' , 'timezone'],
            'password' => ['required' , 'confirmed' ,'string' ,  Password::min(6)->numbers()],
            'agree' => ['accepted']
        ];
    }
}
