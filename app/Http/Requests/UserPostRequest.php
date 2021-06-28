<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserPostRequest extends FormRequest
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => ['required','email', Rule::unique('users')->ignore($this->id)],
            'password' => 'required|min:8',
            'address' => 'required',
            'birth_date' => 'required',
            'city' => 'required',
            'zip_code' => 'required',
            'mobile' => 'required',
            'image' => 'nullable',
        ];
    }
}
