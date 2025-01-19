<!DOCTYPE html>
<html>
<head>
    <title>Add Project</title>
</head>
<body>
    <h1>Add Project</h1>
    <form action="{{ route('project.store') }}" method="POST">
        @csrf
        <label for="title">Project Name:</label>
        <input type="text" id="title" name="title" required>
        <br>
        <label for="employee">Assign Employee:</label>
        <select id="employee" name="employee_id">
            @foreach($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
            @endforeach
        </select>
        <br>
        <button type="submit">Add Project</button>
    </form>
</body>
</html>
