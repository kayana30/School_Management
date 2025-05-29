@extends('students.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Student Details</h2>
                </div>

                <div class="card-body">
                    <div class="text-center mb-3">
                        @if($student->photo)
                            <img src="{{ asset('storage/' . $student->photo) }}" class="img-thumbnail rounded-circle shadow" width="180" height="180" alt="Student Photo">
                        @else
                            <img src="{{ asset('images/default-avatar.png') }}" class="img-thumbnail rounded shadow" width="180" height="180" alt="Default Photo">
                        @endif
                    </div>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Register No:</strong> {{ $student->register_no }}</li>
                        <li class="list-group-item"><strong>Name:</strong> {{ $student->name }}</li>
                        <li class="list-group-item"><strong>Gender:</strong> {{ ucfirst($student->gender) }}</li>
                        <li class="list-group-item"><strong>Date of Birth:</strong> {{ $student->dob }}</li>
                        <li class="list-group-item"><strong>Email:</strong> {{ $student->email }}</li>
                        <li class="list-group-item"><strong>Phone Number:</strong> {{ $student->phone }}</li>
                        <li class="list-group-item"><strong>Address:</strong> {{ $student->address }}</li>

                        <li class="list-group-item"><strong>Teacher:</strong>
                            {{ $student->teacher->name ?? 'No teacher assigned' }}
                        </li>

                        <li class="list-group-item"><strong>Subjects:</strong>
                            @forelse($student->subjects as $subject)
                                {{ $subject->name }}@if(!$loop->last), @endif
                            @empty
                                No subjects assigned
                            @endforelse
                        </li>
                    </ul>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-primary">Edit</a>
                        <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
