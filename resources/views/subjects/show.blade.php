@extends('subjects.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg rounded-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h2 class="mb-0">Subject Details</h2>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Subject Name:</strong> {{ $subject->name }}</li>
                        <li class="list-group-item"><strong>Subject Code:</strong> {{ $subject->code }}</li>
                    </ul>
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ url('/subjects/' . $subject->id . '/edit') }}" class="btn btn-primary">Edit</a>
                        <a href="{{ url('/subjects') }}" class="btn btn-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
