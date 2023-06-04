<!-- editStudent.blade.php -->

<h1>Edit Student Information</h1>

<form action="{{ route('students.update', $student->id) }}" method="POST">
    @csrf
    @method('patch')

    <label for="student_name">Student Name:</label>
    <input type="text" name="student_name" value="{{ $student->student_name }}">

    <h2>Student Courses:</h2>
    <ul>
        @foreach($student->courses as $course)
            <li>{{ $course->course_name }}</li>
        @endforeach
    </ul>

    <h2>Student Groups:</h2>
    <ul>
        @foreach($student->groups as $group)
            <li>{{ $group->group_name }}</li>
        @endforeach
    </ul>



    <button type="submit">UPDATE</button>
</form>
