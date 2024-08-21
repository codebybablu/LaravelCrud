<h1>Edit Student</h1>
<form action="{{ url('student/update', $student->id) }}" method="post">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $student->name }}" required>
    </div><br><br>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $student->email }}" required>
    </div><br><br>

    <div>
        <label for="rollno">Address:</label>
        <input type="text" id="address" name="address" value="{{ $student->address }}" required>
    </div><br><br>

    <button type="submit">Update Student</button><br><br>
    <a href="{{ route('index') }}">Back</a>
</form>