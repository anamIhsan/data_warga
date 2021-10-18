<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BornRequest extends FormRequest
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
            'residents_id' => 'required|unique:borns,residents_id,'.$this->id.'',
            'tanggal_lahir' => 'required',
            'familyCards_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'residents_id.required' => 'Penduduk wajib di isi',
            'residents_id.unique' => 'Penduduk sudah Lahir',
            
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',

            'familyCards_id.required' => 'Kartu keluarga wajib diisi'
        ];
    }
}
