<?php

namespace App\Services;

use App\Contracts\Interfaces\SiswaRepositoryInterface;
use App\Models\Siswa;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class SiswaService {
    public function __construct(private SiswaRepositoryInterface $siswa_repository_interface){}

    public function getAll(): LengthAwarePaginator
    {
        return $this->siswa_repository_interface->getAll();
    }

    public function store(array $data): Siswa
    {
        return $this->siswa_repository_interface->store($data);
    }

    public function show(string $id): Siswa
    {
        return $this->siswa_repository_interface->show($id);
    }

    public function update(array $data, string $id): Siswa
    {
        return $this->siswa_repository_interface->update($data,$id);
    }

    public function delete(string $id): bool
    {
        return $this->siswa_repository_interface->delete($id);
    }
}