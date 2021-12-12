<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidentRequest extends FormRequest
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
            'nik' => 'required|min:16|max:16|unique:residents,nik,'.$this->id.'',
            'name' => 'required|string|min:4|max:100',
            'tempat_lahir' => 'required|string|min:3|max:25',
            'tanggal_lahir' => 'required',
            'gender' => 'required',
            'desa' => 'required|string|min:4|max:50',
            'rt' => 'required|min:1|max:2',
            'rw' => 'required|min:1|max:2',
            'religion' => 'required',
            'status_perkawinan' => 'required',
            'pekerjaan' => 'required|string|min:3|max:30'
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'NIK wajib di isi',
            'nik.unique' => 'NIK sudah terpakai',
            'nik.min' => 'NIK harus 16 karakter',
            'nik.max' => 'NIK harus 16 karakter',

            'name.required' => 'Nama wajib di isi',
            'name.string' => 'Nama harus huruf',
            'name.min' => 'Nama minimal 4 karakter',
            'name.max' => 'Nama maksimal 100 karakter',

            'tempat_lahir.required' => 'Tempat lahir wajib di isi',
            'tempat_lahir.string' => 'Tempat lahir harus huruf',
            'tempat_lahir.min' => 'Tempat lahir minimal 3 karakter',
            'tempat_lahir.max' => 'Tempat lahir maksimal 25 karakter',

            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi',

            'gender.required' => 'Jenis kelamin wajib diisi',

            'desa.required' => 'Desa wajib di isi',
            'desa.string' => 'Desa harus huruf',
            'desa.min' => 'Desa minimal 4 karakter',
            'desa.max' => 'Desa maksimal 50 karakter',

            'rt.required' => 'RT wajib di isi',
            'rt.min' => 'RT minimal 1 karakter',
            'rt.max' => 'RT maksimal 2 karakter',

            'rw.required' => 'RW wajib di isi',
            'rw.min' => 'RW minimal 1 karakter',
            'rw.max' => 'RW maksimal 2 karakter',

            'religion.required' => 'Agama wajib diisi',

            'status_perkawinan.required' => 'Status perkawinan wajib diisi',

            'pekerjaan.required' => 'Pekerjaan wajib di isi',
            'pekerjaan.string' => 'Pekerjaan harus huruf',
            'pekerjaan.min' => 'Pekerjaan minimal 3 karakter',
            'pekerjaan.max' => 'Pekerjaan maksimal 30 karakter',
        ];
    }
}
