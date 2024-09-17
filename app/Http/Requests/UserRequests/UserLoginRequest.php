<?php

namespace App\Http\Requests\UserRequests;

use Illuminate\Foundation\Http\FormRequest;

class UserLoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'=>'required',
            'password'=>'min:6 | required'
        ];
    }

    public function messages():array
    {
        return [
            'email.required'=>'O e-mail é obrigatório',
            'password.required'=>'A senha é obrigatória',
            'password.min'=>'A senha deve ser maior ou igual a 6 caracteres'
        ];
    }
}
