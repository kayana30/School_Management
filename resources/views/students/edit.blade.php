@extends('students.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Edit Student</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="fw-bold">Register No:</label>
                            <input type="text" name="register_no" class="form-control shadow-sm" value="{{ old('register_no', $student->register_no) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Name:</label>
                            <input type="text" name="name" class="form-control shadow-sm" value="{{ old('name', $student->name) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Gender:</label>
                            <select name="gender" class="form-control shadow-sm" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender', $student->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender', $student->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Date of Birth:</label>
                            <input type="date" name="dob" class="form-control shadow-sm" value="{{ old('dob', $student->dob) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Email:</label>
                            <input type="email" name="email" class="form-control shadow-sm" value="{{ old('email', $student->email) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Phone Number:</label>
                            <input type="text" name="phone" class="form-control shadow-sm" value="{{ old('phone', $student->phone) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Address:</label>
                            <input type="text" name="address" class="form-control shadow-sm" value="{{ old('address', $student->address) }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Teacher:</label>
                            <select name="teacher_id" class="form-control shadow-sm" required>
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id', $student->teacher_id) == $teacher->id ? 'selected' : '' }}>{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Select Subjects:</label>
                            @foreach($subjects as $subject)
                                <div class="form-check">
                                    <input type="checkbox" name="subjects[]" class="form-check-input"
                                           value="{{ $subject->id }}"
                                           {{ in_array($subject->id, old('subjects', $student->subjects->pluck('id')->toArray())) ? 'checked' : '' }}>
                                    <label class="form-check-label">{{ $subject->name }}</label>
                                </div>
                            @endforeach
                        </div>

                        <div class="form-group mb-3 text-center">
                            <label class="fw-bold d-block">Photo:</label>
                            @if($student->photo)
                                <img src="{{ asset('storage/' . $student->photo) }}" class="img-thumbnail rounded-circle shadow" width="100" height="100">
                            @endif
                            <input type="file" name="photo" class="form-control mt-3 shadow-sm">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-primary shadow">Update</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary shadow">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
