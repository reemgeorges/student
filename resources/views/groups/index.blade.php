<!-- resources/views/groups/index.blade.php -->

<h1>Groups</h1>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>

    <tbody>
        @foreach ($groups as $group)
            <tr>
                <td>{{ $group->group_name }}</td>
                <td>
                    <form action="{{ route('groups.destroy', $group->id) }}" method="POST" style="display: inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ route('groups.create') }}">Add group</a>

