<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = $this->studentService->getAllStudents();
        return view('students.index', compact('students'));
    }

    /**
     * Display the specified student.
     */
    public function show(int $id)
    {
        $student = $this->studentService->getStudentById($id);

        if (!$student) {
            abort(404, 'Student not found');
        }

        return view('students.show', compact('student'));
    }
}
