<?php

namespace App\Repositories\Eloquent;

use App\Models\Subject;
use App\Repositories\Contracts\SubjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class SubjectRepository implements SubjectRepositoryInterface
{
    protected $model;

    public function __construct(Subject $model)
    {
        $this->model = $model;
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int $id): ?Subject
    {
        return $this->model->find($id);
    }

    public function create(array $data): Subject
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): bool
    {
        $subject = $this->model->find($id);
        if ($subject) {
            return $subject->update($data);
        }
        return false;
    }

    public function delete(int $id): bool
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
