@extends('teachers.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-warning text-dark text-center py-3">
                    <h2 class="mb-0">Edit Teacher</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="fw-bold">Name:</label>
                            <input type="text" name="name" class="form-control shadow-sm" value="{{ old('name', $teacher->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Birthdate:</label>
                            <input type="date" name="dob" class="form-control shadow-sm" value="{{ old('dob', $teacher->dob) }}" required>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Gender:</label>
                            <select name="gender" class="form-control shadow-sm" required>
                                <option value="1" {{ old('gender', $teacher->gender) == 1 ? 'selected' : '' }}>Male</option>
                                <option value="0" {{ old('gender', $teacher->gender) == 0 ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Address:</label>
                            <input type="text" name="address" class="form-control shadow-sm" value="{{ old('address', $teacher->address) }}">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Email:</label>
                            <input type="email" name="email" class="form-control shadow-sm" value="{{ old('email', $teacher->email) }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Phone Number:</label>
                            <input type="text" name="phone" class="form-control shadow-sm" value="{{ old('phone', $teacher->phone) }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-warning shadow">Update</button>
                            <a href="{{ route('teachers.index') }}" class="btn btn-secondary shadow">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
