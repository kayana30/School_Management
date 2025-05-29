@extends('teachers.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded">
                <div class="card-header text-white" style="background-color: #0d6efd;">
                    <h2 class="mb-0">Add New Teacher</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('teachers.store') }}" method="POST" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold" style="color: black;">Name <span class="text-danger">*</span></label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                                   value="{{ old('name') }}" required autofocus>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="dob" class="form-label fw-semibold" style="color: black;">Date of Birth <span class="text-danger">*</span></label>
                            <input type="date" id="dob" name="dob" class="form-control @error('dob') is-invalid @enderror"
                                   value="{{ old('dob') }}" required>
                            @error('dob')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="gender" class="form-label fw-semibold" style="color: black;">Gender <span class="text-danger">*</span></label>
                            <select id="gender" name="gender" class="form-select @error('gender') is-invalid @enderror" required>
                                <option value="" disabled {{ old('gender') === null ? 'selected' : '' }}>Select Gender</option>
                                <option value="1" {{ old('gender') === '1' ? 'selected' : '' }}>Male</option>
                                <option value="0" {{ old('gender') === '0' ? 'selected' : '' }}>Female</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label fw-semibold" style="color: black;">Address</label>
                            <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror"
                                   value="{{ old('address') }}">
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold" style="color: black;">Email <span class="text-danger">*</span></label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                   value="{{ old('email') }}" required>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label fw-semibold" style="color: black;">Phone Number</label>
                            <input type="text" id="phone" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ old('phone') }}">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn" style="background-color: #0d6efd; color: white;">Add Teacher</button>
                        <a href="{{ route('teachers.index') }}" class="btn btn-outline-primary">Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

