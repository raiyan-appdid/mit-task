<!DOCTYPE html>
<html>
<head>
    <title>Edit Project</title>
</head>
<body>
    <h1>Edit Project</h1>
    <form action="{{ route('project.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Project Name:</label>
        <input type="text" id="title" name="title" value="{{ $project->title }}" required>
        <br>
        <label for="employee">Assign Employee:</label>
        <select id="employee" name="employee_id">
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}" {{ $project->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Update Project</button>
    </form>
</body>
</html>
