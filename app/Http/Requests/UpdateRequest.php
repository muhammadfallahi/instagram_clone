<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateRequest extends FormRequest
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
            'name' => ['required'],
            'username' => ['required'],
            'website' => ['nullable'],
            'bio' => ['nullable'],
            'public'=> [],
            'file' => ['image'],
            'email' => ['required','unique:users,email,' . Auth::user()->id],
            'phone_number' => ['required', 'unique:users,phone_number,'. Auth::user()->id,'min:11','max:11'],
            'current_password' => ['current_password'],
            'password' => ['confirmed']
        ];
    }
}
