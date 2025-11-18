<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Storage; 


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
        return $this->model->with(['class', 'subjects'])->find($id);
    }

    public function createStudent(array $data): Student
    {
        if (isset($data['photo'])) {
        $file = $data['photo'];
        $path = $file->store('students', 'public'); // Store in 'storage/app/public/students' folder
        // Save the new path to the data array
        $data['photo'] = $path;

        } 
        else {
        // Remove photo from the $data array if it's not present (e.g., if we're only updating name)
        unset($data['photo']);
        }
        return $this->model->create($data);
    }

    public function updateStudent(int $id, array $data): bool
    {
        $student = $this->model->find($id);
        if ($student) {
             if (isset($data['photo'])) {
        $file = $data['photo'];
        $path = $file->store('students', 'public'); // Store in 'storage/app/public/students' folder

        // Delete old photo if it exists
        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        // Save the new path to the data array
        $data['photo'] = $path;

    } else {
        // Remove photo from the $data array if it's not present (e.g., if we're only updating name)
        unset($data['photo']);
    }
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
