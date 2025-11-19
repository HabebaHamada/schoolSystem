<?php

namespace App\Http\Controllers;

use App\Repositories\SubjectRepository;
use App\Http\Requests\EditSubjectRequest;
use App\Http\Requests\StoreSubjectRequest;

class SubjectController extends Controller
{
    protected $subjectRepository;

    public function __construct(SubjectRepository $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    /**
     * Display a listing of the subjects.
     */
    public function index()
    {
        /*
        this will eager load the subjects and classes
         */
        $subjects = $this->subjectRepository->getAllSubjects();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Display the specified subject with its students.
     */
    public function show(int $id)
    {
        $subject = $this->subjectRepository->getSubjectWithStudents($id);

        if (!$subject) {
            abort(404, 'Subject not found');
        }

        return view('subjects.show', compact('subject'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(StoreSubjectRequest $Request)
    {
        $this->subjectRepository->createSubject($Request->validated());
        return redirect()->route('subjects.index')->with('success', 'subject is created successfully.');
    }

    public function delete(int $id)
    {
        $result = $this->subjectRepository->deleteSubject($id);

        if (!$result) {
            abort(404, 'Subject not found');
        }

        return redirect()->route('subjects.index')->with('success', 'Subject is removed successfully.');
    }

    public function edit(int $id)
    {
        $Subject = $this->subjectRepository->getSubjectWithStudents($id);
        if (!$Subject) {
            abort(404, 'Student not found');
        }

        return view('subjects.edit', compact('subject'));
    }

    public function update(int $id, EditSubjectRequest $request)
    {
        $Subject = $this->subjectRepository->updateSubject($id, $request->validated());

        if (!$Subject) {
            abort(404, 'Student not found or update failed');
        }

        return redirect()->route('subjects.index')->with('success', 'Subject is updated successfully.');
    }
}
