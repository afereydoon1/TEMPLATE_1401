<?php

namespace App\Http\Requests\Admin\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminUserRequest extends FormRequest
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
        if ($this->isMethod('post')){
            return [
                'full_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'email' => 'required|email|unique:users',
                'mobile' => 'required|unique:users',
                'status' => 'required|numeric|in:0,1',
                'password' => 'required|confirmed|min:8',
            ];
        }
        else
        {
            return [
                'full_name' => 'required|max:120|min:2|regex:/^[ا-یa-zA-Z0-9\-۰-۹ء-ي., ]+$/u',
                'email' => ['required', 'email', 'max:255', Rule::unique('users','email')->ignore($this->admin_user)],
                'mobile' => ['required','max:255', Rule::unique('users','mobile')->ignore($this->admin_user)],
                'status' => 'required|numeric|in:0,1',
                'password' => 'required|confirmed|min:8',
            ];
        }
    }
}
