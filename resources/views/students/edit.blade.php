<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student: {{ $student->name }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Edit Student: {{ $student->name }}</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
         <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Student Name:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
            </div>
            <div class="mb-3">
                <label for="school_class_id" class="form-label">Class Name:</label>
                <select class="form-select" class="form-control" id="school_class_id" name="school_class_id" required>
                     <option value="{{ old('name', $student->class->name)}}">Select a Class</option>
                    @foreach($classes as $class)
                         <option value="{{ $class->id }}"
                            {{ (old('school_class_id', $student->school_class_id) == $class->id) ? 'selected' : '' }}>
                            {{ $class->name }}
                        </option>
                    @endforeach
                </select>
                @error('school_class_id')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date_of_birth" class="form-label">Date of Birth:</label>
                <input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="{{ old('date_of_birth', $student->date_of_birth) }}" optional>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('classes.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>