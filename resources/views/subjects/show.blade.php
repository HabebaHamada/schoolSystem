<!DOCTYPE html>
<x-app-layout>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Subject Details: {{ $subject->name }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Subject ID: {{ $subject->id }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $subject->name }}</p>
                <p class="card-text"><strong>Students taking this Subject:</strong></p>
                <ul>
                    @forelse ($subject->students as $student)
                        <li><a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a> (Class:
                            {{ $student->school_class_id ?? 'N/A' }})</li>
                    @empty
                        <li>No students are taking this subject.</li>
                    @endforelse
                </ul>
                <a href="{{ route('subjects.index') }}" class="btn btn-primary">Back to Subjects</a>
            </div>
        </div>
    </div>
</body>

</x-app-layout>
