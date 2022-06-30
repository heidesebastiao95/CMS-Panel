<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequest extends FormRequest
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
            'name'=>['required','string'],
            'email' =>['required','email'],
            'password' => ['required','min:8'],
            //'newPassword' => ['required','min:8'],
            'role' => ['required','string'],
            'username' => ['required','string'],
            'gender' => ['required','string'],
            'phone' => ['required','string'],
            //'photo' => ['required','file']
            
        ];
    }
}
