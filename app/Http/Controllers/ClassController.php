<?php

namespace App\Http\Controllers;

use App\Repositories\ClassRepository;

class ClassController extends Controller
{
    protected $classRepository;

    public function __construct(ClassRepository $classRepository)
    {
        $this->classRepository = $classRepository;
    }

    /**
     * Display a listing of the classes.
     */
    public function index()
    {
        $classes = $this->classRepository->getAllClasses();
        return view('classes.index', compact('classes'));
    }

    /**
     * Display the specified class with its students.
     */
    public function show(int $id)
    {
        $class = $this->classRepository->getClassWithStudents($id);

        if (!$class) {
            abort(404, 'Class not found');
        }

        return view('classes.show', compact('class'));
    }

    public function deleteClass(int $id)
    {
        $result = $this->classRepository->deleteClass($id);

        if (!$result) {
            abort(404, 'Class not found');
        }

        return redirect()->route('classes.index')->with('success', 'Class is removed successfully.');
    }

    public function editClass(int $id, array $data)
    {
        $class = $this->classRepository->updateClass($id, $data);

        if (!$class) {
            abort(404, 'Class not found');
        }

        return view('classes.edit', compact('class'));
    }

    public function createClass(array $data)
    {
        $class = $this->classRepository->createClass($data);

        return redirect()->route('classes.index')->with('success', 'Class is created successfully.');
    }
}
