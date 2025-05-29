@extends('students.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg rounded">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #2e3060;">
                    <h2 class="mb-0">Student Management</h2>
                    <a href="{{ route('students.create') }}" class="btn btn-sm"
                       style="background-color: #2e3060; border-color: #2e3060; color: white;">
                        Create New Student
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
                                    <th>#</th>
                                    <th>Register No</th>
                                    <th>Name</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Subjects</th>
                                    <th>Photo</th>
                                    <th>Teacher</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($students as $student)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $student->register_no }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->gender }}</td>
                                        <td>{{ $student->dob }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone ?? 'N/A' }}</td>
                                        <td>{{ $student->address ?? 'N/A' }}</td>
                                        <td>{{ $student->subjects->pluck('name')->implode(', ') ?: 'N/A' }}</td>
                                        <td>
                                            @if ($student->photo)
                                                <img src="{{ asset('storage/' . $student->photo) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="Student Photo">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $student->teacher->name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm me-1"
                                               style="background-color: #007bff; border-color: #007bff; color: white;">
                                                View
                                            </a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm me-1"
                                               style="background-color: #28a745; border-color: #28a745; color: white;">
                                                Edit
                                            </a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm"
                                                    style="border: 1px solid #dc3545; color: #dc3545; background-color: transparent;"
                                                    onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white';"
                                                    onmouseout="this.style.backgroundColor='transparent'; this.style.color='#dc3545';"
                                                    onclick="return confirm('Are you sure you want to delete this student?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="12" class="text-center text-muted">No students found.</td>
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
