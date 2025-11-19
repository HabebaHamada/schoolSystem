<!DOCTYPE html>
<x-app-layout>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Class Details: {{ $class->name }}</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Class ID: {{ $class->id }}</h5>
                <p class="card-text"><strong>Name:</strong> {{ $class->name }}</p>
                <p class="card-text"><strong>Students in this Class:</strong></p>
                <ul>
                    @forelse ($class->students as $student)
                        <li><a href="{{ route('students.show', $student->id) }}">{{ $student->name }}</a>
                            ({{ $student->date_of_birth }})</li>
                    @empty
                        <li>No students in this class.</li>
                    @endforelse
                </ul>
                <a href="{{ route('classes.index') }}" class="btn btn-primary">Back to Classes</a>
            </div>
        </div>
    </div>
</body>

</x-app-layout>
