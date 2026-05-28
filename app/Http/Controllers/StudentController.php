<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('studentmngt.index', compact('students'));
    }

    public function create()
    {
        return view('studentmngt.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);

        Student::create($request->all());

        return redirect()->route('studentmngt.index') ->with('success', 'Student created successfully.');
    }

    public function show(int $id)
    {
        $student = Student::findOrFail($id);
        return view('studentmngt.show', compact('student'));
    }

    public function edit(int $id)
    {
        $student = Student::findOrFail($id);
        return view('studentmngt.edit', compact('student'));
    }

    public function update(Request $request, int $id)
    {
        $student = Student::findOrFail($id);
        $request->validate([
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'mname' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'dob' => 'required|date',
        ]);

        $student->update($request->all());

        return redirect()->route('studentmngt.index') ->with('success', 'Student updated successfully.');
    }

    public function destroy(int $id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('studentmngt.index') ->with('success', 'Student deleted successfully.');
    }
}
