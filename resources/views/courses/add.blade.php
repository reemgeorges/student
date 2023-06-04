<!-- resources/views/courses/create.blade.php -->
<form action="{{ route('courses.store') }}" method="POST">
    @csrf

    <label for="course_name">Course Name:</label>
    <input type="text" name="course_name" id="course_name">

    <button type="submit">Add Course</button>
</form>
