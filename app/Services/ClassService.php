<?php

namespace App\Services;

use App\Repositories\Contracts\ClassRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use App\Models\SchoolClass;

class ClassService
{
    protected $classRepository;

    public function __construct(ClassRepositoryInterface $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    public function getAllClasses(): Collection
    {
        return $this->classRepository->all();
    }

    public function getClassById(int $id): ?SchoolClass
    {
        return $this->classRepository->find($id);
    }

    public function createClass(array $data): SchoolClass
    {
        return $this->classRepository->create($data);
    }

    public function updateClass(int $id, array $data): bool
    {
        return $this->classRepository->update($id, $data);
    }

    public function deleteClass(int $id): bool
    {
        // Add business logic to handle students in this class before deletion
        // e.g., reassign students or prevent deletion if class has students
        return $this->classRepository->delete($id);
    }

    public function getClassDetailsWithStudents(int $id): ?SchoolClass
    {
        return $this->classRepository->getClassWithStudents($id);
    }
}
