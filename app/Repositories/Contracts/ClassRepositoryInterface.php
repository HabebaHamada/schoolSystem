<?php

namespace App\Repositories\Contracts;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Collection;

interface ClassRepositoryInterface
{
    public function all(): Collection;
    public function find(int $id): ?SchoolClass;
    public function create(array $data): SchoolClass;
    public function update(int $id, array $data): bool;
    public function delete(int $id): bool;
    public function getClassWithStudents(int $id): ?SchoolClass;
}
