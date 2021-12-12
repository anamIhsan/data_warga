<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DieRequest extends FormRequest
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
            'residents_id' => 'required|unique:dies,residents_id,'.$this->id.'',
            'tanggal_meninggal' => 'required',
            'sebab' => 'required|string|min:3|max:30',
        ];
    }

    public function messages()
    {
        return [
            'residents_id.required' => 'Penduduk wajib di isi',
            'residents_id.unique' => 'Penduduk sudah meninggal',

            'tanggal_meninggal.required' => 'Tanggal meninggal wajib di isi',

            'sebab.required' => 'Penyebab wajib di isi',
            'sebab.string' => 'Penyebab harus huruf',
            'sebab.min' => 'Penyebab minimal 3 karakter',
            'sebab.max' => 'Penyebab maksimal 30 karakter',
        ];
    }
}
