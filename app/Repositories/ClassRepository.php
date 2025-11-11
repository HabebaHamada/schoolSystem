<?php

namespace App\Repositories;

use App\Models\SchoolClass;
use Illuminate\Database\Eloquent\Collection;

class ClassRepository
{
    protected $model;

    public function __construct(SchoolClass $model)
    {
        $this->model = $model;
    }

    public function getAllClasses(): Collection
    {
        return $this->model->all();
    }

    public function getClassById(int $id): ?SchoolClass
    {
        return $this->model->find($id);
    }

    public function createClass(array $data): SchoolClass
    {
        return $this->model->create($data);
    }

    public function updateClass(int $id, array $data): bool
    {
        $class = $this->model->find($id);
        if ($class) {
            return $class->update($data);
        }
        return false;
    }

    public function deleteClass(int $id): bool
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
