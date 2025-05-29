@extends('subjects.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-warning text-dark text-center py-3">
                    <h2 class="mb-0">Edit Subject</h2>
                </div>
                <div class="card-body">
                    <form action="{{ url('/subjects/' . $subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label class="fw-bold">Subject Name:</label>
                            <input type="text" name="name" class="form-control shadow-sm" value="{{ old('name', $subject->name) }}" required>
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label class="fw-bold">Subject Code:</label>
                            <input type="text" name="code" class="form-control shadow-sm" value="{{ old('code', $subject->code) }}" required>
                            @error('code')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <button type="submit" class="btn btn-warning shadow">Update</button>
                            <a href="{{ url('/teacher-to-subject') }}" class="btn btn-secondary shadow">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
