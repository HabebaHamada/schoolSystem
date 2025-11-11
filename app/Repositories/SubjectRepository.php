<?php

namespace App\Repositories;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Collection;

class SubjectRepository
{
    protected $model;

    public function __construct(Subject $model)
    {
        $this->model = $model;
    }
    public function getAllSubjects(): Collection
    {
        return $this->model->all();
    }

    public function getSubjectById(int $id): ?Subject
    {
        return $this->model->find($id);
    }

    public function createSubject(array $data): Subject
    {
        return $this->model->create($data);
    }

    public function updateSubject(int $id, array $data): bool
    {
        $subject = $this->model->find($id);
        if ($subject) {
            return $subject->update($data);
        }
        return false;
    }

    public function deleteSubject(int $id): bool
    {
        $subject = $this->model->find($id);
        if ($subject) {
            return $subject->delete();
        }
        return false;
    }

    public function getSubjectWithStudents(int $id): ?Subject
    {
        return $this->model->with('students')->find($id);
    }
}
