<!-- filepath: /d:/laravel projects/taskapptest/resources/views/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <main role="main" class="col-md-12 ml-sm-auto col-lg-12 px-4">
                <h2>Welcome to the Admin Dashboard</h2>
                <p>You are logged in!</p>
                <div class="btn-group" role="group" aria-label="Dashboard Buttons">
                    <a href="{{ route('employee') }}" class="btn btn-primary">Employees</a>
                    <a href="{{ route('project') }}" class="btn btn-primary">Projects</a>

                    <a href="" class="btn btn-danger">Logout</a>
                </div>
            </main>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
