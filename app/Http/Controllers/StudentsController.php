<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{
    public function index()
    {
        $students = Student::with('teacher', 'subjects')->get();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('students.create', compact('teachers', 'subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'register_no' => 'required|unique:students,register_no|max:50',
            'name' => 'required|max:255',
            'gender' => 'required|string',
            'dob' => 'required|date',
            'email' => 'required|email|unique:students,email',
            'phone' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'subject_ids' => 'required|array',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'teacher_id' => 'required|exists:teachers,id',
        ]);

        $studentData = $request->only([
            'register_no', 'name', 'gender', 'dob', 'email',
            'phone', 'address', 'teacher_id'
        ]);

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = $request->register_no . '.' . $image->getClientOriginalExtension();
            $studentData['photo'] = $image->storeAs('photos', $imageName, 'public');
        }

        $student = Student::create($studentData);

        $syncData = [];
        foreach ($request->subject_ids as $subject_id) {
            $syncData[$subject_id] = ['teacher_id' => $request->teacher_id];
        }

        $student->subjects()->attach($syncData);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
    }

    public function show($id)
    {
        $student = Student::with('teacher', 'subjects')->findOrFail($id);
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::with('subjects')->findOrFail($id);
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view('students.edit', compact('student', 'teachers', 'subjects'));
    }

    public function update(Request $request, $id)
{
    $student = Student::findOrFail($id);

    $validated = $request->validate([
        'register_no' => 'required|string|max:255',
        'name' => 'required|string|max:255',
        'gender' => 'required|in:Male,Female',
        'dob' => 'required|date',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string',
        'teacher_id' => 'required|exists:teachers,id',
        'subjects' => 'required|array',
        'subjects.*' => 'exists:subjects,id',
        'photo' => 'nullable|image|max:2048',
    ]);

    $student->update([
        'register_no' => $validated['register_no'],
        'name' => $validated['name'],
        'gender' => $validated['gender'],
        'dob' => $validated['dob'],
        'email' => $validated['email'],
        'phone' => $validated['phone'],
        'address' => $validated['address'],
        'teacher_id' => $validated['teacher_id'],
    ]);


    if ($request->hasFile('photo')) {


        $path = $request->file('photo')->store('photos', 'public');
        $student->photo = $path;
        $student->save();
    }

    $student->subjects()->sync($validated['subjects']);

    return redirect()->route('students.index')->with('success', 'Student updated successfully.');
}


    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        if ($student->photo) {
            Storage::disk('public')->delete($student->photo);
        }

        $student->subjects()->detach();
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
