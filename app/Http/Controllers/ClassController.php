<?php

namespace App\Http\Controllers;

use App\Services\ClassService;

class ClassController extends Controller
{
    protected $classService;

    public function __construct(ClassService $classService)
    {
        $this->classService = $classService;
    }

    /**
     * Display a listing of the classes.
     */
    public function index()
    {
        $classes = $this->classService->getAllClasses();
        return view('classes.index', compact('classes'));
    }

    /**
     * Display the specified class with its students.
     */
    public function show(int $id)
    {
        $class = $this->classService->getClassDetailsWithStudents($id);

        if (!$class) {
            abort(404, 'Class not found');
        }

        return view('classes.show', compact('class'));
    }
}
