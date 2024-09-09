<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Edit Student</title>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Edit Student</h1>
                <form action="{{ url('student/update', $student->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Name:</label>
                        <input type="text" id="name" name="name" value="{{ $student->name }}" required class="form-control">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" id="email" name="email" value="{{ $student->email }}" required class="form-control">
                    </div>
                    
                    <div class="form-group mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" id="address" name="address" value="{{ $student->address }}" required class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label for="image" class="form-label">Upload Image:</label>
                        <input type="file" id="image" name="image" class="form-control" accept="image/*">
                        @if($student->image)
                            <img src="{{ asset('images/students/' . $student->image) }}" alt="Student Image" width="100" class="mt-2">
                        @endif
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-primary">Update Student</button>
                        <a href="{{ route('index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>