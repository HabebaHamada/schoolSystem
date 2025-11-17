<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreClassRequest;
use App\Http\Requests\EditClassRequest;
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

    public function delete(int $id)
    {
        $result = $this->classRepository->deleteClass($id);

        if (!$result) {
            abort(404, 'Class not found');
        }

        return redirect()->route('classes.index')->with('success', 'Class is removed successfully.');
    }

    public function edit(int $id)
    {
        $class = $this->classRepository->getClassWithStudents($id);
        return view('classes.edit',compact('class'));
    }

    public function update(int $id, EditClassRequest $request)
    {
        $class = $this->classRepository->updateClass($id, $request->validated());

        if (!$class) {
            abort(404, 'Class not found or update failed');
        }

        return redirect()->route('classes.index')->with('success', 'Class is updated successfully.');
    }

    public function create()
    {

        return view('classes.create');
    }

    public function store(StoreClassRequest $request)
    {
        $this->classRepository->createClass($request->validated());

        return redirect()->route('classes.index')->with('success', 'Class is created successfully.');
    }
}
