@extends('teachers.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #2e3060;">
                    <h2 class="mb-0">Teacher Management</h2>
                    <a href="{{ route('teachers.create') }}" class="btn btn-sm"
                       style="background-color: #2e3060; border-color: #2e3060; color: white;">
                        Create New Teacher
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped table-hover table-bordered text-center align-middle">
                            <thead class="table-secondary text-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Date of Birth</th>
                                    <th>Gender</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->id }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->dob }}</td>
                                        <td>{{ $teacher->gender ? 'Male' : 'Female' }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>{{ $teacher->email }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>
                                          
                                            <a href="{{ route('teachers.show', $teacher->id) }}" class="btn btn-sm me-1"
                                               style="background-color: #007bff; border-color: #007bff; color: white;">
                                                View
                                            </a>

                                            <a href="{{ route('teachers.edit', $teacher->id) }}" class="btn btn-sm me-1"
                                               style="background-color: #28a745; border-color: #28a745; color: white;">
                                                Edit
                                            </a>


                                            <form method="POST" action="{{ route('teachers.destroy', $teacher->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm"
                                                    style="border: 1px solid #dc3545; color: #dc3545; background-color: transparent;"
                                                    onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white';"
                                                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#dc3545';"
                                                    onclick="return confirm('Are you sure you want to delete this teacher?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No teachers found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
