<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>All Students</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Class</th>
                    <th>Date of Birth</th>
                    <th>Subjects</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->ID }}</td>
                        <td>{{ $student->Name }}</td>
                        <td>{{ $student->class->Name ?? 'N/A' }}</td>
                        <td>{{ $student->DateOfBirth }}</td>
                        <td>
                            @forelse ($student->subjects as $subject)
                                <span class="badge bg-primary">{{ $subject->Name }}</span>
                            @empty
                                No Subjects
                            @endforelse
                        </td>
                        <td>
                            <a href="{{ route('students.show', $student->ID) }}" class="btn btn-info btn-sm">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('classes.index') }}" class="btn btn-secondary">View All Classes</a>
            <a href="{{ route('subjects.index') }}" class="btn btn-secondary">View All Subjects</a>
        </div>
    </div>
</body>

</html>