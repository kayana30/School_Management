@extends('students.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0">Add New Student</h2>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Please fix the following issues:
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="register_no">Register No:</label>
                            <input type="text" name="register_no" class="form-control" value="{{ old('register_no') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="gender">Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label for="dob">Date of Birth:</label>
                            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone">Phone Number:</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="address">Address:</label>
                            <textarea name="address" class="form-control">{{ old('address') }}</textarea>
                        </div>

                        <div class="form-group mb-3">
                            <label for="teacher_id">Teacher:</label>
                            <select name="teacher_id" class="form-control" required>
                                <option value="">Select Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label><strong>Select Subjects:</strong></label>
                            @foreach($subjects as $subject)
    <div class="form-check">
        <input type="checkbox" id="subject{{ $subject->id }}" name="subject_ids[]" value="{{ $subject->id }}" class="form-check-input"
            {{ is_array(old('subject_ids')) && in_array($subject->id, old('subject_ids')) ? 'checked' : '' }}>
        <label for="subject{{ $subject->id }}" class="form-check-label">{{ $subject->name }}</label>
    </div>
@endforeach

                        </div>

                        <div class="form-group mb-4">
                            <label for="photo">Photo (optional):</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-success">Add Student</button>
                            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
