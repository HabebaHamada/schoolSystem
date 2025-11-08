<?php

namespace App\Repositories\Eloquent;

use App\Models\Student;
use App\Repositories\Contracts\StudentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository implements StudentRepositoryInterface
{
    protected $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Student
    {
        return $this->model->find($id);
    }

    public function create(array $data): Student
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $student = $this->model->find($id);
        if ($student) {
            return $student->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
    {
        $student = $this->model->find($id);
        if ($student) {
            return $student->delete();
        }
        return false;
    }

    public function getStudentsWithClassAndSubjects(): Collection
    {
        return $this->model->with(['class', 'subjects'])->get();
    }
}
