<?php

namespace App\Contracts\Interfaces;

use App\Models\Siswa;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

interface SiswaRepositoryInterface {

    public function getAll(): LengthAwarePaginator;

    public function store(array $data): Siswa;

    public function show(string $id): Siswa;

    public function update(array $data, string $id): Siswa;

    public function delete(string $id): bool;
}