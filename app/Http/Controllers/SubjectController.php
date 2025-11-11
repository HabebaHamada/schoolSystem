<?php

namespace App\Http\Controllers;

use App\Repositories\SubjectRepository;

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
}
