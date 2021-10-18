<?php

namespace App\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:4|max:25',
            'email' => 'required|unique:users,email,'.$this->id.'',
            'password' => 'required|min:5|max:25',
            'roles' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib di isi',
            'name.string' => 'Nama harus huruf',
            'name.min' => 'Nama minimal 4 huruf',
            'name.max' => 'Nama maksimal 25 huruf',
            
            'email.required' => 'Email wajib di isi',
            'email.unique' => 'Email sudah terpakai',
            
            'password.required' => 'Password wajib di isi',
            'password.min' => 'Password minimal 5 karakter',
            'password.max' => 'Password maksimal 25 karakter',

            'roles.required' => 'Roles wajib di isi'
        ];
    }
}
