<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;

class StudentRepository
{
    protected $model;

    public function __construct(Student $model)
    {
        $this->model = $model;
    }

    public function getAllStudents(): Collection
    {
        return $this->model->all();
    }

    public function getStudentById(int $id): ?Student
    {
        return $this->model->find($id);
    }

    public function createStudent(array $data): Student
    {
        return $this->model->create($data);
    }

    public function updateStudent(int $id, array $data): bool
    {
        $student = $this->model->find($id);
        if ($student) {
            return $student->update($data);
        }
        return false;
    }

    public function deleteStudent(int $id): bool
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
