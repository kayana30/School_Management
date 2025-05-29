@extends('teachers.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Teacher Details</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Name:</strong> {{ $teacher->name }}</li>
                        <li class="list-group-item"><strong>Date of Birth:</strong> {{ \Carbon\Carbon::parse($teacher->dob)->format('Y-m-d') }}</li>
                        <li class="list-group-item"><strong>Gender:</strong> {{ $teacher->gender == 1 ? 'Male' : 'Female' }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $teacher->address }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $teacher->email }}</li>
                        <li class="list-group-item"><strong>Phone Number:</strong> {{ $teacher->phone }}</li>
                    </ul>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('teachers.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
