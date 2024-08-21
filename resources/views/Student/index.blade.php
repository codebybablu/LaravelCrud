<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1> Student Data </h1>
    <a href="{{ route('student.create') }}">Create Student</a>
    <table>
        <thead>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Action</th>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($students as $user)
                <tr>
                    <td>{{ $i }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td><a href="{{ url('student/edit' .$user->id) }}">Edit</a> &nbsp;&nbsp;  
                        <a onclick="return confirm('Do you want to delete or not?')" href="{{ url('student/delete/' .$user->id) }}">Delete</a></td>
                </tr>
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>

</body>
</html>