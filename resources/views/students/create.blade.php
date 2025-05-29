@extends('students.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header text-white" style="background-color: #0d6efd;">
                    <h2 class="mb-0">Add New Student</h2>
                </div>

                <div class="card-body">
                    <form action="{{ route('students.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="register_no" class="form-label fw-semibold" style="color: black;">
                                Register No <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="register_no" name="register_no"
                                   class="form-control @error('register_no') is-invalid @enderror"
                                   value="{{ old('register_no') }}" required autofocus>
                            @error('register_no')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold" style="color: black;">
                                Name <span class="text-danger">*</span>
                            </label>
                            <input type="text" id="name" name="name"
                                   class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label fw-semibold" style="color: black;">
                                Gender <span class="text-danger">*</span>
                            </label>
                            <select id="gender" name="gender"
                                    class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="" disabled {{ old('gender') === null ? 'selected' : '' }}>Select Gender</option>
                                <option value="Male" {{ old('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ old('gender') === 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label fw-semibold" style="color: black;">
                                Date of Birth <span class="text-danger">*</span>
                            </label>
                            <input type="date" id="dob" name="dob"
                                   class="form-control @error('dob') is-invalid @enderror"
                                   value="{{ old('dob') }}" required>
                            @error('dob')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold" style="color: black;">
                                Email <span class="text-danger">*</span>
                            </label>
                            <input type="email" id="email" name="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold" style="color: black;">
                                Phone Number
                            </label>
                            <input type="text" id="phone" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label fw-semibold" style="color: black;">
                                Address
                            </label>
                            <textarea id="address" name="address"
                                      class="form-control @error('address') is-invalid @enderror"
                                      rows="3">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="teacher_id" class="form-label fw-semibold" style="color: black;">
                                Teacher <span class="text-danger">*</span>
                            </label>
                            <select id="teacher_id" name="teacher_id"
                                    class="form-select @error('teacher_id') is-invalid @enderror" required>
                                <option value="" disabled {{ old('teacher_id') === null ? 'selected' : '' }}>Select Teacher</option>
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}" {{ old('teacher_id') == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('teacher_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold" style="color: black;">
                                Select Subjects
                            </label>
                            @foreach($subjects as $subject)
                                <div class="form-check">
                                    <input type="checkbox" id="subject{{ $subject->id }}" name="subject_ids[]" value="{{ $subject->id }}"
                                           class="form-check-input"
                                           {{ is_array(old('subject_ids')) && in_array($subject->id, old('subject_ids')) ? 'checked' : '' }}>
                                    <label for="subject{{ $subject->id }}" class="form-check-label">
                                        {{ $subject->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <div class="mb-4">
                            <label for="photo" class="form-label fw-semibold" style="color: black;">
                                Photo (optional)
                            </label>
                            <input type="file" id="photo" name="photo" class="form-control @error('photo') is-invalid @enderror">
                            @error('photo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn" style="background-color: #0d6efd; color: white;">
                                Add Student
                            </button>
                            <a href="{{ route('students.index') }}" class="btn btn-outline-primary">Back</a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
