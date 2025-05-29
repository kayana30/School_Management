@extends('subjects.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header text-center py-3" style="background-color: #28a745; color: black;">
                    <h2 class="mb-0">Edit Subject</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/subjects' . $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="fw-bold" style="color: black;">Subject Name:</label>
                            <input type="text" name="name" class="form-control shadow-sm" value="{{ old('name', $subject->name) }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold" style="color: black;">Subject Code:</label>
                            <input type="text" name="code" class="form-control shadow-sm" value="{{ old('code', $subject->code) }}" required>
                            @error('code')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn shadow" style="background-color: #28a745; color: black;">Update</button>
                            <a href="{{ url('/subjects') }}" class="btn btn-secondary shadow">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
