<?php

namespace App\Repositories\Eloquent;

use App\Models\SchoolClass;
use App\Repositories\Contracts\ClassRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ClassRepository implements ClassRepositoryInterface
{
    protected $model;

    public function __construct(SchoolClass $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?SchoolClass
    {
        return $this->model->find($id);
    }

    public function create(array $data): SchoolClass
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $class = $this->model->find($id);
        if ($class) {
            return $class->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $class = $this->model->find($id);
        if ($class) {
            return $class->delete();
        }
        return false;
    }

    public function getClassWithStudents(int $id): ?SchoolClass
    {
        return $this->model->with('students')->find($id);
    }
}
