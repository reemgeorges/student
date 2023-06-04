<!-- In students/create.blade.php -->

<h1>Add New Student</h1>

<form action="{{ route('students.store') }}" method="POST">
    @csrf

    <div>
        <label for="student_name">Name:</label>
        <input type="text" name="student_name" id="student_name" required>
    </div>

    <div>
        <label for="courses">Courses:</label>
        <select name="courses[]" id="courses" multiple required>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->course_name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="group_id">Group:</label>
        <select name="group_id" id="group_id" required>
            @foreach ($groups as $group)
                <option value="{{ $group->id }}">{{ $group->group_name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit">Save</button>
</form>
