<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subjects</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>All Subjects</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($subjects as $subject)
                    <tr>
                        <td>{{ $subject->ID }}</td>
                        <td>{{ $subject->Name }}</td>
                        <td>
                            <a href="{{ route('subjects.show', $subject->ID) }}" class="btn btn-info btn-sm">View
                                Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4">
            <a href="{{ route('students.index') }}" class="btn btn-secondary">View All Students</a>
            <a href="{{ route('classes.index') }}" class="btn btn-secondary">View All Classes</a>
        </div>
    </div>
</body>

</html>