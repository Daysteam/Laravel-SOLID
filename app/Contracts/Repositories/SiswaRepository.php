<?php

namespace App\Contracts\Repositories;

use App\Contracts\Interfaces\SiswaRepositoryInterface;
use App\Models\Siswa;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SiswaRepository implements SiswaRepositoryInterface {

    private function findById(string $id) : Siswa
    {   
        return Siswa::findOrFail($id);
    }

    public function getAll(): LengthAwarePaginator
    {
        return Siswa::paginate(10);
    }

    public function store(array $data): Siswa
    {
        $siswa = Siswa::create($data);

        return $siswa;
    }

    public function show(string $id): Siswa
    {
        $siswa = $this->findById($id);

        return $siswa;
    }

    public function update(array $data, string $id): Siswa
    {
        $siswa = $this->findById($id);
        $siswa->update($data);
        return $siswa;
    }

    public function delete(string $id): bool
    {
        $siswa = $this->findById($id);

        return $siswa->delete();
    }
}