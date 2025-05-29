@extends('teachers.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-success text-white">
                    <h2 class="mb-0">Add New Teacher</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('teachers.store') }}" method="POST">
                        @csrf

                        <div class="form-group mb-3">
                            <label>Name:</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Date of Birth:</label>
                            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Gender:</label>
                            <select name="gender" class="form-control" required>
                                <option value="">Select Gender</option>
                                <option value="1" {{ old('gender') === '1' ? 'selected' : '' }}>Male</option>
                                <option value="0" {{ old('gender') === '0' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Address:</label>
                            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                            @error('address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Email:</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Phone Number:</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Add Teacher</button>
                        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
