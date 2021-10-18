<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KkRequest extends FormRequest
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
            'no_kk' => 'required|min:16|max:16|unique:family_cards,no_kk,'.$this->id.'',
            'kepala_keluarga' => 'required|unique:family_cards,kepala_keluarga,'.$this->id.'',
            'kabupaten' => 'required|string|min:3|max:30',
            'provinsi' => 'required|string|min:3|max:30',
        ];
    }

    public function messages()
    {
        return [
            'no_kk.required' => 'No KK wajib di isi',
            'no_kk.unique' => 'No KK sudah terpakai',
            'no_kk.min' => 'No KK harus 16 karakter',
            'no_kk.max' => 'No KK harus 16 karakter',

            'kepala_keluarga.required' => 'Kepala keluarga wajib di isi',
            'kepala_keluarga.unique' => 'Kepala keluarga sudah terdaftar',

            'kabupaten.required' => 'Kabupaten wajib di isi',
            'kabupaten.string' => 'Kabupaten harus huruf',
            'kabupaten.min' => 'Kabupaten minimal 3 karakter',
            'kabupaten.max' => 'Kabupaten maksimal 30 karakter',

            'provinsi.required' => 'Provinsi wajib di isi',
            'provinsi.string' => 'Provinsi harus huruf',
            'provinsi.min' => 'Provinsi minimal 3 karakter',
            'provinsi.max' => 'Provinsi maksimal 30 karakter',
        ];
    }
}
