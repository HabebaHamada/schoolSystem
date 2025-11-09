<?php

namespace App\Http\Controllers;

use App\Services\SubjectService;

class SubjectController extends Controller
{
    protected $subjectService;

    public function __construct(SubjectService $subjectService)
    {
        $this->subjectService = $subjectService;
    }

    /**
     * Display a listing of the subjects.
     */
    public function index()
    {
        $subjects = $this->subjectService->getAllSubjects();
        return view('subjects.index', compact('subjects'));
    }

    /**
     * Display the specified subject with its students.
     */
    public function show(int $id)
    {
        $subject = $this->subjectService->getSubjectDetailsWithStudents($id);

        if (!$subject) {
            abort(404, 'Subject not found');
        }

        return view('subjects.show', compact('subject'));
    }
}
