<!DOCTYPE html>
<html>
<head>
    <title>Student CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<h2>Add Student</h2>

<form method="POST" action="/students">
    @csrf
    <input type="text" name="first_name" placeholder="First Name" class="form-control mb-2" required>
    <input type="text" name="last_name" placeholder="Last Name" class="form-control mb-2" required>
    <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
    <input type="text" name="phone_number" placeholder="Phone" class="form-control mb-2" required>
    <input type="date" name="date_of_birth" class="form-control mb-2" required>
    <input type="text" name="gender" placeholder="Gender" class="form-control mb-2" required>
    <input type="text" name="course" placeholder="Course" class="form-control mb-2" required>
    <input type="text" name="year_level" placeholder="Year Level" class="form-control mb-2" required>
    <textarea name="address" placeholder="Address" class="form-control mb-2"></textarea>

    <button class="btn btn-primary">Save</button>
</form>

<hr>

<h2>Students List</h2>

<table class="table table-bordered">
    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Course</th>
    </tr>

    @foreach($students as $student)
    <tr>
        <td>{{ $student->first_name }} {{ $student->last_name }}</td>
        <td>{{ $student->email }}</td>
        <td>{{ $student->course }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>