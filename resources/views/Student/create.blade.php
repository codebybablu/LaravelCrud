<h1>Create Student</h1>

<form action="{{ route('student.store') }}" method="post">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
    </div>

    <div>
        <label for="rollno">Address</label>
        <input type="text" id="address" name="address" required>
    </div>

    <button type="submit">Create Student</button>
</form>