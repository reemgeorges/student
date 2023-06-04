<!-- resources/views/courses/index.blade.php -->
<h1>Courses</h1>

@foreach($courses as $course)
    <div>
        <span>{{ $course->course_name }}</span>
        <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endforeach

<a href="{{ route('courses.create') }}">Add Course</a>
