<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentService;

class StudentController extends Controller
{

    protected $studentService;

    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

    public function index(Request $request)
    {
        $filters = [
            'search' => $request->query('search'),
            'course' => $request->query('course'),
            'year_level' => $request->query('year_level')
        ];

        $students = $this->studentService->getStudents($filters);

        return response()->json($students);
    }

    public function show($id)
    {
        $student = $this->studentService->getStudent($id);

        return response()->json($student);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email',
            'course' => 'required',
            'year_level' => 'required|integer'
        ]);

        $student = $this->studentService->createStudent($validated);

        return response()->json($student, 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
            'course' => 'required',
            'year_level' => 'required|integer'
        ]);

        $student = $this->studentService->updateStudent($id, $validated);

        return response()->json($student);
    }

    public function destroy($id)
    {
        $this->studentService->deleteStudent($id);

        return response()->json([
            'message' => 'Student deleted successfully'
        ]);
    }
}