<?php

namespace App\Services;

use App\Repositories\Contracts\StudentRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Student;

class StudentService
{
    protected $studentRepository;

    public function __construct(StudentRepositoryInterface $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    public function getAllStudents(): Collection
    {
        return $this->studentRepository->getStudentsWithClassAndSubjects();
    }

    public function getStudentById(int $id): ?Student
    {
        return $this->studentRepository->find($id);
    }

    public function createStudent(array $data): Student
    {
        return $this->studentRepository->create($data);
    }

    public function updateStudent(int $id, array $data): bool
    {
        return $this->studentRepository->update($id, $data);
    }

    public function deleteStudent(int $id): bool
    {
        return $this->studentRepository->delete($id);
    }
}
