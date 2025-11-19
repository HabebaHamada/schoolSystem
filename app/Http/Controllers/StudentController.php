<?php

namespace App\Http\Controllers;

use App\Repositories\StudentRepository;
use App\Http\Requests\EditStudentRequest;
use App\Http\Requests\StoreStudentRequest;
use App\Repositories\ClassRepository;
use App\Repositories\SubjectRepository;


class StudentController extends Controller
{
    protected $studentRepository;
    protected $schoolClassRepository;
    protected $subjectRespository;

    public function __construct(StudentRepository $studentRepository, ClassRepository $schoolClassRepository,SubjectRepository $subjectRespository)
    {
        $this->studentRepository = $studentRepository;
        $this->schoolClassRepository = $schoolClassRepository;
        $this->subjectRespository=$subjectRespository;
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

    public function create()
    {
        // Fetch all classes to populate the dropdown
        $classes = $this->schoolClassRepository->getAllClasses();
        $subjects = $this->subjectRespository->getAllSubjects();
        return view('students.create', compact('classes','subjects'));
    }

    public function store(StoreStudentRequest $Request)
    {
        $this->studentRepository->createStudent($Request->validated());
        return redirect()->route('students.index')->with('success', 'student is created successfully.');
    }

    public function delete(int $id)
    {
        $result = $this->studentRepository->deleteStudent($id);

        if (!$result) {
            abort(404, 'Student not found');
        }

        return redirect()->route('students.index')->with('success', 'Student is removed successfully.');
    }

    public function edit(int $id)
    {
        $student = $this->studentRepository->getStudentById($id);
        if (!$student) {
            abort(404, 'Student not found');
        }

        // Fetch all classes to populate the dropdown in the edit form
        $classes = $this->schoolClassRepository->getAllClasses();

        $subjects = $this->subjectRespository->getAllSubjects();


        return view('students.edit', compact('student','classes','subjects'));
    }

    public function update(int $id, EditStudentRequest $request)
    {
        $student = $this->studentRepository->updateStudent($id, $request->validated());

        if (!$student) {
            abort(404, 'Student not found or update failed');
        }

        return redirect()->route('students.index')->with('success', 'Student is updated successfully.');
    }
}
