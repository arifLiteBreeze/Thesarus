<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthTokenValidator extends FormRequest
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
     * Get the validation rules that apply to create auth-token request.
     * 
     * @author Arif C A <aca@lbit.in>
     * 
     * @param void
     *
     * @return array
     */
    public function rules()
    {
        return [
            'token' => 'required|min:10|max:10|alpha_dash|unique:auth_tokens',
        ];
    }
}
