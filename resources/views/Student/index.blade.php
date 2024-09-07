<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h1>Student Data</h1>
              <a href="{{ route('student.create') }}" class="btn btn-primary btn-sm">Create Student</a>
            </div>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Email</th>
                  <th scope="col">Address</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $i = 1;
                @endphp
                @foreach ($students as $user)
                <tr>
                  <th scope="row">{{ $i }}</th>
                  <td>{{ $user->name }}</td>
                  <td>{{ $user->email }}</td>
                  <td>{{ $user->address }}</td>
                  <td>
                    <a href="{{ url('student/edit/' .$user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    <a onclick="return confirm('Do you want to delete or not?')" href="{{ url('student/delete/' .$user->id) }}" class="btn btn-sm btn-danger">Delete</a>
                  </td>
                </tr>
                @php
                  $i++;
                @endphp
                @endforeach
              </tbody>
            </table>

            {{ $students->links() }}

          </div>
        </div>
      </div>


</body>
</html>