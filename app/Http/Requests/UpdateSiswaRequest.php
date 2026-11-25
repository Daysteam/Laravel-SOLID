<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

class UpdateSiswaRequest extends ApiRequest
{
    public function rules(): array
    {   
        $siswaId = $this->route('siswa');
        return [
            'nama' => ['sometimes','string','max:100'],
            'nisn' => ['sometimes','string','max:20',
                Rule::unique('siswas','nisn')->ignore($siswaId)],
            'kelas' => ['sometimes','string'],
            'jurusan' => ['sometimes','string'],
            'alamat' => ['sometimes','string']
        ];
    }
    
    public function messages(): array
    {
        return [
            'nama.required' => 'Nama harus diisi',
            'nama.string' => 'Nama harus berbentuk teks',
            'nama.max' => 'Nama maximal 20 huruf',
            'kelas.required' => 'Kelas harus diisi',
            'kelas.string' => 'Kelas harus berbentuk teks',
            'nisn.required' => 'NISN harus diisi',
            'nisn.string' => 'NISN harus berbentuk teks',
            'nisn.max' => 'NISN maksimal 20 huruf',
            'nisn.unique' => 'NISN sudah digunakan',
            'jurusan.required' => 'Jurusan harus diisi',
            'jurusan.string' => 'Jurusan harus berbentuk teks',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.string' => 'Alamat harus berbentuk teks',
        ];
    }
}
