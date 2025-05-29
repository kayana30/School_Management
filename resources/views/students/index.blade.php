@extends('students.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card shadow-lg rounded">
                <div class="card-header bg-danger text-dark d-flex justify-content-between align-items-center">
                    <h2 class="mb-0">Student Management</h2>
                    <a href="{{ route('students.create') }}" class="btn btn-light">Create New Student</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover table-bordered text-center align-middle">
                            <thead class="table-success">
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
                                        <td>
                                            {{ $student->subjects->pluck('name')->implode(', ') ?: 'N/A' }}
                                        </td>
                                        <td>
                                            @if ($student->photo)
                                                <img src="{{ asset('storage/' . $student->photo) }}" class="rounded-circle" style="width: 50px; height: 50px;" alt="Student Photo">
                                            @else
                                                <span class="text-muted">No Image</span>
                                            @endif
                                        </td>
                                        <td>{{ $student->teacher->name ?? 'N/A' }}</td>
                                        <td>
                                            <a href="{{ route('students.show', $student->id) }}" class="btn btn-primary btn-sm mb-1">View</a>
                                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this student?')">Delete</button>
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
                    </div> <!-- /.table-responsive -->
                </div> <!-- /.card-body -->
            </div> <!-- /.card -->
        </div>
    </div>
</div>
@endsection
