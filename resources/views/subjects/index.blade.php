@extends('subjects.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow-lg rounded">
                <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #2e3060;">
                    <h2 class="mb-0">Subject Management</h2>
                    <a href="{{ url('/subjects/create') }}" class="btn btn-sm"
                       style="background-color: #2e3060; border-color: #2e3060; color: white;">
                        Create New Subject
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
                                    <th>Subject Name</th>
                                    <th>Code</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($subjects as $subject)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subject->name }}</td>
                                        <td>{{ $subject->code }}</td>
                                        <td>

                                            <a href="{{ url('/subjects/' . $subject->id) }}" class="btn btn-sm me-1"
                                               style="background-color: #007bff; border-color: #007bff; color: white;">
                                                View
                                            </a>


                                            <a href="{{ url('/subjects/' . $subject->id . '/edit') }}" class="btn btn-sm me-1"
                                               style="background-color: #28a745; border-color: #28a745; color: white;">
                                                Edit
                                            </a>

                                            <form method="POST" action="{{ url('/subjects' . $subject->id) }}" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm"
                                                        style="border: 1px solid #dc3545; color: #dc3545; background-color: transparent;"
                                                        onmouseover="this.style.backgroundColor='#dc3545'; this.style.color='white';"
                                                        onmouseout="this.style.backgroundColor='transparent'; this.style.color='#dc3545';"
                                                        onclick="return confirm('Are you sure you want to delete this subject?')">
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center">No subjects found.</td>
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

