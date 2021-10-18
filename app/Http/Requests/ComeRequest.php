<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComeRequest extends FormRequest
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
            'residents_id' => 'required|unique:comes,residents_id,'.$this->id.'',
            'tanggal_datang' => 'required',
            'pelapor' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'residents_id.required' => 'Penduduk wajib di isi',
            'residents_id.unique' => 'Penduduk sudah datang',

            'tanggal_datang.required' => 'Tanggal datang wajib diisi',

            'pelapor.required' => 'Pelapor wajib diisi'
        ];
    }
}
