<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepository;

class StudentController extends Controller
{
    protected $studentRepository;

    public function __construct(StudentRepository $studentRepository)
    {
        $this->studentRepository = $studentRepository;
    }

    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = $this->studentRepository->getAllStudents();
        return view('students.index', compact('students'));
    }

    /**
     * Display the specified student.
     */
    public function show(int $id)
    {
        $student = $this->studentRepository->getStudentById($id);

        if (!$student) {
            abort(404, 'Student not found');
        }

        return view('students.show', compact('student'));
    }
}
