<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Student Details: {{ $student->name }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Student ID: {{ $student->id }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $student->name }}</p>
                <p class="card-text"><strong>Date of Birth:</strong> {{ $student->date_of_birth }}</p>
                <p class="card-text"><strong>Class:</strong>
                    @if($student->class)
                        <a href="{{ route('classes.show', $student->class->id) }}">{{ $student->class->name }}</a>
                    @else
                        N/A
                    @endif
                </p>
                <p class="card-text"><strong>Subjects:</strong></p>
                <ul>
                    @forelse ($student->subjects as $subject)
                        <li><a href="{{ route('subjects.show', $subject->id) }}">{{ $subject->name }}</a></li>
                    @empty
                        <li>No subjects assigned.</li>
                    @endforelse
                </ul>
                <a href="{{ route('students.index') }}" class="btn btn-primary">Back to Students</a>
            </div>
        </div>
    </div>
</body>

</html>
