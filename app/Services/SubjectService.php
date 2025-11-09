<?php

namespace App\Services;

use App\Repositories\Contracts\SubjectRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Subject;

class SubjectService
{
    protected $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getAllSubjects(): Collection
    {
        return $this->subjectRepository->all();
    }

    public function getSubjectById(int $id): ?Subject
    {
        return $this->subjectRepository->find($id);
    }

    public function createSubject(array $data): Subject
    {
        return $this->subjectRepository->create($data);
    }

    public function updateSubject(int $id, array $data): bool
    {
        return $this->subjectRepository->update($id, $data);
    }

    public function deleteSubject(int $id): bool
    {
        // Add business logic to handle students taking this subject before deletion
        // e.g., remove subject from students or prevent deletion
        return $this->subjectRepository->delete($id);
    }

    public function getSubjectDetailsWithStudents(int $id): ?Subject
    {
        return $this->subjectRepository->getSubjectWithStudents($id);
    }
}
