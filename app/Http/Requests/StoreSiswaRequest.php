<?php

namespace App\Http\Requests;

class StoreSiswaRequest extends ApiRequest
{

    public function rules(): array
    {
        return [
            'nama' => ['required','string','max:20'],
            'nisn' => ['required','string','max:20','unique:siswas,nisn'],
            'kelas' => ['required','string'],
            'jurusan' => ['required','string'],
            'alamat' => ['required','string']
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
