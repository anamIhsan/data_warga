<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MoveRequest extends FormRequest
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
            'residents_id' => 'required|unique:moves,residents_id,'.$this->id.'',
            'tanggal_pindah' => 'required',
            'alasan' => 'required|string|min:3|max:30',
        ];
    }

    public function messages()
    {
        return [
            'residents_id.required' => 'Penduduk wajib di isi',
            'residents_id.unique' => 'Penduduk sudah pindah',

            'tanggal_pindah.required' => 'Tanggal pindah wajib di isi',

            'alasan.required' => 'Alasan pindah wajib di isi',
            'alasan.string' => 'Alasan pindah harus huruf',
            'alasan.min' => 'Alasan pindah minimal 3 karakter',
            'alasan.max' => 'Alasan pindah maksimal 30 karakter',
        ];
    }
}
