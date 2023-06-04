<h1>student</h1>
<!-- students.blade.php -->

@foreach($students as $student)
<div>
    {{ $student->student_name }}
    <a href="{{ route('students.edit', $student->id) }}">EDIT</a>

</div>

<form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<h3>Group:</h3>
<p>{{ $student->group->group_name }}</p>

<h3>Courses:</h3>
<ul>
    @foreach ($student->courses as $course)
    <li>{{ $course->course_name }}</li>
    @endforeach
</ul>
@endforeach


<button>

    <a href="{{ route('student.create') }}" class="btn btn-primary">Add New student</a> </button>

<button>
    <a href="{{ route('groups.index') }}" class="btn btn-primary">Show group</a>
</button>
<button>
    <a href="{{ route('courses.index') }}" class="btn btn-primary">show courses</a>
</button>
