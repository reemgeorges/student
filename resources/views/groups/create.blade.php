<!-- resources/views/groups/create.blade.php -->

<h1>Add Group</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('groups.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="group_name">Group Name:</label>
        <input type="text" name="group_name" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Add Group</button>
</form>
